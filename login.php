<?php
    include("config.php");
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $myusername = mysqli_real_escape_string($db, $_POST['username']);
        $mypassword = mysqli_real_escape_string($db, $_POST['password']);

        $sql = "SELECT * FROM reg_rasp";

        $result = mysqli_query($db, $sql);

        $row = mysqli_fetch_array($result, MYSQL_ASSOC);

        $active = $row['active'];

        $count = mysqli_num_rows($result);

        #Continue: https://www.tutorialspoint.com/php/php_mysql_login.htm


    }
?>
