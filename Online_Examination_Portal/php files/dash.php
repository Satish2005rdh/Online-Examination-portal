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
  <title>Admin Dashboard - Online Exam System</title>
  
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
      --warning-color: #ffcc00;
      --sidebar-width: 250px;
    }
    
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f5f7fa;
      color: var(--dark-color);
      min-height: 100vh;
    }
    
    .sidebar {
      width: var(--sidebar-width);
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      color: white;
      position: fixed;
      height: 100vh;
      padding: 20px 0;
      box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
      z-index: 1000;
    }
    
    .sidebar-brand {
      padding: 10px 20px;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      font-size: 1.5rem;
      font-weight: 700;
      color: white;
    }
    
    .sidebar-brand i {
      margin-right: 10px;
      color: var(--accent-color);
    }
    
    .sidebar-nav {
      list-style: none;
      padding: 0;
    }
    
    .sidebar-nav li {
      position: relative;
    }
    
    .sidebar-nav li a {
      display: block;
      padding: 12px 20px;
      color: rgba(255, 255, 255, 0.8);
      text-decoration: none;
      transition: all 0.3s ease;
    }
    
    .sidebar-nav li a:hover,
    .sidebar-nav li a.active {
      color: white;
      background-color: rgba(255, 255, 255, 0.1);
    }
    
    .sidebar-nav li a i {
      margin-right: 10px;
      width: 20px;
      text-align: center;
    }
    
    .sidebar-nav li a.active::before {
      content: '';
      position: absolute;
      left: 0;
      top: 0;
      height: 100%;
      width: 4px;
      background-color: var(--accent-color);
    }
    
    .main-content {
      margin-left: var(--sidebar-width);
      padding: 20px;
      transition: all 0.3s ease;
    }
    
    .topbar {
      background-color: white;
      padding: 15px 20px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
      border-radius: 5px;
    }
    
    .user-menu {
      display: flex;
      align-items: center;
    }
    
    .user-menu img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-right: 10px;
    }
    
    .card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
      transition: all 0.3s ease;
    }
    
    .card:hover {
      box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
      transform: translateY(-3px);
    }
    
    .card-header {
      background-color: white;
      border-bottom: 1px solid rgba(0, 0, 0, 0.1);
      font-weight: 600;
      padding: 15px 20px;
      border-radius: 10px 10px 0 0 !important;
    }
    
    .table-responsive {
      border-radius: 10px;
      overflow: hidden;
    }
    
    .table {
      margin-bottom: 0;
    }
    
    .table th {
      background-color: #f8f9fa;
      font-weight: 600;
    }
    
    .btn-action {
      padding: 5px 10px;
      font-size: 0.875rem;
    }
    
    .btn-danger {
      background-color: var(--danger-color);
      border-color: var(--danger-color);
    }
    
    .btn-danger:hover {
      background-color: #e60000;
      border-color: #e60000;
    }
    
    .btn-primary {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
    }
    
    .btn-primary:hover {
      background-color: var(--secondary-color);
      border-color: var(--secondary-color);
    }
    
    .form-control {
      border-radius: 5px;
      padding: 10px 15px;
    }
    
    .form-control:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.25);
    }
    
    .badge-success {
      background-color: var(--success-color);
    }
    
    .badge-warning {
      background-color: var(--warning-color);
      color: var(--dark-color);
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
      .sidebar {
        width: 0;
        overflow: hidden;
      }
      
      .main-content {
        margin-left: 0;
      }
      
      .sidebar.active {
        width: var(--sidebar-width);
      }
      
      .main-content.active {
        margin-left: var(--sidebar-width);
      }
    }
    
    /* Toggle button for mobile */
    .sidebar-toggle {
      display: none;
      background: none;
      border: none;
      font-size: 1.5rem;
      color: var(--dark-color);
    }
    
    @media (max-width: 768px) {
      .sidebar-toggle {
        display: block;
      }
    }
    
    /* Animation */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
    
    .animate-fade {
      animation: fadeIn 0.3s ease-out forwards;
    }
  </style>
</head>

<body>
  <!-- <?php
  include_once 'dbConnection.php';
  session_start();
  if (!(isset($_SESSION['email']))) {
    header("location:index.php");
  }
  $email = $_SESSION['email'];
  $name = $_SESSION['name'];
  ?> -->

  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <div class="sidebar-brand">
      <i class="fas fa-graduation-cap"></i>
      <span>Exam System</span>
    </div>
    
    <ul class="sidebar-nav">
      <li>
        <a href="dash.php?q=0" class="<?php if (@$_GET['q'] == 0) echo 'active'; ?>">
          <i class="fas fa-home"></i> Dashboard
        </a>
      </li>
      <li>
        <a href="dash.php?q=1" class="<?php if (@$_GET['q'] == 1) echo 'active'; ?>">
          <i class="fas fa-users"></i> Users
        </a>
      </li>
      <li>
        <a href="dash.php?q=2" class="<?php if (@$_GET['q'] == 2) echo 'active'; ?>">
          <i class="fas fa-trophy"></i> Rankings
        </a>
      </li>
      <li>
        <a href="dash.php?q=3" class="<?php if (@$_GET['q'] == 3) echo 'active'; ?>">
          <i class="fas fa-comment"></i> Feedback
        </a>
      </li>
      <li>
        <a href="dash.php?q=4" class="<?php if (@$_GET['q'] == 4) echo 'active'; ?>">
          <i class="fas fa-plus-circle"></i> Add Exam
        </a>
      </li>
      <li>
        <a href="logout.php?q=account.php">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </li>
    </ul>
  </div>

  <!-- Main Content -->
  <div class="main-content" id="main-content">
    <!-- Topbar -->
    <div class="topbar animate-fade">
      <button class="sidebar-toggle" id="sidebarToggle">
        <i class="fas fa-bars"></i>
      </button>
      
      <div class="user-menu">
        <span class="me-3"><i class="fas fa-user-circle me-2"></i>Hello, <?php echo $name; ?></span>
        <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($name); ?>&background=random" alt="User Avatar">
      </div>
    </div>

    <!-- Dashboard Content -->
    <div class="container-fluid">
      <?php if (@$_GET['q'] == 0) { ?>
        <!-- Dashboard Home -->
        <div class="row">
          <div class="col-12">
            <div class="card animate-fade">
              <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-list-alt me-2"></i>Current Exams</h5>
              </div>
              <div class="card-body">
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
                          <th>Marks</th>
                          <th>Time Limit</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>';
                  
                  $c = 1;
                  while ($row = mysqli_fetch_array($result)) {
                    echo '<tr>
                      <td>' . $c++ . '</td>
                      <td>' . $row['title'] . '</td>
                      <td>' . $row['total'] . '</td>
                      <td>' . ($row['sahi'] * $row['total']) . '</td>
                      <td>' . $row['time'] . ' min</td>
                      <td>
                        <a href="update.php?q=rmquiz&eid=' . $row['eid'] . '" class="btn btn-danger btn-sm btn-action">
                          <i class="fas fa-trash"></i> Remove
                        </a>
                      </td>
                    </tr>';
                  }
                  
                  echo '</tbody></table></div>';
                } else {
                  echo '<div class="alert alert-info">No exams available yet.</div>';
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>

      <?php if (@$_GET['q'] == 1) { ?>
        <!-- Users Management -->
        <div class="row">
          <div class="col-12">
            <div class="card animate-fade">
              <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-users me-2"></i>User Management</h5>
              </div>
              <div class="card-body">
                <?php
                $result = mysqli_query($con, "SELECT * FROM user") or die('Error');
                if (mysqli_num_rows($result) > 0) {
                  echo '<div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Gender</th>
                          <th>College</th>
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>';
                  
                  $c = 1;
                  while ($row = mysqli_fetch_array($result)) {
                    echo '<tr>
                      <td>' . $c++ . '</td>
                      <td>' . $row['name'] . '</td>
                      <td>' . $row['gender'] . '</td>
                      <td>' . $row['college'] . '</td>
                      <td>' . $row['email'] . '</td>
                      <td>' . $row['mob'] . '</td>
                      <td>
                        <a href="update.php?demail=' . $row['email'] . '" class="btn btn-danger btn-sm btn-action" title="Delete User">
                          <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>';
                  }
                  
                  echo '</tbody></table></div>';
                } else {
                  echo '<div class="alert alert-info">No users registered yet.</div>';
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>

      <?php if (@$_GET['q'] == 2) { ?>
        <!-- User Rankings -->
        <div class="row">
          <div class="col-12">
            <div class="card animate-fade">
              <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-trophy me-2"></i>User Rankings</h5>
              </div>
              <div class="card-body">
                <?php
                $q = mysqli_query($con, "SELECT * FROM rank ORDER BY score DESC") or die('Error223');
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
                    
                    $rankClass = '';
                    if ($c == 0) $rankClass = 'bg-warning text-dark';
                    elseif ($c == 1) $rankClass = 'bg-secondary text-white';
                    elseif ($c == 2) $rankClass = 'bg-danger text-white';
                    
                    echo '<tr>
                      <td><span class="badge ' . $rankClass . '">' . ++$c . '</span></td>
                      <td>' . $user['name'] . '</td>
                      <td>' . $user['college'] . '</td>
                      <td><strong>' . $s . '</strong></td>
                    </tr>';
                  }
                  
                  echo '</tbody></table></div>';
                } else {
                  echo '<div class="alert alert-info">No ranking data available.</div>';
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>

      <?php if (@$_GET['q'] == 3) { ?>
        <!-- Feedback Management -->
        <div class="row">
          <div class="col-12">
            <div class="card animate-fade">
              <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-comment me-2"></i>Feedback</h5>
              </div>
              <div class="card-body">
                <?php
                if (@$_GET['fid']) {
                  // Feedback detail view
                  $id = @$_GET['fid'];
                  $result = mysqli_query($con, "SELECT * FROM feedback WHERE id='$id'") or die('Error');
                  while ($row = mysqli_fetch_array($result)) {
                    echo '<div class="card">
                      <div class="card-header bg-white">
                        <div class="d-flex justify-content-between align-items-center">
                          <h5 class="mb-0">' . $row['subject'] . '</h5>
                          <a href="dash.php?q=3" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-arrow-left"></i> Back
                          </a>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="mb-3">
                          <span class="text-muted"><i class="fas fa-calendar me-2"></i>' . date("d-m-Y", strtotime($row['date'])) . '</span>
                          <span class="text-muted mx-3"><i class="fas fa-clock me-2"></i>' . $row['time'] . '</span>
                          <span class="text-muted"><i class="fas fa-user me-2"></i>' . $row['name'] . '</span>
                          <span class="text-muted mx-3"><i class="fas fa-envelope me-2"></i>' . $row['email'] . '</span>
                        </div>
                        <div class="p-3 bg-light rounded">
                          ' . $row['feedback'] . '
                        </div>
                      </div>
                    </div>';
                  }
                } else {
                  // Feedback list view
                  $result = mysqli_query($con, "SELECT * FROM feedback ORDER BY date DESC") or die('Error');
                  if (mysqli_num_rows($result) > 0) {
                    echo '<div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Subject</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>By</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>';
                    
                    $c = 1;
                    while ($row = mysqli_fetch_array($result)) {
                      echo '<tr>
                        <td>' . $c++ . '</td>
                        <td><a href="dash.php?q=3&fid=' . $row['id'] . '">' . $row['subject'] . '</a></td>
                        <td>' . $row['email'] . '</td>
                        <td>' . date("d-m-Y", strtotime($row['date'])) . '</td>
                        <td>' . $row['name'] . '</td>
                        <td>
                          <a href="dash.php?q=3&fid=' . $row['id'] . '" class="btn btn-sm btn-primary me-1" title="View">
                            <i class="fas fa-eye"></i>
                          </a>
                          <a href="update.php?fdid=' . $row['id'] . '" class="btn btn-sm btn-danger" title="Delete">
                            <i class="fas fa-trash"></i>
                          </a>
                        </td>
                      </tr>';
                    }
                    
                    echo '</tbody></table></div>';
                  } else {
                    echo '<div class="alert alert-info">No feedback received yet.</div>';
                  }
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>

      <?php if (@$_GET['q'] == 4 && !(@$_GET['step'])) { ?>
        <!-- Add Exam Form -->
        <div class="row">
          <div class="col-md-8 mx-auto">
            <div class="card animate-fade">
              <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-plus-circle me-2"></i>Create New Exam</h5>
              </div>
              <div class="card-body">
                <form class="row g-3" name="form" action="update.php?q=addquiz" method="POST">
                  <div class="col-md-12">
                    <label for="name" class="form-label">Exam Title</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Exam Title" required>
                  </div>
                  
                  <div class="col-md-6">
                    <label for="total" class="form-label">Total Questions</label>
                    <input type="number" class="form-control" id="total" name="total" placeholder="Number of questions" required>
                  </div>
                  
                  <div class="col-md-6">
                    <label for="time" class="form-label">Time Limit (minutes)</label>
                    <input type="number" class="form-control" id="time" name="time" placeholder="Time limit" min="1" required>
                  </div>
                  
                  <div class="col-md-6">
                    <label for="right" class="form-label">Marks per Correct Answer</label>
                    <input type="number" class="form-control" id="right" name="right" placeholder="Marks for right answer" min="0" required>
                  </div>
                  
                  <div class="col-md-6">
                    <label for="wrong" class="form-label">Negative Marks per Wrong Answer</label>
                    <input type="number" class="form-control" id="wrong" name="wrong" placeholder="Marks deducted for wrong answer" min="0" required>
                  </div>
                  
                  <div class="col-md-12">
                    <label for="tag" class="form-label">Search Tags</label>
                    <input type="text" class="form-control" id="tag" name="tag" placeholder="Enter #tags for searching">
                  </div>
                  
                  <div class="col-md-12">
                    <label for="desc" class="form-label">Description</label>
                    <textarea class="form-control" id="desc" name="desc" rows="3" placeholder="Exam description..."></textarea>
                  </div>
                  
                  <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary px-4">
                      <i class="fas fa-save me-2"></i>Create Exam
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      
      <?php if (@$_GET['q'] == 4 && @$_GET['step'] == 2) { ?>
        <!-- Add Questions Form -->
        <div class="row">
          <div class="col-md-8 mx-auto">
            <div class="card animate-fade">
              <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-question-circle me-2"></i>Add Questions</h5>
              </div>
              <div class="card-body">
                <form class="row g-3" name="form" action="update.php?q=addqns&n=<?php echo @$_GET['n']; ?>&eid=<?php echo @$_GET['eid']; ?>&ch=4" method="POST">
                  <?php for ($i = 1; $i <= @$_GET['n']; $i++) { ?>
                    <div class="col-12">
                      <div class="card mb-4">
                        <div class="card-header bg-light">
                          <h6 class="mb-0">Question <?php echo $i; ?></h6>
                        </div>
                        <div class="card-body">
                          <div class="mb-3">
                            <label class="form-label">Question Text</label>
                            <textarea class="form-control" name="qns<?php echo $i; ?>" rows="3" placeholder="Enter question text..." required></textarea>
                          </div>
                          
                          <div class="row g-2">
                            <div class="col-md-6">
                              <label class="form-label">Option A</label>
                              <input type="text" class="form-control" name="<?php echo $i; ?>1" placeholder="Option A" required>
                            </div>
                            <div class="col-md-6">
                              <label class="form-label">Option B</label>
                              <input type="text" class="form-control" name="<?php echo $i; ?>2" placeholder="Option B" required>
                            </div>
                            <div class="col-md-6">
                              <label class="form-label">Option C</label>
                              <input type="text" class="form-control" name="<?php echo $i; ?>3" placeholder="Option C" required>
                            </div>
                            <div class="col-md-6">
                              <label class="form-label">Option D</label>
                              <input type="text" class="form-control" name="<?php echo $i; ?>4" placeholder="Option D" required>
                            </div>
                          </div>
                          
                          <div class="mt-3">
                            <label class="form-label">Correct Answer</label>
                            <select class="form-select" name="ans<?php echo $i; ?>" required>
                              <option value="">Select correct answer</option>
                              <option value="a">Option A</option>
                              <option value="b">Option B</option>
                              <option value="c">Option C</option>
                              <option value="d">Option D</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                  
                  <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary px-4">
                      <i class="fas fa-save me-2"></i>Save All Questions
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <!-- Bootstrap 5 JS Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- jQuery -->
  <script src="../js/jquery.js"></script>
  
  <!-- Custom JavaScript -->
  <script>
    // Toggle sidebar on mobile
    document.getElementById('sidebarToggle').addEventListener('click', function() {
      document.getElementById('sidebar').classList.toggle('active');
      document.getElementById('main-content').classList.toggle('active');
    });
    
    // Auto-scroll to top when changing pages
    $(document).ready(function() {
      $('a[href^="dash.php"]').on('click', function() {
        $('html, body').animate({ scrollTop: 0 }, 'fast');
      });
    });
  </script>
</body>
</html>