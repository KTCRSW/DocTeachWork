<link rel="icon" type="image/x-icon" href="https://cdn.discordapp.com/attachments/960423388369813514/1119515459730026526/logo.png">
<?php session_start(); ?>
<?php include "../../Frontend/assets/header.php"; ?>
<?php include "../../Frontend/assets/teacher_nav.php"; ?>
<?php //include "../function/connect.php";
$con = mysqli_connect("localhost","root","","pcg_db")or die("err!");
$sql_subject = "SELECT * FROM subject WHERE sj_owner = '".$_SESSION['no_usr']."'";
$query_subject = mysqli_query($con,$sql_subject);
?>


<div class=" rounded">
    <table class="table-fixed w-full">
    <thead>
        <tr>
        <th class="self-center">รหัสวิชา</th>
        <th class="self-center">ชื่อวิชา</th>
        <th class="self-center">ปีการศึกษา</th>
        <th class="self-center">รายละเอียด</th>
        <th class="self-center">สถานะ</th>
        </tr>
    </thead>
    <tbody  class="justify-items-center">
        
<?php
    $colorflag = 0;
    while($subject = mysqli_fetch_array($query_subject)){  
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

        <td ><center><?php echo $subject['sj_id'];?></center></td>
        <td ><center><?php echo $subject['sj_name'];?></center></td>
        <td ><center><?php echo $subject['term'];?></center></td>
        <td ><center><?php echo $subject['description'];?></center></td>
        
        <td ><center>
            <a href="./studentlist.php?sj_id=<?php echo $subject['sj_id'];?>">
            <button type="button" class="">ดูผู้เรียน</button>
            </a>
            <a href="./tasks.php?sj_id=<?php echo $subject['sj_id'];?>">
            <button type="button" class="">จัดการงาน</button>
            </a>
        </center></td>
        </tr>
   

<?php
    }
    
    
?>  
    <form action="add_subject.php" method="get">
    <tr>
    <td ><center>-</center></td>
        <td ><center><input type="text" name="sj_name"></center></td>
        <td ><center><input type="text" name="term"></center></td>
        <td ><center><input type="text" name="description"></center></td>
        
        <td ><center><button type="submit" name="no_usr" value="<?php echo $_SESSION['no_usr'];?>" >เพิ่มรายวิชา</button></center></td>
        </tr>
    </form>
    </tbody>
    </table>
    </div>

</section>