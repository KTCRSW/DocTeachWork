<?php 
    session_start();
    include '../db/connect.db.php';


    $studentUserID = $_GET['stdid'];
    $teacherUserID = $_SESSION['UserID'];
    $subject = $_GET['subjectteacherid'];

    $Status = $_GET['checkStatus'];



    
    $save = array('StudentID' => $studentUserID, 
    'TeacherID' => $teacherUserID,
    'SubjectID' => $subject,
    'Status' => $Status,
    );
    foreach ($save as $key => $k){       
    echo "<pre>";
    print_r($k);
    echo "</pre>";
    }
?>