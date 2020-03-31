

<?php 
include_once('header.php');
include_once('db.php');
include_once('admin_check.php');    
?>
<title>Users</title>
<div class="d-flex h-100 w-100">
    <div class='p-2 bg-light nav-bar h-100'>
        <div class="flex-column h-100 w-100 py-2">
            <a href="admin_home.php" class='nav-item  pb-1 mb-3'>Home</a>
            <a href="students.php" class='nav-item pb-1 mb-3'>Students</a>
            <a href="students.php" class='nav-item active pb-1 mb-3'>Users</a>
            <a href="faculty.php" class='nav-item pb-1 mb-3'>Faculty</a>
            <a href="branches.php" class='nav-item  pb-1 mb-3'>Branches</a>
        </div>
    </div>
    <div class="h-100 w-100">
        <div class="w-100 bg-white p-3">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="">
                <a class="sub-nav active p-2 mr-2" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-home" aria-selected="true">All Users</a>
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
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Role</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            include_once('db.php');
                            if(!$conn)
                                echo "Connection failed";
                            $result = mysqli_query($conn,"SELECT * FROM users");
                            $slno = 1;
                            while($row = mysqli_fetch_array($result)){
                        ?>
                        <tr>
                            <td><?php echo $slno; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['role']; ?></td>
                            <td><a href="delete_user.php?id=<?php echo $row['id']?>" class='btn btn-danger py-1'>Delete</a></td>
                        </tr>
                        <?php $slno+=1; } ?>
                </table>
            </div>
            <div class="tab-pane fade bg-white" id="pills-new" role="tabpanel" aria-labelledby="pills-new-tab">
                <div class="m-3 pt-4  col-sm-12 col-lg-6">
                    <form action="add_new_user.php" method='post' class='form-group'>
                        <label for="name" class="font-label mt-1"> Name</label>
                        <input id="name" name="name" type="text" class="form-control"/>

                        <label for="email" class="font-label mt-3">Email</label>
                        <input id="email" name="email" type="email" class="form-control"/>
                        
                        <label for="phone" class="font-label mt-3">Phone</label>
                        <input id="phone" name="phone" type="number" class="form-control"/>

                        <label for="sel1">Role</label>
                        <select class="form-control" id="sel1" name="role">
                            <option>Admin</option>
                            <option>Faculty</option>
                        </select>
                        
                        <label for="password" class="font-label mt-3">Password</label>
                        <input id="password" name="password" type="password" class="form-control"/>
                        
                        <label for="confirm_password" class="font-label mt-3">Confirm Password</label>
                        <input id="confirm_password" name="confirm_password" type="password" class="form-control"/>
                        
                        
                        <button type="submit" class="btn btn-info mt-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>


        </div>
        
    </div>
</div>