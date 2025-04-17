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
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Digital Exam System</title>
  
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
  
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
      --warning-color: #ffcc00;
    }
    
    body {
      font-family: 'Poppins', sans-serif;
      background-color:rgb(255, 255, 255);
      color: var(--dark-color);
      line-height: 1.6;
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
      display: flex;
      align-items: center;
    }
    
    .logo i {
      margin-right: 10px;
      color: var(--accent-color);
    }
    
    .bg1 {
      background: url('../image/background.png') no-repeat center center/cover;
      /* background-color: white; */
      min-height: 100vh;
      position: relative;
    }
    
    .bg1::before {
      content: '';
      /* position: absolute; */
      top: 0;
      left: 0;
      width: 100%;
      height: 90%;
      background: rgb(255, 255, 255);
    }
    
    .panel {
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      padding: 2rem;
      margin: 2rem 0;
      position: relative;
      z-index: 1;
      border: none;
    }
    
    .panel-title {
      font-size: 1.5rem;
      font-weight: 600;
      color: var(--primary-color);
      margin-bottom: 1.5rem;
      text-align: center;
      position: relative;
    }
    
    .panel-title::after {
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
    }
    
    .form-control:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.25);
    }
    
    .btn {
      border-radius: 5px;
      padding: 10px 20px;
      font-weight: 500;
      transition: all 0.3s ease;
    }
    
    .btn-primary {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
    }
    
    .btn-primary:hover {
      background-color: var(--secondary-color);
      border-color: var(--secondary-color);
      transform: translateY(-2px);
    }
    
    .btn-danger {
      background-color: var(--danger-color);
      border-color: var(--danger-color);
    }
    
    .btn-danger:hover {
      background-color: #e60000;
      border-color: #e60000;
      transform: translateY(-2px);
    }
    
    .footer {
      background-color: var(--dark-color);
      color: white;
      padding: 2rem 0;
      margin-top: auto;
    }
    
    .footer a {
      color: var(--accent-color);
      text-decoration: none;
      transition: color 0.3s ease;
    }
    
    .footer a:hover {
      color: white;
    }
    
    .box {
      text-align: center;
      padding: 1rem;
      transition: all 0.3s ease;
    }
    
    .box:hover {
      transform: translateY(-5px);
    }
    
    .box i {
      font-size: 1.5rem;
      margin-bottom: 0.5rem;
      color: var(--accent-color);
    }
    
    /* Modal enhancements */
    .modal-content {
      border-radius: 10px;
      border: none;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }
    
    .modal-header {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      color: white;
      border-radius: 10px 10px 0 0 !important;
    }
    
    .modal-title {
      font-weight: 600;
    }
    
    .close {
      color: white;
      opacity: 0.8;
    }
    
    .close:hover {
      color: white;
      opacity: 1;
    }
    
    /* Developer card */
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
      
      .panel {
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
    
    /* Animation */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    
    .animate-fade {
      animation: fadeIn 0.6s ease-out forwards;
    }
    
    /* Input validation */
    input:invalid {
      border-color: var(--danger-color);
    }
    
    input:valid {
      border-color: #28a745;
    }
  </style>
</head>

<body class="d-flex flex-column min-vh-100">
  <div class="header">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <span class="logo animate-fade">
            <i class="fas fa-graduation-cap"></i> Online Exam System
          </span>
        </div>
        <div class="col-md-2 col-md-offset-4">
          <a href="#" class="pull-right btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#myModal">
            <i class="fas fa-sign-in-alt"></i>&nbsp;<b>Login</b>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Login Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel"><i class="fas fa-user-circle me-2"></i> USER LOGIN</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="login.php?q=index.php" method="POST">
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                <input id="email" name="email" placeholder="Email" class="form-control" type="email" required>
              </div>
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input id="password" name="password" placeholder="Password" class="form-control" type="password" required>
              </div>
            </div>

            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-sign-in-alt me-2"></i>Log in
              </button>
            </div>
          </form>
        </div>
        <div class="modal-footer justify-content-center">
          <p class="mb-0">Don't have an account? <a href="#" data-bs-dismiss="modal" style="color: var(--primary-color);">Register here</a></p>
        </div>
      </div>
    </div>
  </div>

  <div class="bg1 flex-grow-1">
    <div class="container">
      <div class="row justify-content-end">
        <div class="col-lg-5 col-md-6">
          <div class="panel animate-fade" style="animation-delay: 0.2s">
            <form class="form-horizontal" name="form" action="sign.php?q=account.php" onSubmit="return validateForm()" method="POST">
              <h3 class="panel-title"><i class="fas fa-user-plus me-2"></i>Register Now</h3>

              <div class="mb-3">
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                  <input id="name" name="name" placeholder="Fullname" class="form-control" type="text" required>
                </div>
              </div>

              <div class="mb-3">
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                  <select id="gender" name="gender" class="form-control" required>
                    <option value="" disabled selected>Select Gender</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                  </select>
                </div>
              </div>

              <div class="mb-3">
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-university"></i></span>
                  <input id="college" name="college" placeholder="College Name" class="form-control" type="text" required>
                </div>
              </div>

              <div class="mb-3">
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  <input id="email" name="email" placeholder="Email ID" class="form-control" type="email" required>
                </div>
              </div>

              <div class="mb-3">
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  <input id="mob" name="mob" placeholder="Contact Number" class="form-control" type="number" required>
                </div>
              </div>

              <div class="mb-3">
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-key"></i></span>
                  <input id="password" name="password" placeholder="Password" class="form-control" type="password" required>
                </div>
                <small class="text-muted">Password must be 5-25 characters long</small>
              </div>

              <div class="mb-3">
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-key"></i></span>
                  <input id="cpassword" name="cpassword" placeholder="Confirm Password" class="form-control" type="password" required>
                </div>
              </div>

              <?php if (@$_GET['q7']) {
                echo '<div class="alert alert-danger">' . @$_GET['q7'] . '</div>';
              } ?>

              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-danger">
                  <i class="fas fa-user-edit me-2"></i>Register
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <div class="footer">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-4 box">
          <a href="#" data-bs-toggle="modal" data-bs-target="#login">
            <i class="fas fa-lock me-2"></i>Admin Login
          </a>
        </div>
        <div class="col-md-4 box">
          <a href="#" data-bs-toggle="modal" data-bs-target="#developers">
            <i class="fas fa-code me-2"></i>Developers
          </a>
        </div>
        <div class="col-md-4 box">
          <a href="feedback.php" target="_blank">
            <i class="fas fa-comment me-2"></i>Feedback
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Developers Modal -->
  <div class="modal fade" id="developers" tabindex="-1" aria-labelledby="developersModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="developersModalLabel">
            <i class="fas fa-code me-2"></i><span style="color: var(--accent-color)">Developers</span>
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
  <div class="modal fade" id="login" tabindex="-1" aria-labelledby="adminLoginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="adminLoginModalLabel">
            <i class="fas fa-user-shield me-2"></i>ADMIN LOGIN
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="admin.php?q=index.php">
            <div class="mb-3">
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                <input type="text" name="uname" maxlength="20" placeholder="Admin Email" class="form-control" required>
              </div>
            </div>
            <div class="mb-3">
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input type="password" name="password" maxlength="15" placeholder="Password" class="form-control" required>
              </div>
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
  <script src="../js/jquery.js" type="text/javascript"></script>
  
  <!-- Custom JavaScript -->
  <script>
    function validateForm() {
      var y = document.forms["form"]["name"].value;
      var letters = /^[A-Za-z\s]+$/;
      if (y == null || y == "") {
        alert("Name must be filled out.");
        return false;
      }
      if (!letters.test(y)) {
        alert("Name must contain only letters and spaces.");
        return false;
      }
      
      var gender = document.forms["form"]["gender"].value;
      if (gender == "" || gender == "Male") {
        alert("Please select your gender.");
        return false;
      }
      
      var z = document.forms["form"]["college"].value;
      if (z == null || z == "") {
        alert("College must be filled out.");
        return false;
      }
      
      var x = document.forms["form"]["email"].value;
      var atpos = x.indexOf("@");
      var dotpos = x.lastIndexOf(".");
      if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
        alert("Not a valid e-mail address.");
        return false;
      }
      
      var mob = document.forms["form"]["mob"].value;
      if (mob == null || mob == "" || mob.length != 10) {
        alert("Please enter a valid 10-digit contact number.");
        return false;
      }
      
      var a = document.forms["form"]["password"].value;
      if (a == null || a == "") {
        alert("Password must be filled out");
        return false;
      }
      if (a.length < 5 || a.length > 25) {
        alert("Passwords must be 5 to 25 characters long.");
        return false;
      }
      
      var b = document.forms["form"]["cpassword"].value;
      if (a != b) {
        alert("Passwords must match.");
        return false;
      }
      
      return true;
    }
    
    // Show alert if there's a message in URL
    $(document).ready(function() {
      <?php if (@$_GET['w']) { ?>
        // Create a Bootstrap alert instead of native alert
        const alertDiv = document.createElement('div');
        alertDiv.className = 'alert alert-warning alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3';
        alertDiv.style.zIndex = '1100';
        alertDiv.innerHTML = `
          <strong>Notice:</strong> <?php echo $_GET['w']; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        `;
        document.body.appendChild(alertDiv);
        
        // Auto-dismiss after 5 seconds
        setTimeout(() => {
          const bsAlert = new bootstrap.Alert(alertDiv);
          bsAlert.close();
        }, 5000);
      <?php } ?>
      
      // Add animation to elements
      $('.panel, .box').hover(
        function() {
          $(this).css('transform', 'translateY(-5px)');
        },
        function() {
          $(this).css('transform', 'translateY(0)');
        }
      );
    });
  </script>
</body>
</html>