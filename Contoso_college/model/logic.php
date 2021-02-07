
<?php

include_once("conn.php");


function teacher($dbconn){

    
    if(isset($_POST['btn-save']))
    {

        //post these variables into the database

        $staff_no               = filter_var($_POST['staff_no'], FILTER_SANITIZE_STRING);
        $first_name             = filter_var($_POST['first_name'],FILTER_SANITIZE_STRING);
        $last_name              = filter_var($_POST['last_name'],FILTER_SANITIZE_STRING);
        $levels                 = filter_var($_POST['levels'],FILTER_SANITIZE_STRING);
        $class_held             = filter_var($_POST['class_held'],FILTER_SANITIZE_STRING);


        //check if the user alraedy exist with staff mumber
        
        $preventDuplicate       = "SELECT * FROM teacher WHERE staff_no = '$staff_no'";

        $duplicate_result       = mysqli_query($dbconn, $preventDuplicate);

        $count                  = mysqli_num_rows($duplicate_result);
    
            //condition statement to prevent alrady inserted user
        if($count > 0){
            echo "user already exist";
            header('location: register-teacher.php');
            
        }else{
            //insert if user does not exist query
            $insert_teacher_Sql =  "INSERT INTO teacher (staff_no,first_name,last_name,levels,class_held)
            VALUES ('$staff_no','$first_name','$last_name','$levels','$class_held')";

            $insert             = mysqli_query($dbconn, $insert_teacher_Sql);  //connects query with database
            header('location: register-teacher.php');
        }

    }
}


function student($dbconn){

    if(isset($_POST['btn-save']))
    {

        //post these variables into the database

        $student_no              = filter_var($_POST['student_no'],FILTER_SANITIZE_STRING);
        $first_name              = filter_var($_POST['first_name'],FILTER_SANITIZE_STRING);
        $last_name               = filter_var($_POST['last_name'],FILTER_SANITIZE_STRING);
        $class                   = filter_var($_POST['class'],FILTER_SANITIZE_STRING);
        $class_teacher_no        = filter_var($_POST['class_teacher_no'],FILTER_SANITIZE_STRING);
        $class_teacher_name	     = filter_var($_POST['class_teacher_name'],FILTER_SANITIZE_STRING);


        //check if the user alraedy exist with staff mumber
        
        $preventDuplicate       = "SELECT * FROM students WHERE student_no = '$student_no'";

        $duplicate_result       = mysqli_query($dbconn, $preventDuplicate);

        $count                  = mysqli_num_rows($duplicate_result);
    
            //condition statement to prevent alrady inserted user
        if($count > 0){
            echo "user already exist";
           
        }else{
            //insert if user does not exist query
            $insert_teacher_Sql =  "INSERT INTO students (student_no,first_name,last_name,class,class_teacher_no,class_teacher_name)
            VALUES ('$student_no','$first_name','$last_name','$class','$class_teacher_no','$class_teacher_name')";

            $insert             = mysqli_query($dbconn, $insert_teacher_Sql);  //connects query with database
            echo "success";
            header('location: register-teacher.php');
            echo "user already exist";
        }

    }
}
?>
