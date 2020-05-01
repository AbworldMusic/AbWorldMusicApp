<?php 
    include_once('../db.php');

    $classNames= $_POST['classes'];
    $clasNames = (explode(",",$classNames));
    $branch = $_POST['branch'];
    $date = $_POST['date'];

    if(!$conn)
        echo "Connection failed";
    
    $result = mysqli_query($conn,"SELECT * FROM Students WHERE branch='$branch' order by name");
    $entries = array();
    while($row = mysqli_fetch_array($result)){
        foreach ($clasNames as $value){
            if( $row["class"]==substr($value,0,-1) && $row["section"]==$value[-1]){
                $record =  new \stdClass();
                $record->id = $row['id'];
                $record->name = $row['name'];

                $attendance = mysqli_query($conn,"SELECT * FROM attendance WHERE student_id='$record->id'
                                            AND date='$date' LIMIT 1");
                if (mysqli_num_rows($attendance)==0){
                    $record->attendance = "Absent";
                }
                else{
                    while($row1 = mysqli_fetch_array($attendance)){
                        $record->attendance = $row1['value'];
                    }
                }
                array_push($entries, $record);   
            }
        }    
    }
    
    echo json_encode($entries);
?>