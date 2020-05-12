
<?php
include_once 'db.php';?>
<html>
<head>
<title>PHP File Upload example</title>
</head>
<body>

<form action="login.php" enctype="multipart/form-data" method="post">
Select image :
<input type="file" name="file"><br/>
<input type="submit" value="save it as a profile picture" name="Submit1"> <br/>


</form>


</body>
</html>
<?php

if(isset($_POST['Submit1']))
{ 
$filepath = "images/" . $_FILES["file"]["name"];

if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) 
{
echo "<img src=".$filepath." height=200 width=300 />";
} 
else 
{
echo "Error !!";
}
} 
?>