<?php session_start(); ?>
<?php include "../../Frontend/assets/header.php"; ?>
<?php include "../../Frontend/assets/teacher_nav.php"; ?>
<?php //include "../function/connect.php";
    $con = mysqli_connect("localhost","root","kittichai","pcg_db")or die("err!");
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
            $num = mysqli_num_rows($query_subject);
    if($num == 0){
        echo '<center>';
        echo '<div role="alert" class="alert alert-error container mt-2 mb-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" style="color:white;" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        <span style="color:white;">ขออภัย คุณยังไม่เพิ่มวิชา! โปรดเพิ่มวิชาที่ต้องการสอน</span>
        </div>';
        echo '</center>';
    } else {
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
                                <button type="button" class="btn btn-success text-white" style="color:#fff;">ดูผู้เรียน</button>
                            </a>
                            <a href="./tasks.php?sj_id=<?php echo $subject['sj_id']; ?>">
                                <button type="button" class="btn btn-warning" style="color:#fff;">จัดการงาน</button>
                            </a>
                        </center>
                    </td>
                </tr>

            <?php
                $colorflag = 1 - $colorflag; // Toggle color flag
            }
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