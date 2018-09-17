<?php
 include 'layouts/home-header.php'; ?>
<body>
    <?php 
    session_start();
    if(isset($_SESSION['logged_user'])){
    include 'inc/navbar.php'; 
    }else{
        header('location:../../index.php');
    }?>   
</body>
</html>