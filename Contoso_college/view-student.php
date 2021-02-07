<?php

include("./model/logic.php");
include("./model/conn.php");
include("./model/header.php");

?>
<?php


$x=1;
 
// Attempt select query execution
$sql = "SELECT * FROM students ";
if($result = mysqli_query($dbconn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<div class=\"container\">";
        echo "<div class=\"row\">";
        echo "<table class=\"table\">";
            echo "<thead>";
            echo "<tr>";
                echo "<th scope=\"col\">#</th>";
                echo "<th scope=\"col\">student_no</th>";
                echo "<th scope=\"col\">first_name</th>";
                echo "<th scope=\"col\">last_name</th>";
                echo "<th scope=\"col\">class</th>";
                echo "<th scope=\"col\">action</th>";
                
                
            echo "</tr>";
            echo "</thead>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                // echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $x++;
                echo "<td>" . $row['student_no'] . "</td>";
                echo "<td>" . $row['first_name'] . "</td>";
                echo "<td>" . $row['last_name'] . "</td>";
                echo "<td>" . $row['class'] . "</td>";
                ?>
                <td><a href="teacher-student.php?class_teacher_no=<?php echo $row["class_teacher_no"]; ?>" class="btn btn-info">Student per teacher</a></td>
              <?php 
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        echo "</div>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
