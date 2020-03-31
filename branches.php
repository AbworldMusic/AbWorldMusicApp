

<?php 
include_once('header.php');
include_once('db.php');
include_once('admin_check.php');
?>
<title>Branches</title>
<div class="d-flex h-100 w-100">
    <div class='p-2 bg-light nav-bar h-100'>
        <div class="flex-column h-100 w-100 py-2">
            <a href="admin_home.php" class='nav-item  pb-1 mb-3'>Home</a>
            <a href="students.php" class='nav-item  pb-1 mb-3'>Students</a>
            <a href="users.php" class='nav-item pb-1 mb-3'>Users</a>
            <a href="faculty.php" class='nav-item  pb-1 mb-3'>Faculty</a>
            <a href="branches.php" class='nav-item active pb-1 mb-3'>Branches</a>
        </div>
    </div>
    <div class="h-100 w-100">
        <div class="w-100 bg-white p-3">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="">
                <a class="sub-nav active p-2 mr-2" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-home" aria-selected="true">All Branches</a>
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
                        <th scope="col">Incharge</th>
                        <th scope="col">Capacity</th>
                        <th scope="col">Phone</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            include_once('db.php');
                            if(!$conn)
                                echo "Connection failed";
                            $result = mysqli_query($conn,"SELECT * FROM branches");
                            $slno = 1;
                            while($row = mysqli_fetch_array($result)){
                        ?>
                        <tr>
                            <td><?php echo $slno; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['incharge']; ?></td>
                            <td><?php echo $row['capacity']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                           
                            <td><a href="edit_branch.php?id=<?php echo $row['id']?>" class='btn btn-primary py-1 mr-2'>Edit</a></td>
                            <td><a href="delete_branch.php?id=<?php echo $row['id']?>" class='btn btn-danger py-1'>Delete</a></td>
                        </tr>
                        <?php $slno+=1; } ?>
                </table>
            </div>
            <div class="tab-pane fade bg-white" id="pills-new" role="tabpanel" aria-labelledby="pills-new-tab">
                <div class="m-3 pt-4  col-sm-12 col-lg-6">
                <form action="add_new_branch.php" method="post" class='form-group'>
                    <label for="branchName" class="font-label mt-1">Branch Name</label>
                    <input id="branchName" name="branchName" type="text" class="form-control"/>
                    
                    <label for="branchIncharge" class="font-label mt-1">Branch Incharge</label>
                    <input id="branchIncharge" name="branchIncharge" type="text" class="form-control"/>
                    
                    <label for="branchCapacity" class="font-label mt-3">Branch capacity</label>
                    <input id="branchCapacity" name="branchCapacity" type="number" min=0 max=120 class="form-control"/>
                    
                    <label for="branchPhone" class="font-label mt-3">Branch phone</label>
                    <input id="branchPhone" name="branchPhone" type="number" min=1000000000 max=9999999999 class="form-control"/>

                    <button type="submit" class="btn btn-info mt-4">Submit</button>
                </form>
                </div>
            </div>
        </div>


        </div>
        
    </div>
</div>