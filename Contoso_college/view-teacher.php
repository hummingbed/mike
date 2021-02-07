<?php

include("./model/logic.php");
include("./model/conn.php");
include("./model/header.php");

?>

<?php

$dbconn = mysqli_connect("localhost", "root", "", "contoso_college");

$x=1;
 
// Attempt select query execution
$sql = "SELECT * FROM teacher ";
if($result = mysqli_query($dbconn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<div class=\"container\">";
        echo "<div class=\"row\">";
        echo "<table class=\"table\">";
            echo "<thead>";
            echo "<tr>";
                echo "<th scope=\"col\">#</th>";
                echo "<th scope=\"col\">staff_no</th>";
                echo "<th scope=\"col\">first_name</th>";
                echo "<th scope=\"col\">last_name</th>";
                echo "<th scope=\"col\">levels</th>";
                echo "<th scope=\"col\">class_held</th>";
                
                
            echo "</tr>";
            echo "</thead>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                // echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $x++;
                echo "<td>" . $row['staff_no'] . "</td>";
                echo "<td>" . $row['first_name'] . "</td>";
                echo "<td>" . $row['last_name'] . "</td>";
                echo "<td>" . $row['levels'] . "</td>";
                echo "<td>" . $row['class_held'] . "</td>";
                // echo "<td>" . $row['class_teacher_name'] . "</td>";
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
