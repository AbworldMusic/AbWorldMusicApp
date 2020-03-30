<?php 
include_once('header.php');

?>
<title>Faculty</title>
<div class="d-flex h-100 w-100">
    <div class='p-2 bg-light nav-bar'>
        <div class="flex-column h-100 w-100 py-2">
            <a href="admin_home.php" class='nav-item  pb-1 mb-3'>Home</a>
            <a href="students.php" class='nav-item pb-1 mb-3'>Students</a>
            <a href="faculty.php" class='nav-item active pb-1 mb-3'>Faculty</a>
            <a href="branches.php" class='nav-item  pb-1 mb-3'>Branches</a>
        </div>
    </div>
    <div class="h-100 w-100">
        <div class="w-100 bg-light p-3">
            <div class="sub-nav mr-4 p-2">All Faculty</div>
            <div class="sub-nav active p-2">Create new</div>
        </div>
        <div class="m-3 pt-4 col-sm-12 col-lg-6">
            <form action="post" class='form-group'>
                <label for="facultyName" class="font-label mt-1">Faculty Name</label>
                <input id="facultyName" type="text" class="form-control"/>
                
                <label for="facultytAge" class="font-label mt-3">Faculty Age</label>
                <input id="facultytAge" type="number" min=0 max=120 class="form-control"/>
                
                <label for="facultyPhone" class="font-label mt-3">Faculty phone</label>
                <input id="facultyPhone" type="number" min=1000000000 max=9999999999 class="form-control"/>
                
                <label for="facultyEmail" class="font-label mt-3">Faculty email</label>
                <input id="facultyEmail" type="email" class="form-control"/>
                
                <button type="submit" class="btn btn-info mt-4">Submit</button>
            </form>
        </div>
    </div>
</div>