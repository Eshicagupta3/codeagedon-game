<?php
@session_start();
@require 'connect.php';
if(@$_SESSION['aauser']){
  $m=$_POST['iname'];
  $query_run3=@mysqli_query($conn,"DELETE FROM users WHERE sno='$m'");
if($query_run3){
	 echo "<script type='text/javascript'>
 alert('done');
            window.location.replace('user.php');
            </script>";

        }


        else{
        	{
	 echo "<script type='text/javascript'>
 alert('error');
            window.location.replace('user.php');
            </script>";

        }
        }}
        else{
         echo "<script type='text/javascript'>
 alert('error');
            window.location.replace('home.php');
            </script>";	
        }
        ?>