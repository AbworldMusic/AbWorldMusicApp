<?php
include_once('base.php');
?>

<body>
    <div class='header d-flex justify-content-start bg-light'>
        <div class="my-4 container ">
            <h1>World of Music</h1>
            <h5><i class='fa fa-user'></i> Manage users</h5>
        </div>
    </div>
    <div class="mt-4 container">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

            <li class="nav-item">
                <a class="nav-link active" id="pills-view-tab" data-toggle="pill" href="#pills-view" role="tab" aria-controls="pills-view" aria-selected="false">Manage/View Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " id="pills-add-tab" data-toggle="pill" href="#pills-add" role="tab" aria-controls="pills-add" aria-selected="true">Add new user</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active container-fluid" id="pills-view" role="tabpanel" aria-labelledby="pills-view-tab">
                    <div class='d-flex font-weight-bold bg-light p-2'>
                        <div class='w-25'>Name</div>
                        <div class='w-25'>Email</div>
                        <div class='w-25'>Phone</div>
                        <div class='w-25'>Role</div>
                    </div>
                        <?php 
                            include_once('../db.php');
                            if(!$conn)
                                echo "Connection failed";
                            $result = mysqli_query($conn,"SELECT * FROM users WHERE organization_id=2");
                            $slno = 1;
                            while($row = mysqli_fetch_array($result)){
                        ?>
                        <div class='d-flex p-2 border-bottom border-light'>
                            <div class='w-25 px-1' style='overflow-wrap: break-word;'><?php echo $row['name']; ?></div>
                            <div class='w-25 px-1' style='overflow-wrap: break-word;'><?php echo $row['email']; ?></div>
                            <div class='w-25 px-1' style='overflow-wrap: break-word;'><?php echo $row['phone']; ?></div>
                            <div class='w-25 px-1' style='overflow-wrap: break-word;'><?php echo $row['role']; ?></div>
                            <!-- <td><a href="delete_user.php?id=<?php echo $row['id']?>" class='btn btn-danger py-1'>Delete</a></td> -->
                        </div>
                        <?php $slno+=1; } ?>
            </div>
            <div class="tab-pane fade " id="pills-add" role="tabpanel" aria-labelledby="pills-add-tab">
                <div class='student-info info'>
                    <div class="d-flex py-2 mt-4 my-3 border-bottom">
                        <h6>User information</h6>
                    </div>
                    <form action="add_new_user.php" method="post">
                    <div class="row d-flex justify-content-around my-2">
                        <label for="userName" class='mt-2 w-25'>Name: </label>
                        <input type="text" class='form-control w-50' name='name' id='userName'>
                    </div>
                    <div class="row d-flex justify-content-around my-2">
                        <label for="userPhone" class='mt-2 w-25'>Phone: </label>
                        <input type="number" class='form-control w-50' name='phone' id='userPhone'>
                    </div>
                    <div class="row d-flex justify-content-around my-2">
                        <label for="userRole" class='mt-2 w-25'>Role: </label>
                        <select class='form-control w-50' name='role' id='userRole'>
                            <option value="Super Admin">Super Admin</option>
                            <option value="Admin">Admin</option>
                            <option value="Faculty">Faculty</option>
                        </select>
                    </div>
                    
                    <div class="row d-flex justify-content-around my-2">
                        <label for="userEmail" class='mt-2 w-25'>Email: </label>
                        <input type="email" class='form-control w-50' name='email' id='userEmail'>
                    </div>
                    <input type="hidden" value='2' name='orgnizationId'>
                    <button type='submit' class='btn btn-primary mt-3 float-right'>Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>