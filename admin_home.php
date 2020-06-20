<?php 
include_once('header.php');
include_once('admin_check.php');
include_once('db.php');
?>
<title>Ab World | Team</title>
<div class="d-flex h-100 w-100">
    <div class='p-2 bg-light nav-bar'>
        <div class="flex-column h-100 w-100 py-2">
            <a href="admin_home.php" class='nav-item active pb-1 mb-3'>Home</a>
            <a href="students.php" class='nav-item pb-1 mb-3'>Students</a>
            <a href="users.php" class='nav-item pb-1 mb-3'>Users</a>
            <a href="faculty.php" class='nav-item pb-1 mb-3'>Faculty</a>
            <a href="branches.php" class='nav-item pb-1 mb-3'>Branches</a>
            <a href="lessons.php" class='nav-item pb-1 mb-3'>Lessons</a>
            <a href="inventory.php" class='nav-item pb-1 mb-3'>Inventory</a>
        </div>
    </div>
    <div class='p-3 row w-100'>
        <div class="col-sm-4  p-2 ">
            <div class='border border-secondary rounded p-2'>
            <h4>Branches</h4>
            <br>    
            <?php
                $result = mysqli_query($conn,"SELECT * FROM branches");
                while($row = mysqli_fetch_array($result)){
            ?>
                <h6><?php echo $row['name']; ?></h6>
            <?php } ?>
            </div>
        </div>
        <div class="col-sm-4  p-2 ">
            <div class='border border-secondary rounded p-2'>
            <h4>Students</h4>
            <?php
                $result = mysqli_query($conn,"SELECT * FROM Students");
                $count = 0;
                while($row = mysqli_fetch_array($result)){
                    $count=$count+1;
                }
            ?>
            <div class="count"><?php echo $count; ?></div>
            </div>
        </div>
        
        <div class="col-sm-4  p-2 ">
            <div class='border border-secondary rounded p-2'>
            <h4>Faculty</h4>
            <?php
                $result = mysqli_query($conn,"SELECT * FROM faculty");
                $count = 0;
                while($row = mysqli_fetch_array($result)){
                    $count=$count+1;
                }
            ?>
            <div class="count"><?php echo $count; ?></div>
            </div>
            </div>
        </div>
    </div>