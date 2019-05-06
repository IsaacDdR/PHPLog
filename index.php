<head>
<script>
function clic(element){

    var search_val =  document.getElementById("search-in").value;

    alert(search_val);
    }


</script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
    <title> XITOMATES UNIFI</title>

<script>
function myFunction(){
    let value = document.getElementById("search-input").value;
    let phpValue = "<?php echo $phpvalue = $value; ?>";
}
</script>

</head>
<?php
require ("config.php");
?>

<body>
    <div class="main-xitomates jumbotron">
        <div class="wrapper-xitomates">
            <div class="title-xitomates">
                 <img src="logo_xitomates_white.png"/>
            </div>
        </div>
        <div class="div-search">
            <div class="search">
               MAC seach: <input id="search-input">
               <button onclick="myFunction()">Search</button>
            </div>
        </div>
        <div class="unifi-title"><h3>Dispostivos conectados</h3></div>
    </div>
            <div class="container unifi-container overflow-auto shadow p-3 mb-5 bg-white rounded">
            <h3>Dispostivos conectados</h3>
                <ul class="list-group">

                <?php
                    $myObj = NULL;

                    $whereList = ["mac", "name", "time", "last_seen"];

                    $sqlList = ["SELECT mac FROM unifi_mac", "SELECT name FROM unifi_mac", "SELECT time FROM unifi_mac", "SELECT last_seen from unifi_mac"];

                    $myObj = NULL;


                    function getList($conn, $what, $myObj) {
                        $count = 0;
                        $sql = "SELECT". $what . "FROM unifi_mac";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)){
                            foreach($row as $device){
                                $myObj[$count][$what] = $device;
                                $count ++;
                            }
                        }
                    }

                    $what = "mac";

                    $myObj = getList($conn, $what);

                    foreach($myObj as $obj){
                        echo $obj;
                    }


/*

                    while ($row = mysqli_fetch_assoc($result)){
                        foreach ($row as $device){
                            $myObj[$count]["name"] = $device;
                            $count ++;
                        }
                    }

                    $sql = "SELECT mac FROM unifi_mac";
                    $result = mysqli_query($conn, $sql);

                    $count = 0;

                    while($row = mysqli_fetch_assoc($result)){
                        foreach ($row as $device){
                            $myObj[$count]["mac"] = $device;
                            $count ++;
                        }
                    }

                    $sql = "SELECT time from unifi_mac";
                    $result = mysqli_query($conn, $sql);

                    $count = 0;

                    while ($row = mysqli_fetch_assoc($result)){
                        foreach ($row as $device){
                            $epoch = gmdate('r', $device);
                            $myObj[$count]["time"] = $epoch;
                            $count ++;
                        }
                    }

                    $sql = "SELECT first_time FROM unifi_mac";
                    $result = mysqli_query($conn, $sql);
                    $count = 0;

                    while ($row = mysqli_fetch_assoc($result)){
                        foreach ($row as $device){
                            $epoch = gmdate('r', $device);
                            $myObj[$count]["first_time"] = $epoch;
                            $count ++;
                        }
                    }

                    foreach($myObj as $obj){
                        echo "<div class='container shadow p-3 div-devices'>";
                        echo "<h4>Name : <span class='badge badge-primary'>" . $obj["name"] . "</h4></span>";
                        echo "<h4>MAC : <span class='badge badge-secondary'>" . $obj["mac"] .  "</h4></span>";
                        echo "<h4>Last seen : <span class='badge badge-secondary'>"  . $obj["time"] . "</h4></span>";
                        echo "<h4>First seen : <span class='badge badge-secondary'>" . $obj["first_time"] . "</h4></span>";
                        echo "</div>";
                        echo "<br>";
                    }
 */
                    foreach($myObj as $obj){
                        echo $obj;
                        foreach($obj as $device){
                            echo $device;
                        }
                    }


                    ?>
                </ul>
            </div>

        <div class="container unifi-container overflow-auto shadow p-3 mb-5 bg-white rounded">
            <h3>Dispositivos cercanos</h3>
           <ul class = "list-group">
            <?php

                $myObj = array();

                $sql = "SELECT mac FROM rasp_mac";
                $result = mysqli_query($conn, $sql);
                $count = 0;

                while ($row = mysqli_fetch_assoc($result)){
                    foreach ($row as $device){
                        $myObj[$count]["mac"]= $device;
                        $count ++;
                    }
                }

                $sql = "SELECT time FROM rasp_mac";
                $result = mysqli_query($conn, $sql);

                $count = 0;

                while ($row = mysqli_fetch_assoc($result)){
                    foreach ($row as $device){
                        $epoch = gmdate('r', $device);
                        $myObj[$count]["time"] = $epoch;
                        $count ++;
                    }
                }

                $sql = "SELECT first_time FROM rasp_mac";
                $result = mysqli_query($conn, $sql);

                $count = 0;

                while ($row = mysqli_fetch_assoc($result)){
                    foreach ($row as $device){
                        $epoch = gmdate('r', $device);
                        $myObj[$count]["fist_time"] = $epoch;
                        $jsonList = json_encode($myObj);
                        $count ++;
                    }
                }

                $count = 0;

                foreach ($myObj as $list){
                    $count ++;
                    echo "<div class='container shadow p-3 div-devices'>";
                    echo "<h4>MAC:<span class='badge badge-primary'>" . $list["mac"] . "</span></h4>";
                    echo "<h4>Last time: <span class='badge badge-secondary'>" . $list["time"] . "</span></h4>";
                    echo "<h4>First time: <span class='badge badge-secondary'>"  . $list["fist_time"] . "</span></h4>";
                    echo "</div>";
                    echo "<br>";
                }

             ?>
            </ul>
        </div>
<!--
        <div class= "search-div container shadow p-3">
            <div id= "search-form">
              <script src="js/form.js"></script>
            </div>
        </div>
--
</body>
</html>
