<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
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

.btn {
  border: none;
  background-color: inherit;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
  display: inline-block;
  margin: 56px 60px;
}

.success {color: white;
    background-color: green;}

</style>
</head>
<body>
<?php //print_r($data);exit;?>
<div class="navbar">
  <a href="dashboard">Home</a>
   <a href="user_list">Users</a>
   <a href="category_list">Category</a>
   <a href="product_list">Products</a>
   <a href="logout">Logout</a>
 
</div>

<a href="display_category"><button class="btn success">Add Category</button></a>

<div style="padding:63px 61px">
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Slug </th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=0;$i<count($data);$i++){
                ?>
            <tr>
                <td><?php echo e($data[$i]['id']); ?></td>
                <td><?php echo e($data[$i]['title']); ?></td>
                <td><?php echo e($data[$i]['slug']); ?></td>
                <?php if($data[$i]['status']==1){ $status='Active';}else{$status='Inactive';}?>
                <td><?php echo e($status); ?></td>
                
                <td>
                   
                    <a href="view_category/<?php echo e($data[$i]['id']); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a> &nbsp;
                    <button id="delete" name="delete" onclick="myFunction(<?php echo e($data[$i]['id']); ?>)"><i class="fa fa-trash" aria-hidden="true"></i></button>
</td>
            </tr>
            <?php }?>
</tbody>
</table>
  
</div>


</body>
</html>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>

<script>
function myFunction(id) {

            $.ajax({
           
         type:"GET",
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
         cache: false,
         contentType: 'application/x-www-form-urlencoded',
         url:'deleteCategory',
         data: {  
         id: id,  
         }, 
       
         success:function(res){
         if(res == true)
         {
           alert("User deleted successfully !")
           location.reload();
         }else{

          alert("Somthing went wrong !!")
          location.reload();
         }
       
           }
       });
}
</script>

<?php /**PATH C:\xampp\htdocs\product_master\resources\views/category_list.blade.php ENDPATH**/ ?>