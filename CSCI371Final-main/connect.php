<?php

$servername = "rei.cs.ndsu.nodak.edu";
$username = "kpenabari_taoh_371s24";
$password = "A370Xjiy2N0!"
$database = "kpenabari_taoh_db371s24"

$link = mysqli_connect($servername, $username, $password, $database);

if(mysqli_connect()){
    die("Connect faild: %s\n" + mysqli_connect_eror());
    exit();
}
else{
    echo "Connected successfully";
}

?>