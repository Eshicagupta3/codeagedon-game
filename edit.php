<?php
@session_start();
@require 'connect.php';
if(@$_SESSION['aauser']){
  $m=$_POST['iname1'];
 
   $query1 = "select * FROM users WHERE sno='$m'";
          $results1 = @mysqli_query($conn,$query1);
          $row1 = @mysqli_fetch_array($results1);
          

?>

 <form action="" class="form1 form-bordered" method="post" name="form1">
     <input type="text" id="" name="cid"  value="<?php echo $row1['sno'];?>" required>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" id="sctcname" name="d" class="form-control" placeholder="dateNAME" value="<?php echo $row1['datetime'];?>" required>
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            </div>
                                        </div>
                                        <input type="submit" name="save">
                                    </form>

<?php

if(isset($_POST['save']))
{
$d=$_POST['d'];
$s=$_POST['cid'];

@mysqli_query($conn,"update users set datetime='$d' where sno='$s'");
?>
<script type="text/javascript">window.location.replace('user.php')</script>
<?php

}
}
else{
    header('location: home.php');
}

        ?>