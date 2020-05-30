<?php 
include_once('header.php');
include_once('admin_check.php');
include_once('db.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once('db.php');
    
    $id=$_POST['id']; 
    $name=$_POST['productName'];
    $total=$_POST['total'];
    $good=$_POST['good'];
    $bad=$_POST['bad'];
    $average=$_POST['average'];
        
    
    $sql = "UPDATE inventory set product_name='$name', total='$total',
            average='$average', bad='$bad' WHERE id='$id'";
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    if (mysqli_query($conn, $sql)) {
        header("Location: branches.php");    
    }
}


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
            
            <?php
                $id = $_GET['id'];
                $result = mysqli_query($conn,"SELECT * FROM inventory WHERE id='$id'");
                while($row = mysqli_fetch_array($result)){
            ?>
                    
            
            <h4>Add a new product</h4>
            <form action="edit_product.php" method='post' class='form-group'>
                <input type="hidden" name='id' value="<?php echo $row['id'];?>">

                <label for="productName" class="font-label mt-3">Product Name</label>
                <input type="text" name='productName' class='form-control' value="<?php echo $row['product_name']?>" required>
                
                <label for="total" class="font-label mt-3">Quantity</label>
                <input type="number" name='total' id='total' class='form-control mb-2' value="<?php echo $row['total']?>" required>

                <h6>Please specify the condition/status of the product</h6>
                <div class='row'>
                    
                    <div class='col-sm-4'>
                        <label for="good" class="font-label text-success mt-3">Good</label>
                        <input type="number" name='good' id='good' class='form-control' value="<?php echo $row['good']?>">    
                    </div>
                    <div class='col-sm-4'>
                        <label for="average" class="font-label text-primary mt-3">Average</label>
                        <input type="number" name='average' id='average' class='form-control' value="<?php echo $row['average']?>">    
                    </div>
                    <div class='col-sm-4'>
                        <label for="bad" class="font-label text-danger mt-3">Bad</label>
                        <input type="number" name='bad' id='bad' class='form-control' value="<?php echo $row['bad']?>">    
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
            <?php } ?>
        </div>
    </div>