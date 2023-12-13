<?php
session_start();

$con = mysqli_connect("localhost", "root", "kittichai", "pcg_db") or die("err!");

$check_sql = "SELECT * FROM enrollment WHERE usr_std_id = '" . $_POST['usr_id'] . "'";
$check_result = mysqli_query($con, $check_sql);

if (mysqli_num_rows($check_result) == 0) {
    $sql_add_std = "INSERT INTO `enrollment`(`en_id`, `sj_id`, `usr_std_id`, `en_detail`) VALUES ('', '" . $_POST['sj_id'] . "', '" . $_POST['usr_id'] . "', 'ลงทะเบียนแล้ว')";
    $_SESSION['sj_id'] = $_POST['sj_id'];
    mysqli_query($con, $sql_add_std);
    header('location:./add_std.php');
} else {
    echo "<script>alert('ไม่สามารถลงทะเบียนได้')</script>";
    header('location:./add_std.php');
}
?>
