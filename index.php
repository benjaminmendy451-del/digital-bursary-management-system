<?php
session_start();
require __DIR__ . '/includes/functions.php';

$stats = getDashboardStats();
$message = $_GET['success'] ?? null;
$successMessage = $message === '1' ? 'Your bursary application has been submitted successfully.' : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Digital Bursary Management System</title>
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

  <main>
    <section class="hero">
      <div class="container hero-grid">
        <div>
          <p class="eyebrow">Student Support</p>
          <h1>Support brighter futures with a smarter bursary process.</h1>
          <p class="lead">
            Manage funding requests, review student eligibility, and streamline disbursement decisions from one secure platform.
          </p>
          <div class="hero-actions">
            <a class="btn btn-primary" href="application.php">Apply Now</a>
            <a class="btn btn-secondary" href="admin.php">Admin Dashboard</a>
          </div>
        </div>

        <div class="hero-card">
          <div class="mini-card">
            <span>Total Applications</span>
            <strong><?php echo $stats['total']; ?></strong>
          </div>
          <div class="mini-card">
            <span>Approved</span>
            <strong><?php echo $stats['approved']; ?></strong>
          </div>
          <div class="mini-card">
            <span>Pending</span>
            <strong><?php echo $stats['pending']; ?></strong>
          </div>
          <div class="mini-card highlight">
            <span>Total Funding</span>
            <strong>$<?php echo number_format($stats['funding_total'], 2); ?></strong>
          </div>
        </div>
      </div>
    </section>

    <section class="stats container">
      <div class="stat-card">
        <span>Applications Received</span>
        <strong><?php echo $stats['total']; ?></strong>
      </div>
      <div class="stat-card accent">
        <span>Average Score</span>
        <strong><?php echo $stats['average_score']; ?>%</strong>
      </div>
      <div class="stat-card warning">
        <span>Needs Review</span>
        <strong><?php echo $stats['pending']; ?></strong>
      </div>
      <div class="stat-card success">
        <span>Approved Funding</span>
        <strong>$<?php echo number_format($stats['approved_funding'], 2); ?></strong>
      </div>
    </section>

    <section class="info-section container">
      <div class="section-heading">
        <p class="eyebrow">System Overview</p>
        <h2>Everything needed to manage bursaries efficiently</h2>
      </div>
      <div class="feature-grid">
        <article class="feature-item">
          <h3>Application Intake</h3>
          <p>Capture student details, financial need, academic performance, and supporting information in a single form.</p>
        </article>
        <article class="feature-item">
          <h3>Eligibility Scoring</h3>
          <p>Use a transparent scoring model to evaluate academic performance, financial conditions, and demonstrated need.</p>
        </article>
        <article class="feature-item">
          <h3>Decision Tracking</h3>
          <p>Approve, reject, or place applications on hold while maintaining clear records for every student.</p>
        </article>
      </div>
    </section>
  </main>

  <script src="assets/js/script.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const message = <?php echo json_encode($successMessage); ?>;
      if (message) {
        showToast(message, 'success');
      }
    });
  </script>
</body>
</html>
