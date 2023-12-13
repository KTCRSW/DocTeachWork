<link rel="icon" type="image/x-icon" href="https://cdn.discordapp.com/attachments/960423388369813514/1119515459730026526/logo.png">
<?php session_start(); ?>
<?php include "../../Frontend/assets/header.php"; ?>
<?php include "../../Frontend/assets/teacher_nav.php"; ?>
<?php //include "../function/connect.php";
    error_reporting(0);

    $con = mysqli_connect("localhost","root","kittichai","pcg_db")or die("err!");

$sql_std = "SELECT * FROM users WHERE usr_type = '3'";
$query_std = mysqli_query($con,$sql_std);


?>


<div class=" rounded w-full">
    
            <input type="search" id="searchInput" class="block w-[95%] p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 m-5 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ค้นหา , รหัสนักศึกษา , ชื่อ - สกุล....." required>

    <div class="rounded w-full">

    <table class="min-w-full bg-white border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-2 px-4 text-center">รหัสนักเรียน</th>
                <th class="py-2 px-4 text-center">ชื่อ - นามสกุล</th>
                <th class="py-2 px-4 text-center">ที่อยู่</th>
                <th class="py-2 px-4 text-center">จัดการ</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php
            $colorflag = 0;

            while ($std = mysqli_fetch_array($query_std)) {
            ?>
                <tr class="student-row" data-name="<?php echo $std['usr_fullname']; ?>">
                    <td class="py-2 px-4"><?php echo $std['usr_std_id']; ?></td>
                    <td class="py-2 px-4"><?php echo $std['usr_fullname']; ?></td>
                    <td class="py-2 px-4"><?php echo $std['usr_address']; ?></td>
                    
                    <td class="py-2 px-4">
                        <form action="./fn_add_std.php" method="POST">
                            <input type="text" name="sj_id" value="<?=$_SESSION['sj_id']?>" id="" hidden>
                            <input type="text" name="usr_id" value="<?=$std['no_usr']?>" id="" hidden>
    <button type="submit" class="btn btn-success p-2 mt-3 m-2" style="color:#fff;">เพิ่มนักศึกษา</button>

                        </form>    
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

</div>


<script>
document.addEventListener('DOMContentLoaded', function () {
    var searchInput = document.getElementById('searchInput');

    function filterRows() {
        var searchTerm = searchInput.value.toLowerCase();
        var rows = document.getElementsByClassName('student-row');

        Array.from(rows).forEach(function (row) {
            var studentId = row.cells[0].innerText.toLowerCase();
            var fullName = row.cells[1].innerText.toLowerCase();

            var matchStudentId = studentId.includes(searchTerm);
            var matchFullName = fullName.includes(searchTerm);

            if (matchStudentId || matchFullName) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    searchInput.addEventListener('input', filterRows);
});
</script>
