<?php
    session_start();
    $id = $_REQUEST['submit'];
    $type = $_REQUEST['type'];
    $username = $_REQUEST['username'];
    $fullname = $_REQUEST['fullname'];
    $std_id = $_REQUEST['std_id'];
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
    
    $con = mysqli_connect("localhost","root","","pcg_db")or die("err!");
    $sql_add_std = "UPDATE users SET usr_card_no='".$cardid."',
                                        usr_fullname='".$fullname."',usr_address='".$address."',
                                        password='".$password."' WHERE no_usr = '".$id."' ";
    mysqli_query($con,$sql_add_std);
    if($type == 3 ){
        header('location:./student_management.php');
    }else if($type == 2){
        header('location:./teacher_management.php');
    }
    //header('location:./student_management.php');
?>