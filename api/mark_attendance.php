<?php 
    include_once('../db.php');

    $studentId = $_POST['id'];
    $value =  $_POST['value'];
    $date =  $_POST['date'];
    $day =  $_POST['day'];


    if(!$conn)
        echo "Connection failed";
    
    $result = mysqli_query($conn,"SELECT * FROM attendance WHERE student_id='$studentId' AND date='$date'");

    if (mysqli_num_rows($result)==0){
        $sql = "INSERT into attendance(student_id, date, value, day) 
                    values('$studentId','$date','$value','$day')";
        if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }
        if (mysqli_query($conn, $sql)) {
            echo "Marked ".$value;

        }
    }
    else{
        while($row = mysqli_fetch_array($result)){
            $value = $row['value'];
            if($value=="Present"){
                $value = "Absent";
            }
            else{
                $value = "Present";
            }
            $sql = "UPDATE attendance set value='$value' WHERE student_id='$studentId' AND date='$date'";
            if (mysqli_query($conn, $sql)) {
                echo "Marked ".$value;
    
            }
        }
        
    }

?>