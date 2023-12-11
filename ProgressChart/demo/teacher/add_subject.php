<?php
    session_start();
    $con = mysqli_connect("localhost","root","","pcg_db")or die("err!");
    $sql_sj = "INSERT INTO subject(sj_id, sj_name, term, description, sj_owner) 
            VALUES (null,'".$_REQUEST['sj_name']."','".$_REQUEST['term']."','".$_REQUEST['description']."','".$_SESSION['no_usr']."')";
    $query_sj = mysqli_query($con,$sql_sj);
    header('location:./subject.php');
?>