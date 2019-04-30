<?php
    define('DB_SERVER', 'ec2-13-52-107-153.us-west-1.compute.amazonaws.com');
    define('DB_USERNAME', 'unifiUser');
    define('DB_PASSWORD', 'PR0B3$');
    define('DB_DATABASE', 'unifiMac');
    $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
?>
