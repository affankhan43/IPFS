<?php
include ".env";
$db = mysqli_connect($HostName,$HostUser,$HostPass,$dbName) or die("Could not connect to the database");
if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    else{
        echo "sdf";
    }

    ?>
