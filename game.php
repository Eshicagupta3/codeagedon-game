<?php
@session_start();
require 'connect.php';
if($_SESSION['luser'])
{}
else{
    header('location: login.php');
}


$date=gmdate("l jS \of F Y h:i:s A") . "<br>";
$name=$_SESSION['luser'];
$query="SELECT * FROM users WHERE email='$name'";
$query_run=@mysqli_query($conn,$query);
if(@mysqli_num_rows($query_run)>0)
{
     $row=@mysqli_fetch_assoc($query_run);
$sno=$row['number'];
   }
   $_SESSION['sno']=$sno;
$c=@$_SESSION['sno'];
$url=$_SERVER['REQUEST_URI'];
$d = substr($url, strrpos($url, '?') + 1);
?>
<?php $d= str_replace(' ', '', $d);

?>

<!DOCTYPE html>
<html class="main2">
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
    <title>dashboard</title>
    <style type="text/css">
        
.main2 {
  background-color: #b22222;
  background-image: url("assets/images/dark-brick-wall.png"),url("assets/images/te.png");
  margin: 0;
  padding: 0;
  height: 100%;
  width: 100%;
  overflow: hidden;
  background-repeat: repeat,repeat-x;
}
.main {
  font-size: 20px;
  color: #E8E8E8;
  font-family: "Walter Turncoat", cursive;
  display: block;
  width: 50%;
  height: 65%;
  min-height: auto;
  margin: 60px auto 0px auto;
  background-color: #383938;
  padding: 30px 60px;
  overflow-y: auto;
  box-shadow: -1px 2px 2px 0px #555, inset 0 0 10px 0 #555;
  -webkit-border-radius: 10px;
  -khtml-border-radius: 10px;
  -moz-border-radius: 10px;
  -ms-border-radius: 10px;
  -o-border-radius: 10px;
  border-radius: 10px;
  border: #B78240 solid 10px;
  position: relative;
  overflow:hidden;
}
.btn1{
  bottom: 0;
  position: fixed;
  right: 40%;
  z-index: 15;
}
.footer {
    position: fixed;
   
    bottom: 0;
    width: 100%;
    color: white;
}
.log{
  position: fixed;
  left: 0;
  top: 0;
  width: 20%;
  color: white;
}
.log1{
  position: fixed;
  right: 0;
  top: 0;
  
  color: white;
}
.fa{
  width: 10%;
  margin: 3px;
  font-size: 2em;
  font-color: white; 
}
.log2

{
  bottom: 0;
  left: 0;
  position: fixed;
}
 @media only screen and (max-width: 763px) {
.main{
   width: 80%;
   height: 75%;
}
.log1{
 
  font-size: 13px;
}
.log2{
  font-size: 11px;
}

    }
</style>


</head>
<body class="main"  style="overflow-y: scroll;
 
  overflow-x: hidden;">
       
       



           <?php
 $query_run6=@mysqli_query($conn,"SELECT MAX(number) AS max FROM question");
   $row6=@mysqli_fetch_assoc($query_run6);
   $max= $row6['max'];
$query_run1=@mysqli_query($conn,"select * from question where number=$c");
if(@mysqli_num_rows($query_run1)>0)
{
    $row1=@mysqli_fetch_assoc($query_run1);

$a1=$row1['ans'];
?>

<?php
if (password_verify($d, $a1))
{
    $c=$c+1;
    $_SESSION['sno']=$c;
    $s=$_SESSION['sno'];
$name=$_SESSION['luser'];
@mysqli_query($conn,"update users set number='$s',datetime='$date' where email='$name'");
    header("location:game.php?");
}
}
else{
  echo "Congrats You Completed All Levels!!";
}
?> 
<?php
$query_run=@mysqli_query($conn,"select * from question where number=$c");
if(@mysqli_num_rows($query_run)>0)
{
    $row=@mysqli_fetch_assoc($query_run);
    ?>
    
        <?php
      $q=$row['ques'];
      $a=$row['ans'];
        $n=$row['number'];
      echo "<font size='6%'><u>Level ".$n."</u></font><br><br>";
      echo $q;
      echo"<br>";
echo "<br><br>";

}
  ?>
</p>

<img src="assets/images/bulbe.png" align="right" style="width: 50%;height: 60%;">


</body>
</html>
<span class="log">&nbsp;&nbsp;<?php  echo 'Hey '.$_SESSION['lusername']."  "; ?></span>
<p style="float: right;" class="log1">Hints Available on MMIL Facebook page</p>
<p style="float: left;" class="log2" style="">Ends On 16 March ,00:00 AM</p>
 <button type="button" class="btn btn-sm btn1" data-toggle="modal" data-target="#myModal"  data-placement="top" title="Rules" style="background-color: transparent;"><img src="assets/images/document.png"></button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" &times;></button>
          <h3 class="modal-title" align="center"  style="color: black;">Rules</h3>

        </div>
        <div class="modal-body">
          <ul  style="color: black;">
            <li><p>Participants are requested not to use an alias while registering for this event.</p></li>
            <li><p>Answers are in word and numbers only .</p></li>
            <li><p>Word answers should be entered in lower case without including white spaces .</p></li>
            <li><p>If you think your answer contains more than one word, then combine them to make a single word without giving whitespace .</p></li>
            <li><p>Numeric answers are accepted. If you think the answer is a date then simply write it in the format given below:
              <br>Example- 10 march 2018 can be written as 10032018 .</p></li>
            <li><p>Don't use any special characters(*,+,/,- etc) while answering .</p></li>
            <li><p>Answers are to be appended in the URL only after '?' .</p></li>
          </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<footer class="footer">
    <div class="text-center">
    
       
      <a href="leaderboard.php" style="color: white;"><span class="fa fa-trophy" data-toggle="tooltip" data-placement="top" title="Leaderboard"></span></a>&nbsp;
      <a href="logout.php" style="color: white;"><span class="fa fa-sign-out" data-toggle="tooltip" data-placement="top" title="Logout"></span></a>
      <a href="facebook.com/jssmmil/" style="color: white;" target="_blank"><span class="fa fa-comments" data-toggle="tooltip" data-placement="top" title="Forum"></span></a>

    </div>

</footer>

