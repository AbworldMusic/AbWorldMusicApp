

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
                        $result = mysqli_query($conn,"SELECT * FROM slots WHERE branch_id='$branchId'");
                        $slots = array();
                        while($row = mysqli_fetch_array($result)){
                            array_push($slots, $row['slot_name']);
                        }
                    ?>
                    <div class="p-3 my-3 mt-4 bg-light rounded">
                        <p class="h6">Monday <label class='float-right btn py-0 addSlotBtn' data-toggle="modal" data-target="#addSlot"><i class="fa fa-plus"></i> Add new slot</label></p>
                        <div class='mt-4'>
                        <?php 
                            for($i=0;$i<sizeof($slots);$i++){
                                $slotDay =  explode(" ", $slots[$i])[0];
                                $slotTime =  explode(" ", $slots[$i])[1].explode(" ", $slots[$i])[2] ;
                                if($slotDay=="Monday"){
                        ?>
                            <div class='slot-box mr-2 mb-2 py-1 px-3 border border-dark'><?php echo $slotTime; ?></div>
                        <?php
                                }
                            }
                        ?>
                        </div>

                    </div>
                    <div class="p-3 my-3 bg-light rounded">
                        <p class="h6">Tuesday <label class='float-right btn py-0 addSlotBtn' data-toggle="modal" data-target="#addSlot"><i class="fa fa-plus"></i> Add new slot</label></p>
                        <div class='mt-4'>
                        <?php 
                            for($i=0;$i<sizeof($slots);$i++){
                                $slotDay =  explode(" ", $slots[$i])[0];
                                $slotTime =  explode(" ", $slots[$i])[1].explode(" ", $slots[$i])[2] ;
                                if($slotDay=="Tuesday"){
                        ?>
                            <div class='slot-box mr-2 mb-2 py-1 px-3 border border-dark'><?php echo $slotTime; ?></div>
                        <?php
                                }
                            }
                        ?>
                        </div>
                    </div>
                    <div class="p-3 my-3 bg-light rounded">
                        <p class="h6">Wednesday <label class='float-right btn py-0 addSlotBtn' data-toggle="modal" data-target="#addSlot"><i class="fa fa-plus"></i> Add new slot</label></p>
                        <div class='mt-4'>
                        <?php 
                            for($i=0;$i<sizeof($slots);$i++){
                                $slotDay =  explode(" ", $slots[$i])[0];
                                $slotTime =  explode(" ", $slots[$i])[1].explode(" ", $slots[$i])[2] ;
                                if($slotDay=="Wednesday"){
                        ?>
                            <div class='slot-box mr-2 mb-2 py-1 px-3 border border-dark'><?php echo $slotTime; ?></div>
                        <?php
                                }
                            }
                        ?>
                        </div>
                    </div>
                    <div class="p-3 my-3 bg-light rounded">
                        <p class="h6">Thursday <label class='float-right btn py-0 addSlotBtn' data-toggle="modal" data-target="#addSlot"><i class="fa fa-plus"></i> Add new slot</label></p>
                        <div class='mt-4'>
                        <?php 
                            for($i=0;$i<sizeof($slots);$i++){
                                $slotDay =  explode(" ", $slots[$i])[0];
                                $slotTime =  explode(" ", $slots[$i])[1].explode(" ", $slots[$i])[2] ;
                                if($slotDay=="Thursday"){
                        ?>
                            <div class='slot-box mr-2 mb-2 py-1 px-3 border border-dark'><?php echo $slotTime; ?></div>
                        <?php
                                }
                            }
                        ?>
                        </div>
                    </div>
                    <div class="p-3 my-3 bg-light rounded">
                        <p class="h6">Friday <label class='float-right btn py-0 addSlotBtn' data-toggle="modal" data-target="#addSlot"><i class="fa fa-plus"></i> Add new slot</label></p>	
                        <div class='mt-4'>
                        <?php 
                            for($i=0;$i<sizeof($slots);$i++){
                                $slotDay =  explode(" ", $slots[$i])[0];
                                $slotTime =  explode(" ", $slots[$i])[1].explode(" ", $slots[$i])[2] ;
                                if($slotDay=="Friday"){
                        ?>
                            <div class='slot-box mr-2 mb-2 py-1 px-3 border border-dark'><?php echo $slotTime; ?></div>
                        <?php
                                }
                            }
                        ?>
                        </div>
                    </div>
                    <div class="p-3 my-3 bg-light rounded">
                        <p class="h6">Saturday <label class='float-right btn py-0 addSlotBtn' data-toggle="modal" data-target="#addSlot"><i class="fa fa-plus"></i> Add new slot</label></p>	
                        <div class='mt-4'>
                        <?php 
                            for($i=0;$i<sizeof($slots);$i++){
                                $slotDay =  explode(" ", $slots[$i])[0];
                                $slotTime =  explode(" ", $slots[$i])[1].explode(" ", $slots[$i])[2] ;
                                if($slotDay=="Saturday"){
                        ?>
                            <div class='slot-box mr-2 mb-2 py-1 px-3 border border-dark'><?php echo $slotTime; ?></div>
                        <?php
                                }
                            }
                        ?>
                        </div>
                    </div>
                    <div class="p-3 my-3 bg-light rounded">
                        <p class="h6">Sunday <label class='float-right btn py-0 addSlotBtn' data-toggle="modal" data-target="#addSlot"><i class="fa fa-plus"></i> Add new slot</label></p>	
                        <div class='mt-4'>
                        <?php 
                            for($i=0;$i<sizeof($slots);$i++){
                                $slotDay =  explode(" ", $slots[$i])[0];
                                $slotTime =  explode(" ", $slots[$i])[1].explode(" ", $slots[$i])[2] ;
                                if($slotDay=="Sunday"){
                        ?>
                            <div class='slot-box mr-2 mb-2 py-1 px-3 border border-dark'><?php echo $slotTime; ?></div>
                        <?php
                                }
                            }
                        ?>
                        </div>
                    </div>
                                        
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
            <button class="btn btn-primary" id="formSubmit">Submit</button>
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
        $("#newSlotForm").submit();
    })
</script>