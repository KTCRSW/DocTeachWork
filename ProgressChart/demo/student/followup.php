<?php
    session_start();
    $con = mysqli_connect("localhost","root","","pcg_db")or die("err!");
    $sql_sj = "UPDATE progress SET ack_std='1' WHERE pg_id = '".$_REQUEST['pg_id']."'";
    $query_sj = mysqli_query($con,$sql_sj);
    header('location:./index.php');
?>