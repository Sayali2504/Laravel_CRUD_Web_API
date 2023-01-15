<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

.navbar {
  overflow: hidden;
  background-color: #333; 
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.subnav {
  float: left;
  overflow: hidden;
}

.subnav .subnavbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .subnav:hover .subnavbtn {
  background-color: red;
}

.subnav-content {
  display: none;
  position: absolute;
  left: 0;
  background-color: red;
  width: 100%;
  z-index: 1;
}

.subnav-content a {
  float: left;
  color: white;
  text-decoration: none;
}

.subnav-content a:hover {
  background-color: #eee;
  color: black;
}

.subnav:hover .subnav-content {
  display: block;
}

input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=email], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  /* background-color: #f2f2f2; */
  padding: 20px;
}
</style>
</head>
<body>

<div class="navbar">
  <a href="dashboard">Home</a>
   <a href="user_list">Users</a>
   <a href="category_list">Category</a>
   <a href="product_list">Products</a>
   <a href="logout">Logout</a>
</div>

<div style="padding:40px 180px">
 
<div>
  <form action="{{ url('/update_category') }}" method="post">
    @csrf

    <label for="fname">Category ID</label>
    <input type="text" id="id" name="id" 
    value="<?php if(isset($data[0]['id'])){ echo $data[0]['id']; }else {echo '';} ?>" readonly>

    <label for="title">Title</label>
    <input type="text" id="title" name="title" placeholder="Enter title" 
    value="<?php if(isset($data[0]['title'])){ echo $data[0]['title']; }else {echo '';} ?>">

    <label for="slug">Slug</label>
    <input type="text" id="slug" name="slug" placeholder="Enter slug"
     value="<?php if(isset($data[0]['slug'])){ echo $data[0]['slug']; }else {echo '';} ?>" readonly>

     <br><br>
    <label for="Status">Status</label><br><br>
    <?php if($data[0]['status']==1){?>
    <input type="radio" id="html" name="status" value="1" checked>
    <label for="html">Active</label>
    <input type="radio" id="css" name="status" value="0">
    <label for="css">Inactive</label><br>
  <?php } else {?>
    <input type="radio" id="html" name="status" value="1" >
    <label for="html">Active</label>
    <input type="radio" id="css" name="status" value="0" checked>
    <label for="css">Inactive</label><br>
  <?php }?>

    <!-- <label for="country">Country</label>
    <select id="country" name="country">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select> -->
  
    <input type="submit" value="Update">
  </form>
</div>

  
</div>

</body>
</html>
