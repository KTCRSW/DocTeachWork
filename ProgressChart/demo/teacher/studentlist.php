<link rel="icon" type="image/x-icon" href="https://cdn.discordapp.com/attachments/960423388369813514/1119515459730026526/logo.png">
<?php session_start(); ?>
<?php include "../../Frontend/assets/header.php"; ?>
<?php include "../../Frontend/assets/teacher_nav.php"; ?>
<?php //include "../function/connect.php";
$con = mysqli_connect("localhost","root","","pcg_db")or die("err!");
$sql_list = "SELECT * FROM enrollment WHERE sj_id = '".$_REQUEST['sj_id']."'";
$query_list = mysqli_query($con,$sql_list);
$listsj = mysqli_fetch_array($query_list);

$sql_std = "SELECT * FROM users WHERE no_usr = '".$listsj['usr_std_id']."'";
$query_std = mysqli_query($con,$sql_std);
?>


<div class=" rounded w-full">
    <table class="table-fixed w-full">
    <thead>
        <tr>
        <th class="self-center">รหัสนักเรียน</th>
        <th class="self-center">ชื่อ - นามสกุล</th>
        <th class="self-center">ที่อยู่</th>
        <th class="self-center">จัดการ</th>
        </tr>
    </thead>
    <tbody  class="justify-items-center">
        
<?php
    $colorflag = 0;
    while($std = mysqli_fetch_array($query_std)){  
        if($colorflag == 0){
            ?>
                <tr class="bg-blue-100">
            <?php

            $colorflag = 1;
        }else if($colorflag == 1){
            ?>
                <tr class="bg-blue-300">
            <?php
            $colorflag = 0;
        }
?>

        <td ><center><?php echo $std['usr_std_id'];?></center></td>
        <td ><center><?php echo $std['usr_fullname'];?></center></td>
        <td ><center><?php echo $std['usr_address'];?></center></td>
        <td ><center>
            <a href="./studentlist.php?sj_id=<?php echo $subject['sj_id'];?>">
            <button type="button" class="">-</button>
            </a>
        </center></td>
        </tr>
   

<?php
    }
    
    
?>  
    </tbody>
    </table>
</div>


</section>
