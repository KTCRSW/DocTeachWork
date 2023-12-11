<link rel="icon" type="image/x-icon" href="https://cdn.discordapp.com/attachments/960423388369813514/1119515459730026526/logo.png">
<?php session_start(); ?>
<?php include "../../Frontend/assets/header.php"; ?>
<?php include "../../Frontend/assets/teacher_nav.php"; ?>
<?php //include "../function/connect.php";
$con = mysqli_connect("localhost","root","","pcg_db")or die("err!");
$sql = "SELECT * FROM subject WHERE sj_owner = '".$_SESSION['no_usr']."'";
$query = mysqli_query($con,$sql);




?>
<section class="m-2 w-full">

<?php
    while($subject_data = mysqli_fetch_array($query)){

    
?>

<div class="max-w-lg lg:max-w-full justify-between lg:flex">
    
    <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
        <div class="mb-8">
        <p class="animate-pulse text-sm text-red-600 flex items-center">
        <svg width="20px" height="20px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M716 190.9v-67.8h-44v67.8H352v-67.8h-44v67.8H92v710h840v-710H716z m-580 44h172v69.2h44v-69.2h320v69.2h44v-69.2h172v151.3H136V234.9z m752 622H136V402.2h752v454.7z" fill="#39393A"></path><path d="M319 565.7m-33 0a33 33 0 1 0 66 0 33 33 0 1 0-66 0Z" fill="#E73B37"></path><path d="M510 565.7m-33 0a33 33 0 1 0 66 0 33 33 0 1 0-66 0Z" fill="#E73B37"></path><path d="M701.1 565.7m-33 0a33 33 0 1 0 66 0 33 33 0 1 0-66 0Z" fill="#E73B37"></path><path d="M319 693.4m-33 0a33 33 0 1 0 66 0 33 33 0 1 0-66 0Z" fill="#E73B37"></path><path d="M510 693.4m-33 0a33 33 0 1 0 66 0 33 33 0 1 0-66 0Z" fill="#E73B37"></path><path d="M701.1 693.4m-33 0a33 33 0 1 0 66 0 33 33 0 1 0-66 0Z" fill="#E73B37"></path></g></svg>
            
            <?php
                $sql_task = "SELECT count(pg_id) AS task_unfinish, sum(score_std) AS total_score FROM progress WHERE sj_id = '".$subject_data['sj_id']."' AND ack_std = '0'  AND ack_teacher = '0' ";
                $query_task = mysqli_query($con,$sql_task);
                $task_data = mysqli_fetch_array($query_task);

                $sql_wait = "SELECT count(pg_id) AS task_wait FROM progress WHERE sj_id = '".$subject_data['sj_id']."' AND ack_std = '1'  AND ack_teacher = '0' ";
                $query_wait = mysqli_query($con,$sql_wait);
                $wait_data = mysqli_fetch_array($query_wait);

                $sql_sj = "SELECT * FROM subject WHERE sj_id = '".$subject_data['sj_id']."'";
                $query_sj = mysqli_query($con,$sql_sj);
                $sj_data = mysqli_fetch_array($query_sj);
                echo "&nbsp;นักเรียนยังไม่ส่งงาน ->>".$task_data['task_unfinish'];
            ?>
            
        </p>
        <div class="text-gray-900 font-bold text-xl mb-2"><?php echo $sj_data['sj_name'];?></div>
        <p class="text-gray-700 text-base"><?php echo $sj_data['term'];?></p>
        <br/>
        <p class="text-gray-700 text-base">นักเรียนยังไม่ส่งงาน : <?php echo $task_data['task_unfinish'];?> งาน</p>
        <p class="text-gray-700 text-base">มี <?php echo $wait_data['task_wait'];?> งานรอรับการตรวจ</p>
        
        </div>
        <a href="./chart.php?sj_id=<?php echo $subject_data['sj_id']?>">
            <button class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                ดูข้อมูล
            </button>
        </a>
        
    </div>
    
<?php
    }
?>
</div>
</section>