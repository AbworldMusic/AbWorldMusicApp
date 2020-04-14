

<?php 
include_once('admin_check.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once('db.php');

    $id=$_POST['id']; 
    $name=$_POST['studentName'];
    $age=$_POST['studentAge'];
    $level=$_POST['studentLevel'];
    $parentName=$_POST['parentName'];
    $parentPhone=$_POST['parentPhone'];
    $parentEmail=$_POST['parentEmail'];
    $class=$_POST['studentClass'];
    $section=$_POST['studentSection'];
    $branch=$_POST['studentBranch'];
    
    
    $sql = "UPDATE Students set name='$name', age='$age', level='$level',parentName='$parentName',branch='$branch',
            class='$class', section='$section', parentPhone='$parentPhone', parentEmail='$parentEmail' WHERE id='$id'";
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    if (mysqli_query($conn, $sql)) {
        header("Location: students.php");    
    }
}
else{
 
include_once('header.php');
include_once('db.php');

?>
<title>Student</title>
<div class="d-flex h-100 w-100">
    <div class='p-2 bg-light nav-bar h-100'>
        <div class="flex-column h-100 w-100 py-2">
            <a href="admin_home.php" class='nav-item  pb-1 mb-3'>Home</a>
            <a href="students.php" class='nav-item active pb-1 mb-3'>Students</a>
            <a href="users.php" class='nav-item pb-1 mb-3'>Users</a>
            <a href="faculty.php" class='nav-item pb-1 mb-3'>Faculty</a>
            <a href="branches.php" class='nav-item  pb-1 mb-3'>Branches</a>
            <a href="lessons.php" class='nav-item pb-1 mb-3'>Lessons</a>
        </div>
    </div>
    <div class="h-100 w-100">
        <div class="w-100 bg-white p-3">
        
            
            <?php 
                include_once('db.php');
                $id=$_GET['id'];
                $result = mysqli_query($conn,"SELECT * FROM Students WHERE id='$id'");
                
                while($row = mysqli_fetch_array($result)){
                
            ?>
                <div class="m-3 pt-4  col-sm-12 col-lg-6">
                    <form action="edit_student.php" method='post' class='form-group'>
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                        <label for="studentName" class="font-label mt-1">Student Name</label>
                        <input id="studentName" name="studentName" type="text" class="form-control" value="<?php echo $row['name']; ?>"/>

                        <label for="studentAge" class="font-label mt-3">Student Age</label>
                        <input id="studentAge" name="studentAge" type="number" min=0 max=120 class="form-control" value="<?php echo $row['age']; ?>"/>
                        
                        <label for="studentBranch" class="font-label mt-3">Branch</label>
                        <span id='currentBranch' class='d-none'><?php echo $row['branch']; ?></span>
                        <select class="form-control" id="studentBranch" name="studentBranch">                        
                        <?php 
                            
                            include_once('db.php');
                            $result = mysqli_query($conn,"SELECT * FROM branches");
                            
                            while($row1 = mysqli_fetch_array($result)){
                            
                        ?>
                            <option ><?php echo $row1['name']; ?></option>
                        <?php } ?>
                        </select>
                        
                        <label for="studentClass" class="font-label mt-3">Student Class/Standard</label>
                        <span id='currentClass' class='d-none'><?php echo $row['class']; ?></span>
                        <select class="form-control" id="studentClass" name="studentClass">                        
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                        </select>
                        <label for="studentSection" class="font-label mt-3">Student Section</label>
                        <span id='currentSection' class='d-none'><?php echo $row['section']; ?></span>
                        <select class="form-control" id="studentSection" name="studentSection">                        
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                            <option>D</option>
                            <option>E</option>
                            <option>F</option>
                            <option>G</option>
                            <option>H</option>
                            <option>I</option>
                            <option>J</option>
                            <option>K</option>
                            <option>L</option>
                            <option>M</option>
                            <option>N</option>
                            <option>O</option>
                            <option>P</option>
                            <option>Q</option>
                            <option>R</option>
                            <option>S</option>
                            <option>T</option>
                            <option>U</option>
                            <option>V</option>
                            <option>W</option>
                            <option>X</option>
                            <option>Y</option>
                            <option>Z</option>


                        </select>
                        
                        <label for="studentLevel" class="font-label mt-3">Student Level</label>
                        <input id="studentLevel" name="studentLevel" type="number" min=0 max=20  class="form-control" value="<?php echo $row['level']; ?>"/>
                        
                        <label for="parentName" class="font-label mt-3">Parent Name</label>
                        <input id="parentName" name="parentName" type="text" class="form-control" value="<?php echo $row['parentName']; ?>"/>
                        
                        <label for="parentPhone" class="font-label mt-3">Parent phone</label>
                        <input id="parentPhone" name="parentPhone" type="number" min=1000000000 max=9999999999 class="form-control" value="<?php echo $row['parentPhone']; ?>"/>
                        
                        <label for="parentEmail" class="font-label mt-3">Parent email</label>
                        <input id="parentEmail" name="parentEmail" type="email" class="form-control" value="<?php echo $row['parentEmail']; ?>"/>
                        
                        <button type="submit" class="btn btn-info mt-4">Update</button>
                    </form>
                </div>
            <?php } ?>
        </div>


        </div>
        
    </div>
</div>
<?php } ?>
<script>
    $(document).ready(function(){
        $("#studentBranch").val($("#currentBranch").text());
        $("#studentClass").val($("#currentClass").text());
        $("#studentSection").val($("#currentSection").text());
        console.log($("#currentClass").text())
        console.log($("#currentBranch").text())
    })
</script>