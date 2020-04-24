

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
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="">
                    <a class="sub-nav active p-2 mr-2" id="pills-slots-tab" data-toggle="pill" href="#pills-slots" role="tab" aria-controls="pills-slots" aria-selected="false">Slots</a>
                </li>
                <li class="">
                    <a class="sub-nav  p-2 mr-2" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-home" aria-selected="true">Branch Information</a>
                </li>
                <li class="">
                    <a class="sub-nav  p-2 mr-2" id="pills-students-tab" data-toggle="pill" href="#pills-students" role="tab" aria-controls="pills-students" aria-selected="true">Students</a>
                </li>
            </ul>
            
            <div class="tab-content bg-white" id="pills-tabContent">
            
                <div class="tab-pane  fade bg-white col-md-6 p-0" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                    <?php 
                        $id=$_GET['id'];
                        $result = mysqli_query($conn,"SELECT * FROM branches WHERE id='$id'");
                        
                        while($row = mysqli_fetch_array($result)){
                        
                    ?>
                        <div class="m-3 pt-4 ">
                            <form action="edit_branch.php" method="post" class='form-group'>
                                <input type="hidden" value="<?php echo $row['id']; ?>" name='id'>     

                                <label for="branchName" class="font-label mt-1">Branch Name</label>
                                <input id="branchName" value="<?php echo $row['name']; ?>" name="branchName" type="text" class="form-control"/>
                                <?php $branchName = $row['name']; ?>


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
                <div class="tab-pane active show fade bg-white col-md-6 p-0" id="pills-slots" role="tabpanel" aria-labelledby="pills-slots-tab">
                    <?php 
                        $branchId= $_GET['id'];
                        $result = mysqli_query($conn,"SELECT * FROM slots WHERE branch_id='$branchId' order by am_pm, slot_time");
                        $slots = array();
                        $slotIds = array();
                        $assignedTos = array();
                        
                        while($row = mysqli_fetch_array($result)){
                            array_push($slots, $row['slot_name']);
                            array_push($slotIds, $row['id']);
                            array_push($assignedTos, $row['assigned_to']);
                        }
                        
                            
                    ?>
                    <div class='pt-3'>
                        <i class='fa fa-pencil'></i> Click on a slot to edit 
                    </div>
                    <div class="p-3 my-3 mt-4 bg-light rounded days">
                        <p class="h6">Monday <label class='float-right btn py-0 addSlotBtn' data-toggle="modal" data-target="#addSlot"><i class="fa fa-plus"></i> Add new slot</label></p>
                        <div class='mt-4'>
                        <?php 
                            for($i=0;$i<sizeof($slots);$i++){

                                $slotId = $slotIds[$i]; 
                                $assignedTo = $assignedTos[$i]; 
                                $slotDay =  explode(" ", $slots[$i])[0];
                                $slotTime =  explode(" ", $slots[$i])[1]." ". explode(" ", $slots[$i])[2] ;
                                if($slotDay=="Monday"){
                        ?>
                            <div style="display: inline; ">
                                <div class='slot-id' hidden><?php echo $slotId; ?></div>
                                <div class='assigned-to' hidden><?php echo $assignedTo; ?></div>
                                <div data-toggle="modal" data-target="#editSlot" class='slot-box mr-2 mb-2 btn py-1 px-3 border border-dark'>
                                    <?php echo $slotTime; ?>
                                    <div class='font-weight-bold mt-2' ><?php echo $assignedTo; ?></div>
                                </div>
                            </div>
                        <?php
                                }
                            }
                        ?>
                        </div>

                    </div>
                    <div class="p-3 my-3 bg-light rounded days">
                        <p class="h6">Tuesday <label class='float-right btn py-0 addSlotBtn' data-toggle="modal" data-target="#addSlot"><i class="fa fa-plus"></i> Add new slot</label></p>
                        <div class='mt-4'>
                        <?php 
                            
                            for($i=0;$i<sizeof($slots);$i++){
                                $slotId = $slotIds[$i];
                                $assignedTo = $assignedTos[$i];  
                                $slotDay =  explode(" ", $slots[$i])[0];
                                $slotTime =  explode(" ", $slots[$i])[1]." ".explode(" ", $slots[$i])[2] ;
                                if($slotDay=="Tuesday"){
                        ?>
                            <div style="display: inline; ">
                                <div class='slot-id' hidden><?php echo $slotId; ?></div>
                                <div class='assigned-to' hidden><?php echo $assignedTo; ?></div>
                                <div data-toggle="modal" data-target="#editSlot" class='slot-box mr-2 mb-2 btn py-1 px-3 border border-dark'>
                                    <?php echo $slotTime; ?>
                                    <div class='font-weight-bold mt-2' ><?php echo $assignedTo; ?></div>
                                </div>
                            </div>
                        <?php
                                }
                            }
                        ?>
                        </div>
                    </div>
                    <div class="p-3 my-3 bg-light rounded days">
                        <p class="h6">Wednesday <label class='float-right btn py-0 addSlotBtn' data-toggle="modal" data-target="#addSlot"><i class="fa fa-plus"></i> Add new slot</label></p>
                        <div class='mt-4'>
                        <?php 
                            for($i=0;$i<sizeof($slots);$i++){
                                $slotId = $slotIds[$i]; 
                                $assignedTo = $assignedTos[$i]; 
                                $slotDay =  explode(" ", $slots[$i])[0];
                                $slotTime =  explode(" ", $slots[$i])[1]." ".explode(" ", $slots[$i])[2] ;
                                if($slotDay=="Wednesday"){
                        ?>
                            <div style="display: inline; ">
                                <div class='slot-id' hidden><?php echo $slotId; ?></div>
                                <div class='assigned-to' hidden><?php echo $assignedTo; ?></div>
                                <div data-toggle="modal" data-target="#editSlot" class='slot-box mr-2 mb-2 btn py-1 px-3 border border-dark'>
                                    <?php echo $slotTime; ?>
                                    <div class='font-weight-bold mt-2' ><?php echo $assignedTo; ?></div>
                                </div>
                            </div>  
                        <?php
                                }
                            }
                        ?>
                        </div>
                    </div>
                    <div class="p-3 my-3 bg-light rounded days">
                        <p class="h6">Thursday <label class='float-right btn py-0 addSlotBtn' data-toggle="modal" data-target="#addSlot"><i class="fa fa-plus"></i> Add new slot</label></p>
                        <div class='mt-4'>
                        <?php 
                            for($i=0;$i<sizeof($slots);$i++){
                                $slotId = $slotIds[$i]; 
                                $assignedTo = $assignedTos[$i]; 
                                $slotDay =  explode(" ", $slots[$i])[0];
                                $slotTime =  explode(" ", $slots[$i])[1]." ".explode(" ", $slots[$i])[2] ;
                                if($slotDay=="Thursday"){
                        ?>
                            <div style="display: inline; ">
                                <div class='slot-id' hidden><?php echo $slotId; ?></div>
                                <div class='assigned-to' hidden><?php echo $assignedTo; ?></div>
                                <div data-toggle="modal" data-target="#editSlot" class='slot-box mr-2 mb-2 btn py-1 px-3 border border-dark'>
                                    <?php echo $slotTime; ?>
                                    <div class='font-weight-bold mt-2' ><?php echo $assignedTo; ?></div>
                                </div>
                            </div>  
                        <?php
                                }
                            }
                        ?>
                        </div>
                    </div>
                    <div class="p-3 my-3 bg-light rounded days">
                        <p class="h6">Friday <label class='float-right btn py-0 addSlotBtn' data-toggle="modal" data-target="#addSlot"><i class="fa fa-plus"></i> Add new slot</label></p>	
                        <div class='mt-4'>
                        <?php 
                            for($i=0;$i<sizeof($slots);$i++){
                                $slotId = $slotIds[$i]; 
                                $assignedTo = $assignedTos[$i]; 
                                $slotDay =  explode(" ", $slots[$i])[0];
                                $slotTime =  explode(" ", $slots[$i])[1]." ".explode(" ", $slots[$i])[2] ;
                                if($slotDay=="Friday"){
                        ?>
                            <div style="display: inline; ">
                                <div class='slot-id' hidden><?php echo $slotId; ?></div>
                                <div class='assigned-to' hidden><?php echo $assignedTo; ?></div>
                                <div data-toggle="modal" data-target="#editSlot" class='slot-box mr-2 mb-2 btn py-1 px-3 border border-dark'>
                                    <?php echo $slotTime; ?>
                                    <div class='font-weight-bold mt-2' ><?php echo $assignedTo; ?></div>
                                </div>
                            </div>  
                        <?php
                                }
                            }
                        ?>
                        </div>
                    </div>
                    <div class="p-3 my-3 bg-light rounded days">
                        <p class="h6">Saturday <label class='float-right btn py-0 addSlotBtn' data-toggle="modal" data-target="#addSlot"><i class="fa fa-plus"></i> Add new slot</label></p>	
                        <div class='mt-4'>
                        <?php 
                            for($i=0;$i<sizeof($slots);$i++){
                                $slotId = $slotIds[$i]; 
                                $assignedTo = $assignedTos[$i]; 
                                $slotDay =  explode(" ", $slots[$i])[0];
                                $slotTime =  explode(" ", $slots[$i])[1]." ".explode(" ", $slots[$i])[2] ;
                                if($slotDay=="Saturday"){
                        ?>
                            <div style="display: inline; ">
                                <div class='slot-id' hidden><?php echo $slotId; ?></div>
                                <div class='assigned-to' hidden><?php echo $assignedTo; ?></div>
                                <div data-toggle="modal" data-target="#editSlot" class='slot-box mr-2 mb-2 btn py-1 px-3 border border-dark'>
                                    <?php echo $slotTime; ?>
                                    <div class='font-weight-bold mt-2' ><?php echo $assignedTo; ?></div>
                                </div>
                            </div> 
                        <?php
                                }
                            }
                        ?>
                        </div>
                    </div>
                    <div class="p-3 my-3 bg-light rounded days">
                        <p class="h6">Sunday <label class='float-right btn py-0 addSlotBtn' data-toggle="modal" data-target="#addSlot"><i class="fa fa-plus"></i> Add new slot</label></p>	
                        <div class='mt-4'>
                        <?php 
                            for($i=0;$i<sizeof($slots);$i++){
                                $slotId = $slotIds[$i]; 
                                $assignedTo = $assignedTos[$i]; 
                                $slotDay =  explode(" ", $slots[$i])[0];
                                $slotTime =  explode(" ", $slots[$i])[1]." ".explode(" ", $slots[$i])[2] ;
                                if($slotDay=="Sunday"){
                        ?>
                            <div style="display: inline; ">
                                <div class='slot-id' hidden><?php echo $slotId; ?></div>
                                <div class='assigned-to' hidden><?php echo $assignedTo; ?></div>
                                <div data-toggle="modal" data-target="#editSlot" class='slot-box mr-2 mb-2 btn py-1 px-3 border border-dark'>
                                    <?php echo $slotTime; ?>
                                    <div class='font-weight-bold mt-2' ><?php echo $assignedTo; ?></div>
                                </div>
                            </div> 
                        <?php
                                }
                            }
                        ?>
                        </div>
                    </div>
                                        
                </div>
                <div class="tab-pane  fade bg-white col-md-12 p-0" id="pills-students" role="tabpanel" aria-labelledby="pills-all-students">
                    <table class="table table-striped mt-5 pt-5">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Class</th>
                            <th scope="col">Section</th>
                            <th></th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $id = $_GET['id'];
                            $branch = mysqli_query($conn,"SELECT * FROM branches WHERE id='$id' LIMIT 1");
                            $branchName = mysqli_fetch_array($branch)['name'] ;
                            $students = mysqli_query($conn,"SELECT * FROM Students WHERE branch='$branchName'");
                            $slno = 1;
                            while($row = mysqli_fetch_array($students)){
                            
                        ?>
                              <tr>
                                <td><?php echo $slno; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['gender']; ?></td>
                                <td><?php echo $row['class']; ?></td>
                                <td><?php echo $row['section']; ?></td>
                                <td><a href="edit_student.php?id=<?php echo $row['id']?>" class='btn btn-primary py-1 mr-2'>Edit</a></td>
                                <td><a onclick="return confirm('Are you sure?');" href="delete_student.php?id=<?php echo $row['id']?>" class='btn btn-danger py-1'>Delete</a></td>
                             </tr>
                       <?php 
                            $slno = $slno+1;
                        } ?>
                        </tbody>
                    </table>
                    
                </div>  
            </div>
        </div>
    </div>
</div>
<?php } ?>


<!-- Modal -->
<div id="addSlot" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
		  <p class="font-weight-bold">Add a new slot for the <?php echo $branchName; ?> branch on <span id="day"></span></p>
		  <form action="add_new_slot.php" id="newSlotForm" method="post">
            <input type="hidden" value="<?php echo $_GET['id'];?>" name='branchId'>
            <input type="hidden" id="slotName" name='slotName'>
            <div class="form-group">
                <label for="slotTime">Select slot time</label>
                <select class="form-control" id="slotTime">
                    <option>8:00 AM</option>
                    <option>8:30 AM</option>
                    <option>9:00 AM</option>
                    <option>9:30 AM</option>
                    <option>10:00 AM</option>
                    <option>10:30 AM</option>
                    <option>11:00 AM</option>
                    <option>11:30 AM</option>
                    <option>12:00 PM</option>
                    <option>12:30 PM</option>
                    <option>1:00 PM</option>
                    <option>1:30 PM</option>
                    <option>2:00 PM</option>
                    <option>2:30 PM</option>
                    <option>3:00 PM</option>
                    <option>3:30 PM</option>
                    <option>4:00 PM</option>
                    <option>4:30 PM</option>
                    <option>5:00 PM</option>
                    <option>5:30 PM</option>
                    <option>6:00 PM</option>
                    <option>6:30 PM</option>
                    <option>7:00 PM</option>
                    <option>7:30 PM</option>
                    <option>8:00 PM</option>
                    <option>8:30 PM</option>
                    <option>9:00 PM</option>

                </select>
			</div>
            <div class='row'>
                <div class='form-group pl-3'>
                    <p class="mb-1">Enter Class names separated by commas.</p>
                    <small>Eg: 6C,7B</small>
                </div>
                <div class='col-sm-6 mb-3'>
                    <input type="text" name="classes" id="classes" class='form-control'>
                </div>
            </div>
            
            <button class="btn btn-primary" id="formSubmit">Submit</button>
		  </form>
      </div>
    </div>

  </div>
</div>


<div id="editSlot" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
		  <p class="font-weight-bold">Edit slot for <?php echo $branchName; ?> branch on <span id="editDay"></span></p>
		  <form action="edit_slot.php" id="editSlotForm" method="post">
            <input type="hidden" value="<?php echo $_GET['id'];?>" name='branchId'>
            <input type="hidden" id="editSlotName" name='editSlotName'>
            <input type="hidden" id='slotId' name="slotId">
            <div class="form-group">
                <label for="editSlotTime">Select slot time</label>
                <select class="form-control" id="editSlotTime">
				<option>8:00 AM</option>
				<option>8:30 AM</option>
				<option>9:00 AM</option>
				<option>9:30 AM</option>
				<option>10:00 AM</option>
                <option>10:30 AM</option>
				<option>11:00 AM</option>
				<option>11:30 AM</option>
				<option>12:00 PM</option>
				<option>12:30 PM</option>
				<option>1:00 PM</option>
				<option>1:30 PM</option>
				<option>2:00 PM</option>
				<option>2:30 PM</option>
				<option>3:00 PM</option>
				<option>3:30 PM</option>
				<option>4:00 PM</option>
				<option>4:30 PM</option>
				<option>5:00 PM</option>
				<option>5:30 PM</option>
				<option>6:00 PM</option>
				<option>6:30 PM</option>
				<option>7:00 PM</option>
				<option>7:30 PM</option>
				<option>8:00 PM</option>
				<option>8:30 PM</option>
				<option>9:00 PM</option>

			    </select>
			</div>
            <div class='row'>
                <div class='form-group pl-3'>
                    <p class="mb-1">Enter Class names separated by commas.</p>
                    <small>Eg: 6C,7B</small>
                </div>
                <div class='col-sm-6 mb-3'>
                    <input type="text" name="classes" id="editClasses" class='form-control'>
                </div>
            </div>
            <button class="btn btn-primary" id="editFormSubmit">Submit</button>
            <a href="#" onclick="return confirm('Are you sure?');" class='btn btn-danger float-right delete-slot'><i class='fa fa-trash'></i> Delete</a>
		  </form>
      </div>
    </div>

  </div>
</div>

<script>
    $(".addSlotBtn").on("click", function(){
        let day = $(this).parent().text().split(" ")[0]
        $("#day").text(day);
    })
    $("#formSubmit").on("click", function(e){
        e.preventDefault();
        let slotTime = $('#slotTime').find(":selected").text();
        let day = $("#day").text();
        $("#slotName").val(day+" "+slotTime);
        let valid = true; 
        let classNames="";
        let classes_list = $("#classes").val().split(",");
        

        for(let i=0;i<classes_list.length;i++){
            let eachClass = classes_list[i].trim().toUpperCase();
            
            if(eachClass.length!=2){
                alert("Invalid class names. Please check the format and re enter")
                valid=false;
            }
            else if(isNaN(parseInt(eachClass[0]))){
                alert("Invalid class names. Please check the format and re enter")
                valid=false;
            }
            else if(parseInt(eachClass[0])<1 || parseInt(eachClass[0])>12){
                alert("Invalid class names. Please check the format and re enter")
                valid=false;
            }
            else if(eachClass[1].charCodeAt(0) <65 || eachClass[1].charCodeAt(0)>90){
                alert("Invalid class names. Please check the format and re enter")
                valid=false;
            }
            else{
                classNames = classNames+eachClass
            }
        }
        if(valid==true){
            classes_list = $("#classes").val().replace(/ /g, "");
            $("#classes").val(classes_list)
            $("#newSlotForm").submit();
        }
            
    })
    $(".slot-box").on("click", function(){
        let day = $(this).parents(".days").text().trim().split(" ")[0]
        $("#editDay").text(day);
        let time = $(this).text().trim().split(" ")
        $('#editSlotTime').val(time[0]+" "+time[1]);
        let id = $(this).parent().find(".slot-id").text()
        $("#slotId").val(id)
        $(".delete-slot").attr('href', 'delete_slot.php?id='+id+"&&branch_id="+<?php echo $_GET['id']; ?>)
        $("#editClasses").val($(this).parent().find(".assigned-to").text())
    })
    
    $("#editFormSubmit").on("click", function(e){
        e.preventDefault();
        let slotTime = $('#editSlotTime').find(":selected").text();
        let day = $("#editDay").text();     
        $("#editSlotName").val(day+" "+slotTime);
        let valid = true; 
        let classNames="";
        let classes_list = $("#editClasses").val().split(",");
        

        for(let i=0;i<classes_list.length;i++){
            let eachClass = classes_list[i].trim().toUpperCase();
            
            if(eachClass.length!=2){
                alert("Invalid class names. Please check the format and re enter")
                valid=false;
            }
            else if(isNaN(parseInt(eachClass[0]))){
                alert("Invalid class names. Please check the format and re enter")
                valid=false;
            }
            else if(parseInt(eachClass[0])<1 || parseInt(eachClass[0])>12){
                alert("Invalid class names. Please check the format and re enter")
                valid=false;
            }
            else if(eachClass[1].charCodeAt(0) <65 || eachClass[1].charCodeAt(0)>90){
                alert("Invalid class names. Please check the format and re enter")
                valid=false;
            }
            else{
                classNames = classNames+eachClass
            }
        }
        if(valid==true){
            classes_list = $("#editClasses").val().replace(/ /g, "");
            $("#editClasses").val(classes_list)
            $("#editSlotForm").submit();
        }
        
    })

</script>