<?php
// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $profile_image = $_SESSION['profile_image'] ?? 'uploads/image/pic-1.png';
    $profile_name = $_SESSION['user_name'] ?? 'Guest';
    $designation = $_SESSION['role'] ?? 'Admin'; // Optional fallback

    // If role is specifically "User", restrict access
    if ($designation === "User") {
        header('Location: ../authentication_form.php');
        exit();
    }
} else {
    header('Location: ../authentication_form.php');
    exit();
}
?>

<!-- Sidebar Navigation -->
<ul class="nav">
    <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
            <div class="profile-image">
                <img class="img-xs rounded-circle" src="<?php echo $profile_image; ?>" alt="profile image">
                <div class="dot-indicator bg-success"></div>
            </div>
            <div class="text-wrapper">
                <p class="profile-name"><?php echo htmlspecialchars($profile_name); ?></p>
                <p class="designation"><?php echo htmlspecialchars($designation); ?></p>
            </div>
        </a>
    </li>

    <li class="nav-item nav-category">Main Menu</li>

    <li class="nav-item">
        <a class="nav-link" href="login_tracker.php">
            <i class="menu-icon fas fa-history"></i>
            <span class="menu-title">Login Tracker</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="welcome_page.php">
            <i class="menu-icon fas fa-sign-out-alt"></i>
            <span class="menu-title">Logout</span>
        </a>
    </li>
</ul>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">