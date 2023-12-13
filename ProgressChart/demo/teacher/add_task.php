<?php
    session_start();
    $con = mysqli_connect("localhost","root","kittichai","pcg_db")or die("err!");
    $sql_sj = "INSERT INTO `progress`(`pg_id`, `sj_id`, `usr_no_id`, `task_name`, `score`, `ack_std`, `ack_teacher`, `score_std`) 
    VALUES (null,'".$_REQUEST['sj_id']."','".$_REQUEST['no_user']."','".$_REQUEST['task_name']."','".$_REQUEST['score']."','0','0','0')";
    $query_sj = mysqli_query($con,$sql_sj);
    header('location:./subject.php');
?>