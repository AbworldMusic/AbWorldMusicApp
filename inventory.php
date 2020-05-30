<?php 
include_once('header.php');
include_once('admin_check.php');
include_once('db.php');
?>
<title>Ab World | Team</title>
<div class="d-flex h-100 w-100">
    <div class='p-2 bg-light nav-bar'>
        <div class="flex-column h-100 w-100 py-2">
            <a href="admin_home.php" class='nav-item  pb-1 mb-3'>Home</a>
            <a href="students.php" class='nav-item pb-1 mb-3'>Students</a>
            <a href="users.php" class='nav-item pb-1 mb-3'>Users</a>
            <a href="faculty.php" class='nav-item pb-1 mb-3'>Faculty</a>
            <a href="branches.php" class='nav-item pb-1 mb-3'>Branches</a>
            <a href="lessons.php" class='nav-item pb-1 mb-3'>Lessons</a>
            <a href="inventory.php" class='nav-item active pb-1 mb-3'>inventory</a>
        </div>
    </div>
    <div class='p-3 row w-100'>
        <div class='col-md-6  p-3'>
            <h4>Add a new product</h4>
            <form action="add_new_product.php" method='post' class='form-group'>
                <label for="productName" class="font-label mt-3">Product Name</label>
                <input type="text" name='productName' class='form-control' required>
                
                <label for="branchId" class="font-label mt-3">For branch</label>
                <select name="branchId" id="branchId" class='form-control' >
                <?php
                    $result = mysqli_query($conn,"SELECT * FROM branches");
                    while($row = mysqli_fetch_array($result)){
                ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php } ?>
                </select>

                <label for="total" class="font-label mt-3">Quantity</label>
                <input type="number" name='total' id='total' class='form-control mb-2' required>

                <h6>Please specify the condition/status of the product</h6>
                <div class='row'>
                    
                    <div class='col-sm-4'>
                        <label for="good" class="font-label text-success mt-3">Good</label>
                        <input type="number" name='good' id='good' class='form-control'>    
                    </div>
                    <div class='col-sm-4'>
                        <label for="average" class="font-label text-primary mt-3">Average</label>
                        <input type="number" name='average' id='average' class='form-control'>    
                    </div>
                    <div class='col-sm-4'>
                        <label for="bad" class="font-label text-danger mt-3">Bad</label>
                        <input type="number" name='bad' id='bad' class='form-control'>    
                    </div>
                </div>
                <button class='btn btn-success mt-4' onclick='return checkTotal();'>Add product</button>
                <script>
                    function checkTotal(){
                        var total = parseInt($("#total").val());

                        
                        var good = parseInt($("#good").val());
                        var average = parseInt($("#average").val());
                        var bad = parseInt($("#bad").val());

                        if(total!=(good+bad+average)){
                            alert("Please make sure Good, Bad and Average add up to the total mentioned quantity")
                            return false;
                        }
                        else{
                            return true;
                        }
                    }

                </script>    
                
            </form>
        </div>
    </div>