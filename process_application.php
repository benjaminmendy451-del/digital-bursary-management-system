<?php
session_start();
require __DIR__ . '/includes/functions.php';

$stats = getDashboardStats();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (loginAdmin($username, $password)) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
        header('Location: admin.php');
        exit;
    }

    $login_error = 'Invalid username or password.';
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: admin.php');
    exit;
}

if (!empty($_SESSION['admin_logged_in'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
        $id = trim($_POST['application_id'] ?? '');
        $status = trim($_POST['status'] ?? '');

        if ($id !== '' && $status !== '') {
            updateApplicationStatus($id, $status);
            header('Location: admin.php');
            exit;
        }
    }

    $applications = getApplications();
    $statusFilter = $_GET['status'] ?? 'all';
    if ($statusFilter !== 'all') {
        $applications = array_values(array_filter($applications, function ($app) use ($statusFilter) {
            return ($app['status'] ?? '') === $statusFilter;
        }));
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <header class="topbar">
    <div class="container nav">
      <div class="brand">
        <span class="brand-mark">DB</span>
        <span>Bursary Portal</span>
      </div>
      <nav>
        <a href="index.php">Home</a>
        <a href="application.php">Apply</a>
        <a href="admin.php">Admin</a>
      </nav>
    </div>
  </header>

  <main class="page-shell">
    <?php if (empty($_SESSION['admin_logged_in'])): ?>
      <section class="container auth-shell">
        <div class="auth-card">
          <p class="eyebrow">Administrator Access</p>
          <h1>Login to manage bursaries</h1>

          <?php if (!empty($login_error)): ?>
            <div class="alert alert-error"><?php echo htmlspecialchars($login_error); ?></div>
          <?php endif; ?>

          <form method="POST" class="auth-form">
            <label>
              Username
              <input type="text" name="username" required>
            </label>
            <label>
              Password
              <input type="password" name="password" required>
            </label>
            <button type="submit" name="login" class="btn btn-primary full-width">Sign In</button>
          </form>
        </div>
      </section>
    <?php else: ?>
      <section class="container dashboard">
        <div class="dashboard-top">
          <div>
            <p class="eyebrow">Administrator View</p>
            <h1>Review Bursary Applications</h1>
          </div>
          <div class="top-actions">
            <a class="btn btn-secondary" href="admin.php?logout=1">Logout</a>
          </div>
        </div>

        <div class="stats compact">
          <div class="stat-card">
            <span>Total</span>
            <strong><?php echo $stats['total']; ?></strong>
          </div>
          <div class="stat-card">
            <span>Pending</span>
            <strong><?php echo $stats['pending']; ?></strong>
          </div>
          <div class="stat-card success">
            <span>Approved</span>
            <strong><?php echo $stats['approved']; ?></strong>
          </div>
          <div class="stat-card warning">
            <span>Funding</span>
            <strong>$<?php echo number_format($stats['funding_total'], 2); ?></strong>
          </div>
        </div>

        <div class="toolbar">
          <form method="GET" class="filter-form">
            <label>
              Filter by status
              <select name="status" onchange="this.form.submit()">
                <option value="all" <?php echo $statusFilter === 'all' ? 'selected' : ''; ?>>All</option>
                <option value="pending" <?php echo $statusFilter === 'pending' ? 'selected' : ''; ?>>Pending</option>
                <option value="approved" <?php echo $statusFilter === 'approved' ? 'selected' : ''; ?>>Approved</option>
                <option value="rejected" <?php echo $statusFilter === 'rejected' ? 'selected' : ''; ?>>Rejected</option>
                <option value="in_review" <?php echo $statusFilter === 'in_review' ? 'selected' : ''; ?>>In Review</option>
              </select>
            </label>
          </form>
        </div>

        <div class="table-wrap">
          <table class="app-table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Student</th>
                <th>Program</th>
                <th>Income</th>
                <th>GPA</th>
                <th>Score</th>
                <th>Award</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($applications)): ?>
                <?php foreach ($applications as $app): ?>
                  <tr>
                    <td><?php echo htmlspecialchars($app['id'] ?? ''); ?></td>
                    <td>
                      <strong><?php echo htmlspecialchars($app['student_name'] ?? ''); ?></strong><br>
                      <small><?php echo htmlspecialchars($app['email'] ?? ''); ?></small>
                    </td>
                    <td><?php echo htmlspecialchars($app['program'] ?? ''); ?></td>
                    <td>$<?php echo number_format((float) ($app['family_income'] ?? 0), 2); ?></td>
                    <td><?php echo htmlspecialchars($app['gpa'] ?? '0.00'); ?></td>
                    <td><?php echo htmlspecialchars($app['eligibility_score'] ?? '0'); ?>%</td>
                    <td>$<?php echo number_format((float) ($app['recommended_award'] ?? 0), 2); ?></td>
                    <td>
                      <span class="status-pill status-<?php echo htmlspecialchars($app['status'] ?? 'pending'); ?>"><?php echo ucfirst(str_replace('_', ' ', $app['status'] ?? 'pending')); ?></span>
                    </td>
                    <td>
                      <form method="POST" class="inline-form">
                        <input type="hidden" name="application_id" value="<?php echo htmlspecialchars($app['id'] ?? ''); ?>">
                        <select name="status">
                          <option value="pending" <?php echo ($app['status'] ?? 'pending') === 'pending' ? 'selected' : ''; ?>>Pending</option>
                          <option value="in_review" <?php echo ($app['status'] ?? '') === 'in_review' ? 'selected' : ''; ?>>In Review</option>
                          <option value="approved" <?php echo ($app['status'] ?? '') === 'approved' ? 'selected' : ''; ?>>Approved</option>
                          <option value="rejected" <?php echo ($app['status'] ?? '') === 'rejected' ? 'selected' : ''; ?>>Rejected</option>
                        </select>
                        <button type="submit" name="action" class="btn btn-primary btn-small">Update</button>
                      </form>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="9">No bursary applications found.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </section>
    <?php endif; ?>
  </main>

  <script src="assets/js/script.js"></script>
</body>
</html>
