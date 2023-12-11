<?php
    session_start();
    //include('../function/connect.php');
    $con = mysqli_connect("localhost","root","","pcg_db")or die("err!");
    if($_REQUEST['username'] != ""){
        $sql = "SELECT * FROM users WHERE usr_name = '".$_REQUEST['username']."'";
        $query = mysqli_query($con,$sql);
        $respond = mysqli_fetch_array($query);
        if($respond['usr_name'] == $_REQUEST['username']&&$respond['password'] == $_REQUEST['password']){
            $_SESSION['no_usr'] = $respond['no_usr'];
            $_SESSION['usr_card_no'] = $respond['usr_card_no'];
            $_SESSION['usr_fullname'] = $respond['usr_fullname'];
            header('location:./index.php');
        }
    }
    
    //header('location:../../frontend/login_stu.php');
?>