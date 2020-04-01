

<?php 
include_once('admin_check.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once('db.php');
    
    $id=$_POST['id']; 
    $name=$_POST['branchName'];
    $incharge=$_POST['branchIncharge'];
    $phone=$_POST['branchPhone'];
    $capacity=$_POST['branchCapacity'];

    
    $sql = "UPDATE branches set name='$name', incharge='$incharge', phone='$phone',
            capacity='$capacity' WHERE id='$id'";
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    if (mysqli_query($conn, $sql)) {
        header("Location: branches.php");    
    }
}
else{
 
include_once('header.php');
include_once('db.php');

?>
<title>Branches</title>
<div class="d-flex h-100 w-100">
    <div class='p-2 bg-light nav-bar h-100'>
        <div class="flex-column h-100 w-100 py-2">
            <a href="admin_home.php" class='nav-item  pb-1 mb-3'>Home</a>
            <a href="students.php" class='nav-item pb-1 mb-3'>Students</a>
            <a href="users.php" class='nav-item pb-1 mb-3'>Users</a>
            <a href="faculty.php" class='nav-item  pb-1 mb-3'>Faculty</a>
            <a href="branches.php" class='nav-item active pb-1 mb-3'>Branches</a>
            <a href="lessons.php" class='nav-item pb-1 mb-3'>Lessons</a>
        </div>
    </div>
    <div class="h-100 w-100">
        <div class="w-100 bg-white p-3">
        
            
            <?php 
                $id=$_GET['id'];
                $result = mysqli_query($conn,"SELECT * FROM branches WHERE id='$id'");
                
                while($row = mysqli_fetch_array($result)){
                
            ?>
                <div class="m-3 pt-4  col-sm-12 col-lg-6">
                    <form action="edit_branch.php" method="post" class='form-group'>
                        <input type="hidden" value="<?php echo $row['id']; ?>" name='id'>     

                        <label for="branchName" class="font-label mt-1">Branch Name</label>
                        <input id="branchName" value="<?php echo $row['name']; ?>" name="branchName" type="text" class="form-control"/>
                        
                        <label for="branchIncharge" class="font-label mt-1">Branch Incharge</label>
                        <input id="branchIncharge" value="<?php echo $row['incharge'];?>" name="branchIncharge" type="text" class="form-control"/>
                        
                        <label for="branchCapacity" class="font-label mt-3">Branch capacity</label>
                        <input id="branchCapacity" value="<?php echo $row['capacity'];?>"  name="branchCapacity" type="number" min=0 max=120 class="form-control"/>
                        
                        <label for="branchPhone" class="font-label mt-3">Branch phone</label>
                        <input id="branchPhone" value="<?php echo $row['phone'];?>" name="branchPhone" type="number" min=1000000000 max=9999999999 class="form-control"/>

                        <button type="submit" class="btn btn-info mt-4">Update</button>
                    </form>
                </div>
            <?php } ?>
        </div>


        </div>
        
    </div>
</div>
<?php } ?>