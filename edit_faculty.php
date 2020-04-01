

<?php 
include_once('admin_check.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once('db.php');
    
    $id=$_POST['id']; 
    $name=$_POST['facultyName'];
    $age=$_POST['facultyAge'];
    $facultyPhone=$_POST['facultyPhone'];
    $facultyEmail=$_POST['facultyEmail'];
    
    
    $sql = "UPDATE faculty set name='$name', age='$age', phone='$facultyPhone',
            email='$facultyEmail' WHERE id='$id'";
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    if (mysqli_query($conn, $sql)) {
        header("Location: faculty.php");    
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
            <a href="students.php" class='nav-item pb-1 mb-3'>Students</a>
            <a href="users.php" class='nav-item pb-1 mb-3'>Users</a>
            <a href="faculty.php" class='nav-item active pb-1 mb-3'>Faculty</a>
            <a href="branches.php" class='nav-item  pb-1 mb-3'>Branches</a>
            <a href="lessons.php" class='nav-item pb-1 mb-3'>Lessons</a>
        </div>
    </div>
    <div class="h-100 w-100">
        <div class="w-100 bg-white p-3">
        
            
            <?php 
                $id=$_GET['id'];
                $result = mysqli_query($conn,"SELECT * FROM faculty WHERE id='$id'");
                
                while($row = mysqli_fetch_array($result)){
                
            ?>
                <div class="m-3 pt-4  col-sm-12 col-lg-6">
                    <form action="edit_faculty.php" method='post' class='form-group'>
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                        <label for="facultyName" class="font-label mt-1">Faculty Name</label>
                    <input id="facultyName" value="<?php echo $row['name']; ?>" name="facultyName" type="text" class="form-control"/>
                    
                    <label for="facultytAge" class="font-label mt-3">Faculty Age</label>
                    <input id="facultytAge" value="<?php echo $row['age']; ?>" name="facultyAge" type="number" min=0 max=120 class="form-control"/>
                    
                    <label for="facultyPhone" class="font-label mt-3">Faculty phone</label>
                    <input id="facultyPhone" value="<?php echo $row['phone']; ?>" name="facultyPhone" type="number" min=1000000000 max=9999999999 class="form-control"/>
                    
                    <label for="facultyEmail" class="font-label mt-3">Faculty email</label>
                    <input id="facultyEmail" value="<?php echo $row['email']; ?>" name="facultyEmail" type="email" class="form-control"/>
                        
                    <button type="submit" class="btn btn-info mt-4">Update</button>
                    </form>
                </div>
            <?php } ?>
        </div>


        </div>
        
    </div>
</div>
<?php } ?>