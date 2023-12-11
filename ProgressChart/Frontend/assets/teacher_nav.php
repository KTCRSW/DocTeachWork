<?php include "header.php"; ?>
<link rel="icon" type="image/x-icon" href="https://cdn.discordapp.com/attachments/960423388369813514/1119515459730026526/logo.png">
<nav class=" top-0 z-50 w-full bg-dark border-dark border-gray-200 dark:bg-gray-800 dark:border-gray-700 ">
   <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
         <div class="flex items-center justify-start">
            <a href="index.php" class="flex ml-2 md:mr-24">
               <img src="https://cdn.discordapp.com/attachments/960423388369813514/1119515459730026526/logo.png" class="h-10 mr-3 mb-2" alt="EDS Logo" />
               <span class="self-center text-m font-semibold max-[500px]:text-[13px] sm:text-m whitespace-nowrap dark:text-white">วิทยาลัยเทคนิคอุดรธานี | จัดการงานและรายวิชา</span>
            </a>
         </div>

         <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName" class="flex items-center text-sm font-medium text-gray-900 rounded-full hover:text-blue-600 dark:hover:text-blue-500 md:mr-0 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-white" type="button">
            <span class="sr-only">Open user menu</span>
            <div class="avatar">
               <div class="w-8 h-8 rounded-full">
                  <img id="image" onclick="show()" src="../../frontend/image/ariel.png" alt="user photo">
               </div>
            </div>
            <p class="text-white ml-2 text-[16px] max-[750px]:hidden"><b><?php echo $_SESSION['usr_fullname'] . "&nbsp; (" . $_SESSION['usr_card_no'].")"; ?></b></p>
            <svg class="w-4 h-4 mx-1.5" aria-hidden="true" fill="white" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
         </button>

         <!-- Dropdown menu -->
         <div id="dropdownAvatarName" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
            
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
             
               <li>
                  <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-gray-500">เปลี่ยนรูปประจำตัว</a>
               </li>
             
            </ul>
            <div class="py-2">
               <a href="../../Backend/auth/signout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-gray-700">ออกจากระบบ</a>
            </div>
         </div>


         <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
            <a name="" id="" class="m-5 mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" href="../../Backend/auth/signout.php" role="button">logout</a>

         </div>
      </div>
   </div>
   </div>
</nav>


<div class="flex">
   <aside id="logo-sidebar" class=" max-[620px]:hidden top-0 left-0 z-40 pt-2 transition-transform -translate-x-full bg-dark border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
      <div class="h-screen px-3 pb-4 overflow-y-auto  bg-dark duration-500 overflow-hidden w-14 hover:w-64 dark:bg-gray-800">
         <ul class="space-y-2 font-medium">
            <li>
               <a href="index.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white dark:hover:bg-gray-700">
                  <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 text-gray-900 transition duration-75 dark:text-gray-400 group-hover:text-gray-900" viewBox="0 0 24 24" fill="none" stroke="#5DF5FF" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs">
                     <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                     <circle cx="12" cy="7" r="4"></circle>
                  </svg>
                  <span class="flex-1 ml-3 whitespace-nowrap text-blue-200">รายวิชา</span>
               </a>

            </li>
            <li>
               <a href="subject.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white dark:hover:bg-gray-700">
                  <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 text-gray-900 transition duration-75 dark:text-gray-400 group-hover:text-gray-900" viewBox="0 0 24 24" fill="none" stroke="#5DF5FF" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs">
                     <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                     <circle cx="12" cy="7" r="4"></circle>
                  </svg>
                  <span class="flex-1 ml-3 whitespace-nowrap text-blue-200">จัดการรายวิชา</span>
               </a>

            </li>
            
            <hr>
            <li class="">
               <a href="../../Backend/auth/signout.php" onclick="comfirmLogout()" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white dark:hover:bg-gray-700">
                  <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900" viewBox="0 0 24 24" fill="none" stroke="#c40303" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs">
                     <path d="M10 3H6a2 2 0 0 0-2 2v14c0 1.1.9 2 2 2h4M16 17l5-5-5-5M19.8 12H9" />
                  </svg>
                  <span class="flex-1 ml-3 whitespace-nowrap text-blue-200">ออกจากระบบ</span>
               </a>
            </li>
         </ul>
      </div>

   </aside>
   <script>
      function myFunction() {
         var element = document.body;
         element.classList.toggle("dark-mode");
      }
   </script>
   <script>
      function confirmLogout() {
         Swal.fire(
      'success'
      )
      }
   </script>