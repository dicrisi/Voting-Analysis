<?php
include('adminheader.php');
include('style.php');
include('config.php');

?>

<?php

if(isset($_POST['submit']))
	 {
	 	         		
	$query = "INSERT INTO `candidate` VALUES (null,'".$_POST['cname']."','".$_POST['pname']."', '".$_POST['psym']."')";

	if(mysql_query($query)){
		echo ' SUCCESSFULLY';
	  echo '<script> alert("REGISTERED SUCCESSFULLY");</script>';
	}
	else{
		echo 'NOT REGISTERD';
	}
	header("location:addcandidate.php");
//	exit;
 
 }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Candidate details</title>

   
   <style>
        body {
            background-image: url('vote.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
			color:white;
        }

        h2 {
            text-align: center;
        }

        form {
            text-align: center;
            margin-top: 50px;
        }

        table {
            margin: 0 auto;
        }

        label, input {
            display: inline-block;
            margin-bottom: 10px;
        }

        label {
            width: 120px; 
            text-align: right;
            margin-right: 10px;
        }
    </style>
</head>

<body>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>

    <h2>Add Candidate details</h2>

    <form method="post" action="">
        <table>
		<tr>
                <td><b>Candidate Id</b></td>
                <td><input type="text" name="cid" required></td>
            </tr>
            <tr>
                <td><b>Candidate name</b></td>
                <td><input type="text" name="cname" required></td>
            </tr>
			 <tr>
                <td><b>Party Name</b></td>
                <td><input type="text" name="pname" required></td>
            </tr>
           <tr><td>Party Symbol</td>
<td><input type="file" name="psym" required></td></tr>
            
           
        </table>

    <input type="submit" name="submit" value="submit">

        <br>
        <a href="adminhome.php" style="color: black;">Back</a>
    </form>



	<form  method="post"> 
 
      <div >
	  


             <h2 align="center">View Candidate</h2>

	<table border="2" cellspacing="6" class="displaycontent"  width="1000" height="120" style="border:4px solid lightblue;" align="center">
	<tr>
	    
			<th bgcolor=white><font color=black size=2>Candidate Id</font></th>
		
			<th bgcolor=white><font color=black size=2> Candidate name</font></th> 
			<th bgcolor=white><font color=black size=2>Party Name</font></th> 
			
		   <th bgcolor=white><font color=black size=2>Party Symbol</font></th>
		    <th bgcolor=white><font color=black size=2>Update</font></th>
			 <th bgcolor=white><font color=black size=2>Delete</font></th>
	
			

		


			  
	</tr>


<br>
	<?php
	
	$query = "select * from candidate";
	$result = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_assoc($result))
		{
 ?>
	<tr>

		<td bgcolor=white><font color=black size=2><?php echo $row['cid']; ?></font></td>
	
		<td bgcolor=white><font color=black size=2><?php echo $row['cname']; ?></font></td>
	    <td bgcolor=white><font color=black size=2><?php echo $row['pname']; ?></font></td>
		<td  bgcolor=white><font color=black size=2><img src=<?php echo $row['psym'];?> width=90 height=70></td>

	  
		<td bgcolor=white><font color=black size=2><a href="update.php?select=<?php echo $row['cid'];?>">Update</a></font></td>
		<td bgcolor=white><font color=black size=2><a href="?delete=<?php echo $row['cid'];?>">Delete</a></font></td>

            
		
		
		
	</tr>
	<?php }  ?>
	
	</table>
</div>

</form> 


<?php 

if(isset($_GET['delete']))
	{
	
	$query = "delete from candidate where cid='".$_GET['delete']."'";
	mysql_query($query);
		echo '<script>alert("Deleted");</script>';
	
		
header("location:addcandidate.php");
	exit;
	}
?>

    <?php
   include('footer.php');
    ?>

</body>

</html>
