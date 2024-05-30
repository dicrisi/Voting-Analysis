<?php 
	include_once("config.php");
	include_once("style.php");
	include_once("adminheader.php");



if(isset($_GET['select'])){
$query2 = "select * from candidate where cid='".$_GET['select']."'";
			//echo $query2;
			$result = mysql_query($query2);
			if(mysql_num_rows($result)){
			$row = mysql_fetch_assoc($result);
			}
}

?>	


<style>
h2 {
  color: white;
  font-family: verdana;
  font-size: 240%;

}
p  {
  color: white;
  font-family: Georgia, serif;
  font-size: 100%;
   font-weight: bold;
}
</style>

  <!-- Carousel Start -->
  
                       <div class="container">




<form action="" method="post" enctype="multipart/form-data" name="addroom">
<center>

 <style>
  body {
            background-image: url('vote.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
			
 }
        
</style>
<br>
<br>
<br>
<br>
<center><font color="white" size="8">Update Candidate Details </font></center>
</br>

 <b> Candidate Id</b><br />
 <input name="cid" type="text" value="<?php  echo $row['cid']; ?>" />
 <br />

<b>Candidate name</b><br />
 <input name="cname" type="text"  value="<?php  echo $row['cname']; ?>" />
 <br /> 
<b>Party Name</b><br />
 <input name="pname" type="text" value="<?php  echo $row['pname']; ?>" /> 
 <br />
<b>Party Symbol</b><br />
 <input name="psym" type="text" value="<?php  echo $row['psym']; ?>" />
 <br />


  <input type="submit" name="submit" value="Update" id="button1" />
  <br>

 </center>
 </form>

</div>


<?php
 
 
if(isset($_POST['submit'])){

	$query = "update candidate set cid='".$_POST['cid']."', cname='".$_POST['cname']."', pname='".$_POST['pname']."', psym='".$_POST['psym']."'  where cid= '".$_GET['select']."'";
	echo $query;
      
	   
	if(mysql_query($query)){
		echo 'UPDATE SUCCESSFULLY';

	}
	else{
		echo 'NOT UPDATE';
	}
	header("location:addcandidate.php");
	exit;
//}
 }

 
?>

<br>
<br>
<br>
<br>
<br>

<?php 
	include_once("footer.php");
	?>