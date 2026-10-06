<?php
require __DIR__ . '/includes/functions.php';
$successMessage = $_GET['success'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apply for a Bursary</title>
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
    <section class="container form-shell">
      <div class="form-header">
        <p class="eyebrow">Student Application</p>
        <h1>Apply for Bursary Funding</h1>
        <p>Tell us about your academic background, financial need, and study details. The system will estimate your eligibility.</p>
      </div>

      <form action="process_application.php" method="POST" class="application-form">
        <div class="grid-2">
          <label>
            Full Name
            <input type="text" name="student_name" required>
          </label>
          <label>
            Student ID
            <input type="text" name="student_id" required>
          </label>
        </div>

        <div class="grid-2">
          <label>
            Email Address
            <input type="email" name="email" required>
          </label>
          <label>
            Institution
            <input type="text" name="institution" required>
          </label>
        </div>

        <div class="grid-2">
          <label>
            Program / Course
            <input type="text" name="program" required>
          </label>
          <label>
            Year of Study
            <select name="year_of_study" required>
              <option value="1">Year 1</option>
              <option value="2">Year 2</option>
              <option value="3">Year 3</option>
              <option value="4">Year 4</option>
              <option value="5">Year 5+</option>
            </select>
          </label>
        </div>

        <div class="grid-2">
          <label>
            Annual Family Income ($)
            <input type="number" name="family_income" min="0" step="100" required>
          </label>
          <label>
            Current GPA
            <input type="number" name="gpa" min="0" max="4" step="0.01" required>
          </label>
        </div>

        <div class="grid-2">
          <label>
            Need Level (1-10)
            <input type="number" name="need_level" min="1" max="10" required>
          </label>
          <label>
            Current Status
            <select name="status" required>
              <option value="new">New Application</option>
              <option value="active">Active Student</option>
              <option value="part-time">Part Time</option>
            </select>
          </label>
        </div>

        <label>
          Explain your financial need
          <textarea name="need_description" rows="5" required></textarea>
        </label>

        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Submit Application</button>
          <a class="btn btn-secondary" href="index.php">Back to Home</a>
        </div>
      </form>
    </section>
  </main>

  <script src="assets/js/script.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const success = <?php echo json_encode((string) $successMessage); ?>;
      if (success === '1') {
        showToast('Application submitted successfully.', 'success');
      }
    });
  </script>
</body>
</html>
