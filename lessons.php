

<?php 
include_once('header.php');
include_once('db.php');
include_once('admin_check.php');
?>
<title>Lessons</title>
<div class="d-flex h-100 w-100">
    <div class='p-2 bg-light nav-bar h-100'>
        <div class="flex-column h-100 w-100 py-2">
            <a href="admin_home.php" class='nav-item  pb-1 mb-3'>Home</a>
            <a href="students.php" class='nav-item  pb-1 mb-3'>Students</a>
            <a href="users.php" class='nav-item pb-1 mb-3'>Users</a>
            <a href="faculty.php" class='nav-item  pb-1 mb-3'>Faculty</a>
            <a href="branches.php" class='nav-item  pb-1 mb-3'>Branches</a>
            <a href="lessons.php" class='nav-item active pb-1 mb-3'>Lessons</a>
        </div>
    </div>
    <div class="h-100 w-100">
        <div class="w-100 bg-white p-3">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="">
                <a class="sub-nav active p-2 mr-2" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-home" aria-selected="true">All Lessons</a>
            </li>
            <li class="">
                <a class="sub-nav p-2" id="pills-new-tab" data-toggle="pill" href="#pills-new" role="tab" aria-controls="pills-profile" aria-selected="false">Create New</a>
            </li>
        </ul>
        <div class="tab-content bg-white" id="pills-tabContent">
            
            <div class="tab-pane fade show active bg-white" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                <table class="table table-striped mt-5 pt-5">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Level</th>
                        
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            include_once('db.php');
                            if(!$conn)
                                echo "Connection failed";
                            $result = mysqli_query($conn,"SELECT * FROM lessons");
                            $slno = 1;
                            while($row = mysqli_fetch_array($result)){
                        ?>
                        <tr>
                            <td><?php echo $slno; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['category']; ?></td>
                            <td><?php echo $row['level']; ?></td>
                           
                            <td><a href="edit_lesson.php?id=<?php echo $row['id']?>" class='btn btn-primary py-1 mr-2'>Edit</a></td>
                            <td><a href="delete_lesson.php?id=<?php echo $row['id']?>" class='btn btn-danger py-1'>Delete</a></td>
                        </tr>
                        <?php $slno+=1; } ?>
                </table>
            </div>
            <div class="tab-pane fade bg-white" id="pills-new" role="tabpanel" aria-labelledby="pills-new-tab">
                <div class="m-3 pt-4  col-sm-12 col-lg-6">
                <form action="add_new_lesson.php" method="post" class='form-group' enctype="multipart/form-data">
                    <label for="title" class="font-label mt-1">Lesson Title</label>
                    <input id="title" name="title" type="text" class="form-control"/>
                    
                    <label for="sel1" class="mt-3">Category</label>
                    <select class="form-control" id="sel1" name="category">
                        <option>Guitar</option>
                        <option>Keyboard</option>
                        <option>Drums</option>
                    </select>

                    <label for="level" class="font-label mt-3">Level</label>
                    <input id="level" name="level" type="number" min=1 max=50 class="form-control"/>
                    
                    <label for="level" class="font-label mt-3">Lesson image</label><br>
                    <small>Upload .png images to load images faster</small>
                    <input id="image" name="image" type="file" class="form-control"/>
                    
                    <label for="description" class="font-label mt-3">Description</label>
                    <textarea id="description" name="description" type="email" class="form-control" rows="6"></textarea>
                    
                    <button type="submit" class="btn btn-info mt-4">Submit</button>
                </form>
                </div>
            </div>
        </div>


        </div>
        
    </div>
</div>