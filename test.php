

<?php 
include_once('header.php');
include_once('db.php');

?>
<title>Student</title>
<div class="d-flex h-100 w-100">
    <div class='p-2 bg-light nav-bar h-100'>
        <div class="flex-column h-100 w-100 py-2">
            <a href="admin_home.php" class='nav-item  pb-1 mb-3'>Home</a>
            <a href="students.php" class='nav-item active pb-1 mb-3'>Students</a>
            <a href="faculty.php" class='nav-item pb-1 mb-3'>Faculty</a>
            <a href="branches.php" class='nav-item  pb-1 mb-3'>Branches</a>
        </div>
    </div>
    <div class="h-100 w-100">
        <div class="w-100 bg-light p-3">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="">
                <a class="sub-nav active p-2 mr-2" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-home" aria-selected="true">All Students</a>
            </li>
            <li class="">
                <a class="sub-nav p-2" id="pills-new-tab" data-toggle="pill" href="#pills-new" role="tab" aria-controls="pills-profile" aria-selected="false">Create New</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-home-tab">
                
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-all-tab">

            </div>
            <div class="tab-pane fade bg-white" id="pills-new" role="tabpanel" aria-labelledby="pills-new-tab">
                <div class="m-3 pt-4  col-sm-12 col-lg-6">
                    <form action="post" class='form-group'>
                        <label for="studentName" class="font-label mt-1">Student Name</label>
                        <input id="studentName" type="text" class="form-control"/>

                        <label for="studentAge" class="font-label mt-3">Student Age</label>
                        <input id="studentAge" type="number" min=0 max=120 class="form-control"/>
                        
                        <label for="studentLevel" class="font-label mt-3">Student Level</label>
                        <input id="studentLevel" type="number" min=0 max=20  class="form-control"/>
                        
                        <label for="parentName" class="font-label mt-3">Parent Name</label>
                        <input id="parentName" type="text" class="form-control"/>
                        
                        <label for="parentPhone" class="font-label mt-3">Parent phone</label>
                        <input id="parentPhone" type="number" min=1000000000 max=9999999999 class="form-control"/>
                        
                        <label for="parentEmail" class="font-label mt-3">Parent email</label>
                        <input id="parentEmail" type="email" class="form-control"/>
                        
                        <button type="submit" class="btn btn-info mt-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>


        </div>
        
    </div>
</div>