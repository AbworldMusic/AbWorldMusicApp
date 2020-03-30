<?php 
include_once('header.php');

?>
<title>AB World</title>
<div class="h-100 w-100 pt-5 bg-light">
  <div class="d-flex mt-5 flex-row justify-content-center ">
    <div class="p-3 border border-dark col-sm-12 col-md-4 mx-4">
      <form action="post" class="form-group">
        <label for="username" class="font-weight-bold">Username</label>
        <input id="username" type="text" class="form-control"/>
        <label for="password" class="font-weight-bold mt-4">Password</label>
        <input id="password" type="password" class="form-control"/>
        <p class="text-danger pt-1"></p>
        <button class="btn btn-block btn-info mt-4 py-1">Login</button>
      </form>
    </div>
  </div>
</div>
