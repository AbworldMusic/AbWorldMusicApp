

<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once('db.php');

    $id=$_POST['id']; 
    $name=$_POST['studentName'];
    $age=$_POST['studentAge'];
    $level=$_POST['studentLevel'];
    $parentName=$_POST['parentName'];
    $parentPhone=$_POST['parentPhone'];
    $parentEmail=$_POST['parentEmail'];
    
    
    $sql = "UPDATE Students set name='$name', age='$age', level='$level',parentName='$parentName',
            parentPhone='$parentPhone', parentEmail='$parentEmail' WHERE id='$id'";
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
            <a href="faculty.php" class='nav-item pb-1 mb-3'>Faculty</a>
            <a href="branches.php" class='nav-item  pb-1 mb-3'>Branches</a>
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