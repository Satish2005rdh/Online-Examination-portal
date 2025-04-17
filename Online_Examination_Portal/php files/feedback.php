<?php
// This must be the VERY FIRST LINE in your file
session_start();
include_once 'dbConnection.php';

// Rest of your code...
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Feedback - Online Exam System</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Custom CSS -->
  <style>
    :root {
      --primary-color: #4361ee;
      --secondary-color: #3f37c9;
      --accent-color: #4cc9f0;
      --light-color: #f8f9fa;
      --dark-color: #212529;
      --success-color: #4bb543;
      --danger-color: #ff3333;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f5f7fa;
      color: var(--dark-color);
    }

    .header {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      color: white;
      padding: 1rem 0;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .logo {
      font-size: 1.8rem;
      font-weight: 700;
      color: white;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .logo:hover {
      color: var(--accent-color);
    }

    .btn-outline-light {
      border-radius: 5px;
      transition: all 0.3s ease;
    }

    .btn-outline-light:hover {
      color: var(--primary-color);
      background-color: white;
    }

    .feedback-container {
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      padding: 2rem;
      margin: 2rem auto;
      max-width: 800px;
    }

    .feedback-title {
      color: var(--primary-color);
      font-weight: 600;
      margin-bottom: 1.5rem;
      text-align: center;
      position: relative;
    }

    .feedback-title::after {
      content: '';
      display: block;
      width: 60px;
      height: 3px;
      background: var(--accent-color);
      margin: 10px auto;
    }

    .form-control {
      border-radius: 5px;
      padding: 12px 15px;
      border: 1px solid #e0e0e0;
      margin-bottom: 1rem;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.25);
    }

    textarea.form-control {
      min-height: 150px;
    }

    .btn-primary {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
      border-radius: 5px;
      padding: 10px 25px;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      background-color: var(--secondary-color);
      border-color: var(--secondary-color);
      transform: translateY(-2px);
    }

    .success-message {
      font-size: 1.2rem;
      color: var(--success-color);
      text-align: center;
      margin: 2rem 0;
    }

    .success-message i {
      margin-right: 10px;
    }

    .footer {
      background-color: var(--dark-color);
      color: white;
      padding: 1.5rem 0;
      text-align: center;
    }

    .footer a {
      color: var(--accent-color);
      text-decoration: none;
      transition: all 0.3s ease;
      margin: 0 15px;
    }

    .footer a:hover {
      color: white;
    }

    /* Modal styles */
    .modal-header {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      color: white;
    }

    .modal-title {
      font-weight: 600;
    }

    .developer-card {
      display: flex;
      align-items: center;
      margin-bottom: 1.5rem;
    }

    .developer-img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid var(--accent-color);
      margin-right: 1.5rem;
    }

    .developer-info h4 {
      font-weight: 600;
      color: var(--primary-color);
      margin-bottom: 0.5rem;
    }

    .developer-info p {
      margin-bottom: 0.3rem;
    }

    .developer-info a {
      color: var(--primary-color);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .logo {
        font-size: 1.5rem;
      }

      .feedback-container {
        padding: 1.5rem;
      }

      .developer-card {
        flex-direction: column;
        text-align: center;
      }

      .developer-img {
        margin-right: 0;
        margin-bottom: 1rem;
      }
    }
  </style>
</head>

<!-- <?php
  include_once 'dbConnection.php';
  session_start();
  if (!(isset($_SESSION['email']))) {
    echo '<a href="#" class="btn btn-outline-light me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
              <i class="fas fa-sign-in-alt me-1"></i> Login
            </a>';
  } else {
    echo '<a href="logout.php?q=feedback.php" class="btn btn-outline-light">
              <i class="fas fa-sign-out-alt me-1"></i> Logout
            </a>';
  }
  ?> -->
<body>

  <!-- Header -->
  <header class="header">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <a href="index.php" class="logo">
            <i class="fas fa-graduation-cap"></i> Online Exam System
          </a>
        </div>
        <div class="col-md-6 text-end">

          <a href="index.php" class="btn btn-outline-light">
            <i class="fas fa-home me-1"></i> Home
          </a>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <main class="container">
    <div class="feedback-container animate__animated animate__fadeIn">
      <h2 class="feedback-title">
        <i class="fas fa-comment-dots me-2"></i>Feedback / Report a Problem
      </h2>

      <?php if (@$_GET['q']) { ?>
        <div class="success-message">
          <i class="fas fa-check-circle"></i>
          <?php echo htmlspecialchars(@$_GET['q']); ?>
        </div>
      <?php } else { ?>
        <form role="form" method="post" action="feed.php?q=feedback.php">
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
            </div>
            <div class="col-md-6">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
          </div>

          <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter subject" required>
          </div>

          <div class="mb-3">
            <label for="feedback" class="form-label">Your Feedback</label>
            <textarea class="form-control" id="feedback" name="feedback" placeholder="Write your feedback here..." required></textarea>
          </div>

          <div class="text-center">
            <button type="submit" name="submit" class="btn btn-primary">
              <i class="fas fa-paper-plane me-2"></i>Submit Feedback
            </button>
          </div>
        </form>
      <?php } ?>
    </div>
  </main>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <a href="#" data-bs-toggle="modal" data-bs-target="#adminLoginModal">
            <i class="fas fa-lock me-2"></i>Admin Login
          </a>
        </div>
        <div class="col-md-4">
          <a href="#" data-bs-toggle="modal" data-bs-target="#developersModal">
            <i class="fas fa-code me-2"></i>Developers
          </a>
        </div>
        <div class="col-md-4">
          <a href="feedback.php">
            <i class="fas fa-comment me-2"></i>Feedback
          </a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Login Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">
            <i class="fas fa-sign-in-alt me-2"></i>Login
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="login.php?q=index.php" method="POST">
            <div class="mb-3">
              <label for="loginEmail" class="form-label">Email address</label>
              <input type="email" class="form-control" id="loginEmail" name="email" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
              <label for="loginPassword" class="form-label">Password</label>
              <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Enter your password" required>
            </div>
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-sign-in-alt me-2"></i>Login
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Developers Modal -->
  <div class="modal fade" id="developersModal" tabindex="-1" aria-labelledby="developersModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="developersModalLabel">
            <i class="fas fa-code me-2"></i>Developers
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="developer-card">
            <img src="../image/satish.jpg" alt="Satish Kumar Dhurve " class="developer-img">
            <div class="developer-info">
              <h4>Satish Kumar Dhurve </h4>
              <p><i class="fas fa-phone me-2"></i>1234567890</p>
              <p><i class="fas fa-envelope me-2"></i> SKD10@gmail.com</p>
              <p><i class="fas fa-university me-2"></i>MITS Gwalior</p>
              <a href="#" target="_blank"><i class="fab fa-facebook me-2"></i>Find on Facebook</a>
            </div>
          </div>

          <div class="developer-card">
            <img src="../image/rahul1.png" alt="Rahul Shah" class="developer-img">
            <div class="developer-info">
              <h4>Rahul Shah</h4>
              <p><i class="fas fa-phone me-2"></i>1234567890</p>
              <p><i class="fas fa-envelope me-2"></i> rdh10@gmail.com</p>
              <p><i class="fas fa-university me-2"></i>MITS Gwalior</p>
              <a href="#" target="_blank"><i class="fab fa-facebook me-2"></i>Find on Facebook</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Admin Login Modal -->
  <div class="modal fade" id="adminLoginModal" tabindex="-1" aria-labelledby="adminLoginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="adminLoginModalLabel">
            <i class="fas fa-user-shield me-2"></i>Admin Login
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="admin.php?q=index.php">
            <div class="mb-3">
              <label for="adminUser" class="form-label">Admin ID</label>
              <input type="text" class="form-control" id="adminUser" name="uname" placeholder="Admin user id" required>
            </div>
            <div class="mb-3">
              <label for="adminPassword" class="form-label">Password</label>
              <input type="password" class="form-control" id="adminPassword" name="password" placeholder="Password" required>
            </div>
            <div class="d-grid gap-2">
              <button type="submit" name="login" class="btn btn-primary">
                <i class="fas fa-sign-in-alt me-2"></i>Login
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap 5 JS Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- jQuery -->
  <script src="../js/jquery.js"></script>

  <!-- Custom JavaScript -->
  <script>
    // Show alert if there's a message in URL
    $(document).ready(function() {
      <?php if (@$_GET['w']) { ?>
        // Create a Bootstrap toast notification
        const toast = document.createElement('div');
        toast.className = 'position-fixed top-0 end-0 p-3';
        toast.style.zIndex = '1100';
        toast.innerHTML = `
          <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-warning">
              <strong class="me-auto">Notification</strong>
              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
              <?php echo $_GET['w']; ?>
            </div>
          </div>
        `;
        document.body.appendChild(toast);

        // Auto-dismiss after 5 seconds
        setTimeout(() => {
          const bsToast = bootstrap.Toast.getOrCreateInstance(toast.querySelector('.toast'));
          bsToast.hide();
        }, 5000);
      <?php } ?>
    });
  </script>
</body>

</html>