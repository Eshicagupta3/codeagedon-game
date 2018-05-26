<?php
@session_start();
@require 'connect.php';
if($_SESSION['aauser'])
{

	?>
<form name="form2" action="adminlogout.php">
   <input type="submit" value="logout"></form>
	<?php
	$query_run=@mysqli_query($conn,"select * from users");
if(@mysqli_num_rows($query_run)>0)
 
{
   
    while($row=@mysqli_fetch_assoc($query_run))
    {
    
        $u=$row['username'];
        $sno=$row['sno'];
    	$z=$row['zealid'];
    	$e=$row['email'];
    	$d=$row['datetime'];
     
    
echo "<form method='post' name='delete2' action='delete2.php'>
 
    <input type='hidden' name='iname'   value='" .$sno ."'/>
 <button name='del1' id='mySubmit' style='float: right;'>delete</button>

    </form><form method='post' name='delete1' action='edit.php'>
 
    <input type='hidden' name='iname1'   value='" .$sno ."'/>
 <button name='del2' id='mySubmit' style='float: right;'>edit</button>

    </form>";
    	echo $sno." username: ".$u;
    	echo "<br> roll no: ";
    	echo $z." ";
    	echo "<br>";
    	echo "email: ";
    	echo $e;
    	echo "datetime: ";
    	echo $d;
echo "<br><hr>";
}
}

}
else{
    header('location: adminlogin.php');
}



?>