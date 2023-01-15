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
  <form action="{{ url('/update_user') }}" method="post">
    @csrf

    <label for="fname">User ID</label>
    <input type="text" id="id" name="id" 
    value="<?php if(isset($data[0]['id'])){ echo $data[0]['id']; }else {echo '';} ?>" readonly>

    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Enter name" 
    value="<?php if(isset($data[0]['first_name'])){ echo $data[0]['first_name']; }else {echo '';} ?>">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Enter last name"
     value="<?php if(isset($data[0]['last_name'])){ echo $data[0]['last_name']; }else {echo '';} ?>">

    <label for="lname">Email ID</label>
    <input type="email" id="email" name="email" placeholder="Enter email ID"
    value="<?php if(isset($data[0]['email'])){ echo $data[0]['email']; }else {echo '';} ?>">
    
    <label for="lname">Phone Number</label>
    <input type="text" id="phone" name="phone" placeholder="Enter mobile number"
    value="<?php if(isset($data[0]['mobile'])){ echo $data[0]['mobile']; }else {echo '';} ?>">

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
