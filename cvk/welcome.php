<!DOCTYPE html>
<html>
<head>
<style>
  table, th, td {
  border: 1px solid black;
  background-color: #FFFAFA ;
  border-collapse: collapse;
}
th, td {
  padding: 10px;
}
th{
  background-color: gray;
  color :white;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 9px;
  overflow: hidden;
  background-color: gray;
}

li {
  float:right;
  border-right:1px solid #bbb;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 15px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}
.footer {
   position: fixed;
   padding: 15px;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: gray;
   color: white;
   text-align: center;
}
</style>
</head>
<body>

<ul>
  <li style="float: left;color:white;margin: 10px;border-right: none;"> <h2>Xcompany</h2></li>

  <li><a href="table.php">logout</a></li>
    <li><a href="profile.php"><?php 
    session_start();
    echo $_SESSION["login_user"]?></a></li>
</ul>
<br>
<br>
<div style="margin-left: 20px;font-size: 20px; height: 500px;width: 400px; border-right: 1px solid black;float: left;">
<a  href="welcome.php">Dashboard</a>
<br><br>
<a href='profile.php' >View Profile</a>
<br><br>
<a href="edit.php">Edit Profile</a>
<br><br>
<a href="profilepic.php">Change Profile Image</a>
<br><br>
<a href="pass.php">Change Password</a>
<br><br>
<a href="add.php">Add Product</a>
<br><br>
<a href="table.php">Log out</a>
<br><br>
</div>



<div style=" padding:1px 16px;margin-left: 30px; height:500px;width: 600px; float: left;">

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select * from products";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

?>
<table style="width:100%">
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Description</th>
    <th>Quantity</th>
    <th>Action</th>
  </tr>
  <?php 
    while($row = $result->fetch_assoc()) {
   ?>
  <tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['description']; ?></td>
    <td><?php echo $row['quantity']; ?></td>
    <td>
      <a href='submit.php?id=<?php echo $row['id']; ?>' style="color: green;padding-right: 40px;">Update</a>
      <a href='delete.php?id=<?php echo $row['id']; ?>' style="color: red;padding-right: 40px;">Delete</a>
    </td>
  </tr>
  <?php } ?>
</table>
<?php } 
else{
  echo "no data found";
}
?>
<?php 
  $conn->close();
 ?>
  
</div>
<div class="footer">
<p> Copyright @ 2017</p>
</div>

</body>
</html>
