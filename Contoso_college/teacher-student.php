
<?php

include("./model/logic.php");
include("./model/conn.php");
include("./model/header.php");

?>

<?php

$x=1;

$class_teacher_no = $_GET['class_teacher_no'];     //fetches the class_teacher_no as id
 
// Attempt select query execution
$sql              = "SELECT * FROM students WHERE class_teacher_no = '$class_teacher_no'";    //sql query

if($result = mysqli_query($dbconn, $sql)){     //connects db with sql query
    if(mysqli_num_rows($result) > 0){       //checks if table is not empty

        //display table header
        echo "<div class=\"container\">";
        echo "<div class=\"row\">";
        echo "<table class=\"table\">";
            echo "<thead>";
            echo "<tr>";
                echo "<th scope=\"col\">#</th>";
                echo "<th scope=\"col\">staff number</th>";
                echo "<th scope=\"col\">staff fullname</th>";
                echo "<th scope=\"col\">student number</th>";
                echo "<th scope=\"col\">student first name</th>";
                echo "<th scope=\"col\">student last name</th>";
                echo "<th scope=\"col\">class</th>";
            echo "</tr>";
            echo "</thead>";

        while($row = mysqli_fetch_array($result)){      //display table data after loop
            echo "<tr>";
                echo "<td>" . $x++;
                echo "<td>" . $row['class_teacher_no'] . "</td>";
                echo "<td>" . $row['class_teacher_name'] . "</td>";
                echo "<td>" . $row['student_no'] . "</td>";
                echo "<td>" . $row['first_name'] . "</td>";
                echo "<td>" . $row['last_name'] . "</td>";
                echo "<td>" . $row['class'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        echo "</div>";
        // check if table is empty or not
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>

