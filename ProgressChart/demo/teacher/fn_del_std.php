<?php
    session_start();
    $std_id = $_REQUEST['no_user'];
    
    $con = mysqli_connect("localhost","root","kittichai","pcg_db")or die("err!");
    $sql_add_std = "DELETE FROM enrollment WHERE sj_id = '".$_POST['sj_id']."' AND usr_std_id = '".$_POST['usr_id']."'";
    $_SESSION['sj_id'] = $_POST['sj_id'];
    mysqli_query($con,$sql_add_std);
    header('location:./subject.php');
?>