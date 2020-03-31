

<?php 
include_once('header.php');
include_once('db.php');
include_once('admin_check.php');
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
        </div>
    </div>
    <div class="h-100 w-100">
        <div class="w-100 bg-white p-3">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="">
                <a class="sub-nav active p-2 mr-2" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-home" aria-selected="true">All Students</a>
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
                        <th scope="col">Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Level</th>
                        <th scope="col">Parent Name</th>
                        <th scope="col">Parent Phone</th>
                        <th scope="col">Parent Emaii</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            include_once('db.php');
                            if(!$conn)
                                echo "Connection failed";
                            $result = mysqli_query($conn,"SELECT * FROM Students");
                            $slno = 1;
                            while($row = mysqli_fetch_array($result)){
                        ?>
                        <tr>
                            <td><?php echo $slno; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['age']; ?></td>
                            <td><?php echo $row['level']; ?></td>
                            <td><?php echo $row['parentName']; ?></td>
                            <td><?php echo $row['parentPhone']; ?></td>
                            <td><?php echo $row['parentEmail']; ?></td>
                            <td><a href="edit_student.php?id=<?php echo $row['id']?>" class='btn btn-primary py-1 mr-2'>Edit</a></td>
                            <td><a href="delete_student.php?id=<?php echo $row['id']?>" class='btn btn-danger py-1'>Delete</a></td>
                        </tr>
                        <?php $slno+=1; } ?>
                </table>
            </div>
            <div class="tab-pane fade bg-white" id="pills-new" role="tabpanel" aria-labelledby="pills-new-tab">
                <div class="m-3 pt-4  col-sm-12 col-lg-6">
                    <form action="add_new_student.php" method='post' class='form-group'>
                        <label for="studentName" class="font-label mt-1">Student Name</label>
                        <input id="studentName" name="studentName" type="text" class="form-control"/>

                        <label for="studentAge" class="font-label mt-3">Student Age</label>
                        <input id="studentAge" name="studentAge" type="number" min=0 max=120 class="form-control"/>
                        
                        <label for="studentLevel" class="font-label mt-3">Student Level</label>
                        <input id="studentLevel" name="studentLevel" type="number" min=0 max=20  class="form-control"/>
                        
                        <label for="parentName" class="font-label mt-3">Parent Name</label>
                        <input id="parentName" name="parentName" type="text" class="form-control"/>
                        
                        <label for="parentPhone" class="font-label mt-3">Parent phone</label>
                        <input id="parentPhone" name="parentPhone" type="number" min=1000000000 max=9999999999 class="form-control"/>
                        
                        <label for="parentEmail" class="font-label mt-3">Parent email</label>
                        <input id="parentEmail" name="parentEmail" type="email" class="form-control"/>
                        
                        <button type="submit" class="btn btn-info mt-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>


        </div>
        
    </div>
</div>