<link rel="icon" type="image/x-icon" href="https://cdn.discordapp.com/attachments/960423388369813514/1119515459730026526/logo.png">
<?php session_start(); ?>
<?php include "../../Frontend/assets/header.php"; ?>
<?php include "../../Frontend/assets/admin_nav.php"; ?>
<?php //include "../function/connect.php";




?>
<?php //include "../function/connect.php";
$con = mysqli_connect("localhost","root","","pcg_db")or die("err!");

$sql_std_count = "SELECT count(no_usr) AS std_total FROM users WHERE usr_type = '3'";
$query_std_count = mysqli_query($con,$sql_std_count);
$std_count_data = mysqli_fetch_array($query_std_count);

$sql_tea_count = "SELECT count(no_usr) AS tea_total FROM users WHERE usr_type = '2'";
$query_tea_count = mysqli_query($con,$sql_tea_count);
$tea_count_data = mysqli_fetch_array($query_tea_count);

$sql_ad_count = "SELECT count(no_usr) AS ad_total FROM users WHERE usr_type = '1'";
$query_ad_count = mysqli_query($con,$sql_ad_count);
$ad_count_data = mysqli_fetch_array($query_ad_count);


$text_data = $std_count_data['std_total'].",".$tea_count_data['tea_total'].",".$ad_count_data['ad_total'];
?>
<script>
    // TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com 
// Initialization for ES Users
import {
  Chart,
  initTE,
} from "tw-elements";

initTE({ Chart });

</script>
<section class="m-1 w-full">
    <div class="grid justify-items-stretch ">
        <div class="justify-self-center">
            <div class="">
            <canvas class="p-1 ml-40 mr-40 " id="chartPie"></canvas>
            </div>
        </div>
    
    </div>
 
<!-- Required chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Chart pie -->
<script>
  const dataPie = {
    labels: ["นักเรียนทั้งหมด", "ครูทั้งหมด", "ผู้ดูแลระบบ"],
    datasets: [
      {
        label: "จำนวนผู้ใช้งานระบบ",
        data: [<?php echo $text_data;?>],
        backgroundColor: [
          "rgb(255, 0, 0)",
          "rgb(255, 128, 0)",
          "rgb(51, 204, 0)",

        ],
        hoverOffset: 4,
      },
    ],
  };

  const configPie = {
    type: "pie",
    data: dataPie,
    options: {},
  };

  var chartBar = new Chart(document.getElementById("chartPie"), configPie);
</script>
<section class="m-1 h-20 w-full">
</section>

<section class="max-w-lg lg:max-w-full justify-between flex ">
    <div class="justify-center" >
    <a href="./student_management.php" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">รายชื่อนักเรียน</h5>
        <p class="font-normal text-gray-700 dark:text-gray-400">
            รายชื่อนักเรียนมีทั้งหมด <?php echo $std_count_data['std_total'];?> คน
        </p>
    </a>
    </div>
    <div>
    <a href="./teacher_management.php" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">รายชื่อครูผู้สอน</h5>
        <p class="font-normal text-gray-700 dark:text-gray-400">
            รายชื่อครูผู้สอนมีทั้งหมด <?php echo $tea_count_data['tea_total'];?> คน
        </p>
    </a>
    </div>
    
    
</section>