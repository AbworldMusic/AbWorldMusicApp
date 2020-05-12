<?php 
    include_once('../db.php');

    $studentId = $_POST['id'];
    $value =  $_POST['value'];
    $date =  $_POST['date'];
    $day =  $_POST['day'];


    if(!$conn)
        echo "Connection failed";
    
    

    $result = mysqli_query($conn,"SELECT * FROM Students WHERE id='$studentId'");

    
    while($row = mysqli_fetch_array($result)){
        $current_lesson_id = $row["current_lesson_id"];
        if($value=="Promote"){
            $lesson = mysqli_query($conn,"SELECT * FROM lessons WHERE id > '$current_lesson_id' LIMIT 1");
            while($row1 = mysqli_fetch_array($lesson)){
                $updated_lesson_id = $row1["id"];
                $updated_lesson_name = $row1["title"];
                $sql = "UPDATE Students set current_lesson_id='$updated_lesson_id' WHERE id='$studentId' AND date='$date'";
            }
        }
        else{
            $lesson = mysqli_query($conn,"SELECT * FROM lessons WHERE id < '$current_lesson_id' LIMIT 1");
            if (mysqli_num_rows($result)==0){
                $updated_lesson_name = "Same lesson";
            }
            while($row1 = mysqli_fetch_array($lesson)){
                $updated_lesson_id = $row1["id"];
                $updated_lesson_name = $row1["title"];
                $sql = "UPDATE Students set current_lesson_id='$updated_lesson_id' WHERE id='$studentId' AND date='$date'";
            }
        }
        
        if (mysqli_query($conn, $sql)) {
            echo "Marked ".$updated_lesson_name;

        }
    }
        
    

?>