<?php
    session_start();
    $std_id = $_REQUEST['no_user'];
    
    $con = mysqli_connect("localhost","root","kittichai","pcg_db")or die("err!");
    $sql_add_std = "DELETE FROM users WHERE usr_std_id = '".$std_id."'";
    mysqli_query($con,$sql_add_std);
    /*if($type == 3 ){
        header('location:./student_management.php');
    }else if($type == 2){
        header('location:./teacher_management.php');
    }*/
    header('location:./index.php');
?>