<?php
// This must be the VERY FIRST LINE in your file
session_start();
include_once 'dbConnection.php';
if (!isset($_SESSION['email'])) {
  header("Location: index.php?error=not_logged_in");
  exit();
}
$email = $_SESSION['email'];

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
      --card-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      --transition: all 0.3s ease;
    }
    
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f5f7fa;
      color: var(--dark-color);
      line-height: 1.6;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
    
    .header {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      color: white;
      padding: 1rem 0;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      position: sticky;
      top: 0;
      z-index: 1000;
    }
    
    .logo {
      font-size: 1.8rem;
      font-weight: 700;
      color: white;
      display: flex;
      align-items: center;
      text-decoration: none;
      transition: var(--transition);
    }
    
    .logo:hover {
      color: var(--accent-color);
    }
    
    .logo i {
      margin-right: 10px;
      color: var(--accent-color);
    }
    
    .bg {
      background-color: #f5f7fa;
      flex: 1;
      padding-bottom: 2rem;
    }
    
    /* Navigation */
    .navbar {
      border-radius: 0;
      margin-bottom: 0;
      border: none;
      box-shadow: var(--card-shadow);
    }
    
    .navbar-default {
      background-color: white;
    }
    
    .navbar-nav > li > a {
      color: var(--dark-color);
      font-weight: 500;
      transition: var(--transition);
    }
    
    .navbar-nav > li > a:hover {
      color: var(--primary-color);
      background-color: transparent;
    }
    
    .navbar-nav > li.active > a {
      color: var(--primary-color);
      background-color: transparent;
      font-weight: 600;
    }
    
    /* Panels and Cards */
    .panel {
      background-color: white;
      border-radius: 10px;
      box-shadow: var(--card-shadow);
      padding: 2rem;
      margin-bottom: 2rem;
      border: none;
      transition: var(--transition);
    }
    
    .panel:hover {
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
      transform: translateY(-3px);
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
    
    /* Tables */
    .table {
      width: 100%;
      margin-bottom: 1rem;
      color: var(--dark-color);
    }
    
    .table th {
      font-weight: 600;
      background-color: #f8f9fa;
    }
    
    .table-striped tbody tr:nth-of-type(odd) {
      background-color: rgba(0, 0, 0, 0.02);
    }
    
    /* Buttons */
    .btn {
      border-radius: 5px;
      padding: 10px 20px;
      font-weight: 500;
      transition: var(--transition);
      border: none;
    }
    
    .btn-primary {
      background-color: var(--primary-color);
    }
    
    .btn-primary:hover {
      background-color: var(--secondary-color);
      transform: translateY(-2px);
    }
    
    .btn-success {
      background-color: var(--success-color);
    }
    
    .btn-success:hover {
      background-color: #3a9a32;
      transform: translateY(-2px);
    }
    
    .btn-danger {
      background-color: var(--danger-color);
    }
    
    .btn-danger:hover {
      background-color: #e60000;
      transform: translateY(-2px);
    }
    
    .btn-warning {
      background-color: var(--warning-color);
      color: var(--dark-color);
    }
    
    .btn-warning:hover {
      background-color: #e6b800;
      transform: translateY(-2px);
    }
    
    /* Forms */
    .form-control {
      border-radius: 5px;
      padding: 12px 15px;
      border: 1px solid #e0e0e0;
      margin-bottom: 1rem;
      transition: var(--transition);
    }
    
    .form-control:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.25);
    }
    
    /* Quiz Questions */
    .quiz-question {
      font-size: 1.2rem;
      font-weight: 500;
      margin-bottom: 1.5rem;
    }
    
    .quiz-options {
      margin-bottom: 2rem;
    }
    
    .quiz-option {
      display: block;
      margin-bottom: 1rem;
      cursor: pointer;
    }
    
    .quiz-option input[type="radio"] {
      margin-right: 10px;
    }
    
    /* Results */
    .result-card {
      text-align: center;
      padding: 2rem;
      margin-bottom: 2rem;
    }
    
    .result-score {
      font-size: 3rem;
      font-weight: 700;
      color: var(--primary-color);
      margin-bottom: 1rem;
    }
    
    /* Footer */
    .footer {
      background-color: var(--dark-color);
      color: white;
      padding: 2rem 0;
      margin-top: auto;
    }
    
    .footer a {
      color: var(--accent-color);
      text-decoration: none;
      transition: var(--transition);
    }
    
    .footer a:hover {
      color: white;
    }
    
    /* Animations */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    
    .animate-fade {
      animation: fadeIn 0.6s ease-out forwards;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
      .logo {
        font-size: 1.5rem;
      }
      
      .panel {
        padding: 1.5rem;
      }
      
      .navbar-nav {
        margin: 0 -15px;
      }
      
      .navbar-nav > li > a {
        padding: 10px 15px;
      }
    }
    
    /* Countdown timer */
    .countdown-timer {
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--danger-color);
      text-align: center;
      margin: 1rem 0;
    }
    
    /* Progress bar */
    .progress-container {
      margin-bottom: 1.5rem;
    }
    
    .progress-label {
      display: flex;
      justify-content: space-between;
      margin-bottom: 0.5rem;
    }
  </style>
</head>

<body>
  <!-- <?php
  include_once 'dbConnection.php';
  session_start();
  ?> -->

  <div class="header">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <a href="account.php?q=1" class="logo animate-fade">
            <i class="fas fa-graduation-cap"></i> Online Exam System
          </a>
        </div>
        <div class="col-md-4 col-md-offset-2 text-end">
          <?php if (isset($_SESSION['email'])) { ?>
            <div class="dropdown">
              <button class="btn btn-outline-light dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-circle me-2"></i><?php echo $_SESSION['name']; ?>
              </button>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="account.php?q=1"><i class="fas fa-home me-2"></i>Dashboard</a></li>
                <li><a class="dropdown-item" href="account.php?q=1"><i class="fas fa-user me-2"></i>Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="logout.php?q=account.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
              </ul>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <div class="bg">
    <!-- Navigation Menu -->
    <nav class="navbar navbar-expand-lg navbar-default">
      <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="mainNav">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link<?php if (@$_GET['q'] == 1) echo ' active'; ?>" href="account.php?q=1">
                <i class="fas fa-home me-1"></i> Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link<?php if (@$_GET['q'] == 2) echo ' active'; ?>" href="account.php?q=2">
                <i class="fas fa-history me-1"></i> History
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link<?php if (@$_GET['q'] == 3) echo ' active'; ?>" href="account.php?q=3">
                <i class="fas fa-trophy me-1"></i> Ranking
              </a>
            </li>
          </ul>
          
          <form class="d-flex">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search exams..." aria-label="Search">
              <button class="btn btn-outline-primary" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </form>
        </div>
      </div>
    </nav>

    <div class="container mt-4">
      <div class="row">
        <div class="col-md-12">
          <!-- Home/Quiz List -->
          <?php if (@$_GET['q'] == 1) { ?>
            <div class="panel animate-fade">
              <h3 class="panel-title"><i class="fas fa-list-alt me-2"></i>Available Tests</h3>
              
              <?php
              $result = mysqli_query($con, "SELECT * FROM quiz ORDER BY date DESC") or die('Error');
              if (mysqli_num_rows($result) > 0) {
                echo '<div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Topic</th>
                        <th>Questions</th>
                        <th>Total Marks</th>
                        <th>Time Limit</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>';
                
                $c = 1;
                while ($row = mysqli_fetch_array($result)) {
                  $title = $row['title'];
                  $total = $row['total'];
                  $sahi = $row['sahi'];
                  $time = $row['time'];
                  $eid = $row['eid'];
                  
                  $q12 = mysqli_query($con, "SELECT score FROM history WHERE eid='$eid' AND email='{$_SESSION['email']}'") or die('Error98');
                  $rowcount = mysqli_num_rows($q12);
                  
                  echo '<tr>';
                  echo '<td>' . $c++ . '</td>';
                  echo '<td>' . $title . '</td>';
                  echo '<td>' . $total . '</td>';
                  echo '<td>' . ($sahi * $total) . '</td>';
                  echo '<td>' . $time . ' min</td>';
                  
                  if ($rowcount == 0) {
                    echo '<td>
                      <a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=1&t=' . $total . '" class="btn btn-success btn-sm">
                        <i class="fas fa-play me-1"></i> Start
                      </a>
                    </td>';
                  } else {
                    echo '<td>
                      <a href="update.php?q=quizre&step=25&eid=' . $eid . '&n=1&t=' . $total . '" class="btn btn-warning btn-sm">
                        <i class="fas fa-redo me-1"></i> Retake
                      </a>
                    </td>';
                  }
                  
                  echo '</tr>';
                }
                
                echo '</tbody></table></div>';
              } else {
                echo '<div class="alert alert-info">No quizzes available at the moment. Please check back later.</div>';
              }
              ?>
            </div>
          <?php } ?>

          <!-- Quiz Questions -->
          <?php if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2) {
            $eid = @$_GET['eid'];
            $sn = @$_GET['n'];
            $total = @$_GET['t'];
            $q = mysqli_query($con, "SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' ");
            
            echo '<div class="panel animate-fade" style="animation-delay: 0.2s">';
            
            // Progress bar
            echo '<div class="progress-container">
              <div class="progress-label">
                <span>Question ' . $sn . ' of ' . $total . '</span>
                <span>' . round(($sn / $total) * 100) . '% Complete</span>
              </div>
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: ' . ($sn / $total) * 100 . '%;" 
                  aria-valuenow="' . ($sn / $total) * 100 . '" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>';
            
            while ($row = mysqli_fetch_array($q)) {
              $qns = $row['qns'];
              $qid = $row['qid'];
              echo '<div class="quiz-question">' . $qns . '</div>';
            }
            
            $q = mysqli_query($con, "SELECT * FROM options WHERE qid='$qid' ");
            echo '<form action="update.php?q=quiz&step=2&eid=' . $eid . '&n=' . $sn . '&t=' . $total . '&qid=' . $qid . '" method="POST">';
            
            while ($row = mysqli_fetch_array($q)) {
              $option = $row['option'];
              $optionid = $row['optionid'];
              echo '<div class="quiz-option">
                <input type="radio" name="ans" id="option_' . $optionid . '" value="' . $optionid . '">
                <label for="option_' . $optionid . '">' . $option . '</label>
              </div>';
            }
            
            echo '<div class="d-grid gap-2 mt-4">
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-paper-plane me-2"></i>Submit Answer
              </button>
            </div>';
            echo '</form></div>';
          } ?>

          <!-- Quiz Results -->
          <?php if (@$_GET['q'] == 'result' && @$_GET['eid']) {
            $eid = @$_GET['eid'];
            $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND email='{$_SESSION['email']}'") or die('Error157');
            
            echo '<div class="panel animate-fade">
              <center><h1 class="panel-title"><i class="fas fa-award me-2"></i>Quiz Results</h1></center>';
            
            echo '<div class="row mt-4">';
            while ($row = mysqli_fetch_array($q)) {
              $s = $row['score'];
              $w = $row['wrong'];
              $r = $row['sahi'];
              $qa = $row['level'];
              
              // Result card
              echo '<div class="col-md-6 mb-4">
                <div class="card result-card">
                  <div class="result-score">' . $s . '</div>
                  <h3>Total Score</h3>
                  <p>Out of ' . ($qa * $r) . ' possible points</p>
                </div>
              </div>';
              
              // Stats card
              echo '<div class="col-md-6 mb-4">
                <div class="card h-100">
                  <div class="card-body">
                    <h4 class="card-title"><i class="fas fa-chart-pie me-2"></i>Performance Breakdown</h4>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total Questions
                        <span class="badge bg-primary rounded-pill">' . $qa . '</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        Correct Answers
                        <span class="badge bg-success rounded-pill">' . $r . '</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        Wrong Answers
                        <span class="badge bg-danger rounded-pill">' . $w . '</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        Accuracy
                        <span class="badge bg-info rounded-pill">' . round(($r / $qa) * 100) . '%</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>';
            }
            
            // Overall ranking
            $q = mysqli_query($con, "SELECT * FROM rank WHERE email='{$_SESSION['email']}'") or die('Error157');
            while ($row = mysqli_fetch_array($q)) {
              $s = $row['score'];
              echo '<div class="col-12">
                <div class="card">
                  <div class="card-body text-center">
                    <h4 class="card-title"><i class="fas fa-trophy me-2"></i>Your Overall Score</h4>
                    <h2 class="display-4 text-primary">' . $s . '</h2>
                    <a href="account.php?q=3" class="btn btn-outline-primary mt-3">
                      <i class="fas fa-ranking-star me-2"></i>View Full Ranking
                    </a>
                  </div>
                </div>
              </div>';
            }
            
            echo '</div></div>';
          } ?>

          <!-- History -->
          <?php if (@$_GET['q'] == 2) {
            $q = mysqli_query($con, "SELECT * FROM history WHERE email='{$_SESSION['email']}' ORDER BY date DESC") or die('Error197');
            
            echo '<div class="panel animate-fade">
              <h3 class="panel-title"><i class="fas fa-history me-2"></i>Exam History</h3>';
            
            if (mysqli_num_rows($q) > 0) {
              echo '<div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Exam</th>
                      <th>Questions</th>
                      <th>Correct</th>
                      <th>Wrong</th>
                      <th>Score</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>';
              
              $c = 0;
              while ($row = mysqli_fetch_array($q)) {
                $eid = $row['eid'];
                $s = $row['score'];
                $w = $row['wrong'];
                $r = $row['sahi'];
                $qa = $row['level'];
                $date = date("d M Y", strtotime($row['date']));
                
                $q23 = mysqli_query($con, "SELECT title FROM quiz WHERE eid='$eid'") or die('Error208');
                $title = mysqli_fetch_array($q23)['title'];
                
                echo '<tr>
                  <td>' . ++$c . '</td>
                  <td>' . $title . '</td>
                  <td>' . $qa . '</td>
                  <td class="text-success">' . $r . '</td>
                  <td class="text-danger">' . $w . '</td>
                  <td><strong>' . $s . '</strong></td>
                  <td>' . $date . '</td>
                </tr>';
              }
              
              echo '</tbody></table></div>';
            } else {
              echo '<div class="alert alert-info">You haven\'t taken any exams yet.</div>';
            }
            
            echo '</div>';
          } ?>

          <!-- Ranking -->
          <?php if (@$_GET['q'] == 3) {
            $q = mysqli_query($con, "SELECT * FROM rank ORDER BY score DESC") or die('Error223');
            
            echo '<div class="panel animate-fade">
              <h3 class="panel-title"><i class="fas fa-trophy me-2"></i>Leaderboard</h3>';
            
            if (mysqli_num_rows($q) > 0) {
              echo '<div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Rank</th>
                      <th>Name</th>
                      <th>College</th>
                      <th>Score</th>
                    </tr>
                  </thead>
                  <tbody>';
              
              $c = 0;
              while ($row = mysqli_fetch_array($q)) {
                $e = $row['email'];
                $s = $row['score'];
                
                $q12 = mysqli_query($con, "SELECT * FROM user WHERE email='$e'") or die('Error231');
                $user = mysqli_fetch_array($q12);
                $name = $user['name'];
                $college = $user['college'];
                
                $rankClass = '';
                if ($c == 0) $rankClass = 'bg-warning text-dark';
                elseif ($c == 1) $rankClass = 'bg-secondary text-white';
                elseif ($c == 2) $rankClass = 'bg-danger text-white';
                
                echo '<tr>
                  <td><span class="badge ' . $rankClass . '">' . ++$c . '</span></td>
                  <td>' . $name . '</td>
                  <td>' . $college . '</td>
                  <td><strong>' . $s . '</strong></td>
                </tr>';
              }
              
              echo '</tbody></table></div>';
            } else {
              echo '<div class="alert alert-info">No ranking data available.</div>';
            }
            
            echo '</div>';
          } ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer">
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
  </footer>

  <!-- Developers Modal -->
  <div class="modal fade" id="developers" tabindex="-1" aria-labelledby="developersModalLabel" aria-hidden="true">
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
            <img src="../image/satish.jpg" alt="skd" class="developer-img">
            <div class="developer-info">
              <h4>Satish Kumar Dhurve</h4>
              <p><i class="fas fa-phone me-2"></i>1234567890</p>
              <p><i class="fas fa-envelope me-2"></i> SKD10@gmail.com</p>
              <p><i class="fas fa-university me-2"></i>MITS Gwalior</p>
              <a href="#" target="_blank"><i class="fab fa-facebook me-2"></i>Find on Facebook</a>
            </div>
          </div>

          <div class="developer-card">
            <img src="../image/rahul1.png" alt="rs" class="developer-img">
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
            <i class="fas fa-user-shield me-2"></i>Admin Login
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="admin.php?q=index.php">
            <div class="mb-3">
              <label for="uname" class="form-label">Admin ID</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" id="uname" name="uname" maxlength="20" placeholder="Admin user id" class="form-control" required>
              </div>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input type="password" id="password" name="password" maxlength="15" placeholder="Password" class="form-control" required>
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
    // Alert message handling
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
          $(toast).find('.toast').toast('hide');
          setTimeout(() => toast.remove(), 500);
        }, 5000);
      <?php } ?>
      
      // Add hover effects to panels
      $('.panel').hover(
        function() {
          $(this).css('transform', 'translateY(-5px)');
        },
        function() {
          $(this).css('transform', 'translateY(0)');
        }
      );
      
      // Quiz timer functionality
      if (window.location.search.includes('q=quiz&step=2')) {
        const timeLimit = 40; // 40 minutes for the quiz
        let timeLeft = timeLimit * 60; // Convert to seconds
        
        // Create timer display
        const timer = document.createElement('div');
        timer.className = 'countdown-timer';
        timer.innerHTML = `
          <i class="fas fa-clock me-2"></i>
          <span id="quiz-time">${Math.floor(timeLeft / 60)}:${(timeLeft % 60).toString().padStart(2, '0')}</span>
        `;
        document.querySelector('.panel').prepend(timer);
        
        // Update timer every second
        const timerInterval = setInterval(() => {
          timeLeft--;
          
          const minutes = Math.floor(timeLeft / 60);
          const seconds = timeLeft % 60;
          
          document.getElementById('quiz-time').textContent = 
            `${minutes}:${seconds.toString().padStart(2, '0')}`;
          
          // Change color when time is running out
          if (timeLeft <= 300) { // 5 minutes left
            timer.style.color = 'var(--danger-color)';
          }
          
          // Time's up!
          if (timeLeft <= 0) {
            clearInterval(timerInterval);
            document.getElementById('quiz-time').textContent = "Time's up!";
            // Here you could automatically submit the quiz
          }
        }, 1000);
      }
    });
  </script>
</body>
</html>