<?php
    session_start();
    $username = $_REQUEST['username'];
    $std_id = $_REQUEST['std_id'];
    $fullname = $_REQUEST['firstname']." ".$_REQUEST['lastname'];
    $address = $_REQUEST['address'];
    $password = "";
    $cardid = "";
    $pic_path ="";
    if($_REQUEST['password']!=$_REQUEST['repassword']){
        header('location:./subject.php');
    }else{
        $password = $_REQUEST['password'];
    }
    if($_REQUEST['cardid'] == ""){
        $cardid = "none";
    }else{
        $cardid = $_REQUEST['cardid'];
    }
    
    $con = mysqli_connect("localhost","root","kittichai","pcg_db")or die("err!");
    $sql_add_std = "INSERT INTO `users`(`no_usr`, `usr_card_no`, `usr_std_id`, 
                                    `usr_name`, `usr_fullname`, `usr_address`, 
                                    `usr_type`, `pic`, `password`) 
                            VALUES (null,'".$cardid."','".$std_id."',
                                    '".$username."','".$fullname."','".$address."',
                                    '3','".$pic_path."','".$password."')";
    mysqli_query($con,$sql_add_std);
    header('location:./student_management.php');
?>