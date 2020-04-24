  <?php
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include_once('db.php');
        include_once('admin_check.php');
        $name=$_POST['studentName'];
        $age=$_POST['studentAge'];
        $class=$_POST['studentClass'];
        $section=$_POST['studentSection'];
        $branch=$_POST['studentBranch'];
        $level=$_POST['studentLevel'];
        $parentName=$_POST['parentName'];
        $parentPhone=$_POST['parentPhone'];
        $parentPhone2=$_POST['parentPhone2'];
        $parentEmail=$_POST['parentEmail'];
        $gender = $_POST['gender'];
        if(isset($_POST['brainMatrix'])) {
          $brain_matrix = 1;
        }
        else{
          $brain_matrix = 0;
        }
        
        $sql = "INSERT into Students (name, brain_matrix, gender, age, branch, level, parentName, parentPhone, parentPhone2, parentEmail, class, section)
                values('$name','$brain_matrix', '$gender','$age','$branch','$level','$parentName', '$parentPhone','$parentPhone2', '$parentEmail', '$class', '$section')";
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        if (mysqli_query($conn, $sql)) {
            header("Location: students.php");    
        }
    }
  ?> 