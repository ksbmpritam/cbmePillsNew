<?php
require ("includes/function.php");
$id = filter($_GET['id']);

$sql = "DELETE FROM `game_intro` WHERE id='$id'";

if(mysqli_query($mysqli,$sql)){
    echo "success";
}else{
    echo "error";
}

?>