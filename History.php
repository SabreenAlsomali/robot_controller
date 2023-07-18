<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Robot Controller</title>
</head>
<body>
    <style>
        .button {
  background-color: #008CBA; /* Blue */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin:10px;
  border-radius: 25px;
  border:2px #008CBA solid
}

.center {
  margin: auto;
  width: 50%;
  border: 3px solid green;
  padding: 10px;
  margin-top:20vh;
}
 

    </style>
    <div style="">
        <center>
            <a href="History.php" class="button" >History</a>
            <a href="index.php"  class="button">Movment</a>
        </center>
    </div>
<div style="width:100%" class="center">
<br>
<center>
 <table border="1" width="100%">

 <thead> <tr>
   
        <th>Id</th>
        <th>Move</th>
        <th>Date</th>
 
</tr>
   </thead>
   <tbody>
    <?php     $servername = "localhost";
    $username = "root";  // default XAMPP username, change if different
    $password = "";      // default XAMPP password, change if different
    $dbname = "Robot_database";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
$sql = "SELECT * FROM movments";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {?>
 
    <tr>
   
        <th><?php echo $row["id"] ?></th>
        <th><?php echo $row["move"] ?></th>
        <th><?php echo $row["date_move"] ?></th>

 
</tr>
 <?php }
} else {
  echo "0 results";
}
$conn->close();
    ?>
    
   </tbody>
 </table>
</center>
<br><br>
</div>
 
</body>
</html>