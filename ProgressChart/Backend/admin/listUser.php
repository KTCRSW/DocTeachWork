<link rel="icon" type="image/x-icon" href="https://cdn.discordapp.com/attachments/960423388369813514/1119515459730026526/logo.png">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
<?php include "../db/connect.db.php";
?>
<section class="m-2 w-full">
   <!-- /* -------------------------------------------------------------------------- */
    /*                        หน้าผลการค้นหาข้อมูลนักศึกษา                        */
    /* -------------------------------------------------------------------------- */ -->




   <!-- Component: Table with hover state -->
   <div class="flex justify-center px-24 items-center">
      <div class="w-full overflow-x-auto">
         <table class="w-full text-left border border-separate rounded border-slate-200" cellspacing="0">
            <a href="./addUser-Admin.php"><button class="btn btn-success text-light mb-3" style="color:#fff; ">เพิ่มผู้ใช้งาน</button></a>
            <tbody>
               <tr>
                  <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0  border-slate-200 stroke-slate-500 text-slate-500 text-center">รหัสบัตรประชาชน</th>
                  <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0  border-slate-200 stroke-slate-500 text-slate-500 text-center">ชื่อผู้ใช้</th>
                  <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0  border-slate-200 stroke-slate-500 text-slate-500 text-center">อีเมล์</th>
                  <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0  border-slate-200 stroke-slate-500 text-slate-500 text-center">ชื่อจริง</th>
                  <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0  border-slate-200 stroke-slate-500 text-slate-500 text-center">นามสกุล</th>
                  <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0  border-slate-200 stroke-slate-500 text-slate-500 text-center">ที่อยู่</th>
                  <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0  border-slate-200 stroke-slate-500 text-slate-500 text-center">เบอร์</th>
                  <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0  border-slate-200 stroke-slate-500 text-slate-500 text-center">สถานะ</th>
                  <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0  border-slate-200 stroke-slate-500 text-slate-500 text-center">รูป</th>
                  <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0  border-slate-200 stroke-slate-500 text-slate-500 text-center">Edit</th>
                  
               </tr>
               <?php

               $getUsers = "SELECT * FROM users WHERE permission ='1'";
               $queryUsers = $db->query($getUsers);
               while ($user = mysqli_fetch_assoc($queryUsers)) :

               ?>
                  <tr>
                     <form action="editUser.php" method="get">
                     <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                        <span><?php echo $user['id_card']; ?></span>
                     </td>

                     <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                        <span><?php echo $user['username']; ?></span>
                     </td>
                     <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                        <?php echo $user['email']; ?>
                     </td>
                     <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                        <?php echo $user['fname']; ?>
                     </td>
                     <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                        <?php echo $user['lname']; ?>
                     </td>
                     <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                        <?php echo $user['address']; ?>
                     </td>
                     <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                        <?php echo $user['phone']; ?>
                     </td>
                     <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                        <?php

                        if ($user['permission'] == 0) {
                           echo "<p style='color:red;'>Error</p>";
                        }
                        if ($user['permission'] == 1) {
                           echo "<p style='color:green;'>Aprroved</p>";
                        }
                        if ($user['permission'] == 2) {
                           echo "<p style='color:orange;'>Admin</p>";
                        }

                        ?> </td>
                     <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                        <img src="img/<?php echo $user['img']; ?>" alt="" class="w-50 h-50" width="50">
                     </td> 
                     <td class="h-12 px-8 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                        <input type="text" value="<?php echo $user['u_id'];?>" name="userID" hidden>
                        <button type="submit" class="btn btn-warning w-full" style="color:#fff;"><i class="fa-regular fa-pen-to-square"  style="color:#fff;"></i>
                     </td>
                     </form>
                  </tr>
               <?php endwhile; ?>


            </tbody>
         </table>
      </div>
   </div>



</section>