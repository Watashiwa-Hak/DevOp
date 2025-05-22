<?php
session_start();

// Retrieve session variables
$user_name = $_SESSION['user_name'] ?? 'Guest';
$user_email = $_SESSION['user_email'] ?? 'guest@example.com';
$profile_image = $_SESSION['profile_image'] ?? '../uploads/image/pic-1.png';

// Check if user_id is set in the session
if (!isset($_SESSION['user_id'])) {
    echo 'User ID is not set. Please login first.<br>';
    echo '<button onclick="goBack()">Go Back</button>';
    echo '<script>
            function goBack() {
                window.history.back();
            }
          </script>';
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Tracker Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Optional styles and scripts -->
    <link rel="stylesheet" href="assets/css/shared/style.css">
    <link rel="stylesheet" href="assets/css/demo_1/style.css">
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary px-4 py-2 w-100">
        <div class="container-fluid">
            <!-- Logo and Title -->
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <img src="assets/images/logo.svg" alt="logo" height="30" class="me-2">
                <span class="fw-semibold">Login Tracker Dashboard</span>
            </a>

            <!-- User Profile Dropdown -->
            <div class="ms-auto d-flex align-items-center">
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">
                        <img class="rounded-circle me-2" src="<?php echo $profile_image; ?>" alt="Profile" width="40"
                            height="40">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li class="dropdown-header text-center">
                            <strong><?php echo htmlspecialchars($user_name); ?></strong><br>
                            <small><?php echo htmlspecialchars($user_email); ?></small>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="show_profile_form.php">My Profile</a></li>
                        <li><a class="dropdown-item" href="logout.php">Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</body>

</html>