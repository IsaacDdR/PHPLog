<?php 
    include('config.php');
    session_start();

    $user_check = $_SESSION['login_user'];
    $ses_sql = mysqli_query($db, "SELECT username FROM admin WHERE username = '$usercheck'");
    $row = mysqli_fetch_array($sess_sql, MYSQLI_ASSOC);

    $login_session = $row['username'];

    if(!isset($_SESSION['login_user'])) {
        header("location: login.php");
        die();
    }
?>
