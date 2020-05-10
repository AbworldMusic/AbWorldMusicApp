

<?php 
include_once('admin_check.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once('db.php');
    
    $id=$_POST['id']; 
    $title=$_POST['title'];
    $description=$_POST['description'];
    $description = str_replace("'", "''", $description);
    $category=$_POST['category'];
    $level=$_POST['level'];

    if(file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])) {
    
        $image = $_FILES['image']['name'];
        $target = "images/".basename($image);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
        }
    }
    $sql = "UPDATE lessons set title='$title', image='$image', description='$description', category='$category',
            level='$level' WHERE id='$id'";
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    if (mysqli_query($conn, $sql)) {
        header("Location: lessons.php");    
    }
}
else{
 
include_once('header.php');
include_once('db.php');

?>
<title>Lessons</title>
<div class="d-flex h-100 w-100">
    <div class='p-2 bg-light nav-bar h-100'>
        <div class="flex-column h-100 w-100 py-2">
            <a href="admin_home.php" class='nav-item  pb-1 mb-3'>Home</a>
            <a href="students.php" class='nav-item pb-1 mb-3'>Students</a>
            <a href="users.php" class='nav-item pb-1 mb-3'>Users</a>
            <a href="faculty.php" class='nav-item  pb-1 mb-3'>Faculty</a>
            <a href="branches.php" class='nav-item  pb-1 mb-3'>Branches</a>
            <a href="branches.php" class='nav-item active pb-1 mb-3'>Lessons</a>
        </div>
    </div>
    <div class="h-100 w-100">
        <div class="w-100 bg-white p-3">
        
            
            <?php 
                $id=$_GET['id'];
                $result = mysqli_query($conn,"SELECT * FROM lessons WHERE id='$id'");
                
                while($row = mysqli_fetch_array($result)){
                
            ?>
                <div class="m-3 pt-4  col-sm-12 col-lg-6">
                <form action="edit_lesson.php" method="post" class='form-group' enctype="multipart/form-data">
                    
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">    

                    <label for="title" class="font-label mt-1">Lesson Title</label>
                    <input id="title" value="<?php echo $row['title']; ?>" name="title" type="text" class="form-control"/>
                    
                    <label for="sel1" class="mt-3">Category</label>
                    <select class="form-control"  value="<?php echo $row['categ ry']; ?>" id="sel1" name="category">
                        <option>Guitar</option>
                        <option>Keyboard</option>
                        <option>Drums</option>
                    </select>

                    <label for="level" class="font-label mt-3">Level</label>
                    <input id="level" value="<?php echo $row['level']; ?>" name="level" type="number" min=1 max=50 class="form-control"/>

                    <label for="image" class="font-label mt-3">Lesson image</label><br>
                    <small>Upload .png images to load images faster</small><br>
                    <?php
                        $image= "./images/". $row['image'];
                    ?>
                    <img class="lesson-image" src="<?php echo $image; ?>" alt="Lesson">
                    <input id="image" name="image" value="<?php echo $row['image']; ?>"  type="file" class="form-control"/>
                    
                    <label for="description" class="font-label mt-3">Description</label>
                    <textarea id="description" name="description" type="email" class="form-control" rows="6"> <?php echo $row['description']; ?>"</textarea>
                    
                    <button type="submit" class="btn btn-info mt-4">Submit</button>
                </form>
                </div>
            <?php } ?>
        </div>


        </div>
        
    </div>
</div>
<?php } ?>