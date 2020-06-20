<?php 
    include_once("base.php");    
    session_start();
    $flash = "";
    if(isset($_SESSION['flash'])){
      $flash = $_SESSION['flash'];
    }
?>

<div class='header d-flex justify-content-center bg-light'>
    <div class="my-4 mx-2 text-center">
        <h1>World of Music</h1>
        <h5>Login</h5>
    </div>
</div>
<div class=" w-100 pt-5">
  <div class="d-flex mt-5 flex-row justify-content-center ">
    <div class="p-3 bg-light rounded col-sm-12 col-md-4 mx-4">
      <form action="login_post.php" method="post" class="form-group">
        <label for="username" class="font-weight-bold">Username</label>
        <input id="username" name="username" type="text" class="form-control"/>
        <label for="password" class="font-weight-bold mt-4">Password</label>
        <input id="password" name="password" type="password" class="form-control"/>
        <p class="text-danger pt-1"><?php echo $flash ?></p>
        <button class="btn btn-block btn-primary mt-4 py-1">Login</button>
      </form>
    </div>
  </div>
</div>