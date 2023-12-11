<?php session_start(); ?>
<?php include "../../Frontend/assets/header.php"; ?>
<?php include "../../Frontend/assets/teacher_nav.php"; ?>
<?php //include "../function/connect.php";
$con = mysqli_connect("localhost", "root", "", "pcg_db") or die("err!");
$sql_subject = "SELECT * FROM subject WHERE sj_owner = '" . $_SESSION['no_usr'] . "'";
$query_subject = mysqli_query($con, $sql_subject);
?>

<div class="rounded overflow-hidden">
    <table class="table-fixed w-full bg-white border border-gray-300">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="p-3">รหัสวิชา</th>
                <th class="p-3">ชื่อวิชา</th>
                <th class="p-3">ปีการศึกษา</th>
                <th class="p-3">รายละเอียด</th>
                <th class="p-3">สถานะ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $colorflag = 0;
            while ($subject = mysqli_fetch_array($query_subject)) {
                $colorClass = $colorflag == 0 ? 'bg-blue-100' : 'bg-blue-300';
                ?>

                <tr class="<?php echo $colorClass; ?>">
                    <td class="p-3"><center><?php echo $subject['sj_id']; ?></center></td>
                    <td class="p-3"><center><?php echo $subject['sj_name']; ?></center></td>
                    <td class="p-3"><center><?php echo $subject['term']; ?></center></td>
                    <td class="p-3"><center><?php echo $subject['description']; ?></center></td>
                    <td class="p-3">
                        <center>
                            <a href="./studentlist.php?sj_id=<?php echo $subject['sj_id']; ?>">
                                <button type="button" class="bg-blue-500 text-gray px-4 py-2 rounded">ดูผู้เรียน</button>
                            </a>
                            <a href="./tasks.php?sj_id=<?php echo $subject['sj_id']; ?>">
                                <button type="button" class="bg-green-500 text-gray px-4 py-2 rounded">จัดการงาน</button>
                            </a>
                        </center>
                    </td>
                </tr>

            <?php
                $colorflag = 1 - $colorflag; // Toggle color flag
            }
            ?>
            <form action="add_subject.php" method="get">
                <tr class="bg-white">
                    <td class="p-3"><center>-</center></td>
                    <td class="p-3"><center><input type="text" class="input input-bordered w-full max-w-xs" name="sj_name" placeholder="ชื่อวิชา"></center></td>
                    <td class="p-3"><center><input type="text" class="input input-bordered w-full max-w-xs" name="term" placeholder="ปีการศึกษา"></center></td>
                    <td class="p-3"><center><input type="text" class="input input-bordered w-full max-w-xs" name="description" placeholder="รายละเอียด"></center></td>
                    <td class="p-3">
                        <center><button type="submit" name="no_usr" value="<?php echo $_SESSION['no_usr']; ?>" class="btn btn-success bg-blue-500 text-gray px-4 py-2 rounded" style="color:white;">เพิ่มรายวิชา</button></center>
                    </td>
                </tr>
            </form>
        </tbody>
    </table>
</div>