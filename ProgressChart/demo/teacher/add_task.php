<?php
    session_start();
    $con = mysqli_connect("localhost","root","","pcg_db")or die("err!");
    $sql_sj = "INSERT INTO `progress`(`pg_id`, `sj_id`, `usr_no_id`, `task_name`, `score`, `ack_std`, `ack_teacher`, `score_std`) 
    VALUES (null,'".$_REQUEST['sj_id']."','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]')";
    $query_sj = mysqli_query($con,$sql_sj);
    header('location:./subject.php');
?>