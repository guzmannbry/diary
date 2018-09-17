<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <a href="home.php" class="navbar-brand">Diary</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navToggle">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navToggle">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="diaries.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF'], '.php') == 'diaries') ? 'active' : '' ?>">Diaries</a>
            </li> <img src="../assets/images/b1g.png" alt="" style="border-radius:50%" height="35" width="35">
            <li class="nav-item dropdown">

                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <?php echo $_SESSION['logged_user'] ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="profile.php?id=<?php echo $_SESSION['logged_id']; ?>" class="dropdown-item">Profile</a>
                    <a href="../../Controllers/LogoutController.php" class="dropdown-item">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
