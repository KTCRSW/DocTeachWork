<?php
    session_start();
    $con = mysqli_connect("localhost","root","","pcg_db")or die("err!");
    $sql_sj = "UPDATE progress SET ack_teacher='1',score_std='".$_REQUEST['score_std']."' WHERE pg_id = '".$_REQUEST['submit']."'";
    $query_sj = mysqli_query($con,$sql_sj);
    header('location:./index.php');
?>