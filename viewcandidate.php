<?php

include('style.php');
include('config.php');
error_reporting(0);
session_start();

if (isset($_POST['search'])) {
    $search_name = $_POST['search_name'];

    // Modify the query to include a WHERE clause for name search
    $query = "SELECT * FROM user WHERE name LIKE '%$search_name%' or address LIKE '%$search_name%'";
} else {
    // Default query to retrieve all users
    $query = "SELECT * FROM user";
}

$result = mysql_query($query) or die(mysql_error());
?>

<style>
    table.tab tr td,
    table.tab tr th {
        padding: 5px;
        border: 1px solid #000;
    }
</style>
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
<br><br>
<br>
<br>
<br>
<form  method="post"> 
 
      <div >
	  


             <h2 align="center">View Candidate Details</h2> 
			 <h2 align="center">Welcome <?php echo $_SESSION['email'] ?></h2>

	<table border="2" cellspacing="6" class="displaycontent"  width="1000" height="120" style="border:4px solid lightblue;" align="center">
	<tr>
	    
			<th bgcolor=white><font color=black size=2>Candidate Id</font></th>
		
			<th bgcolor=white><font color=black size=2> Candidate name</font></th> 
			<th bgcolor=white><font color=black size=2>Party Name</font></th> 
			
		   <th bgcolor=white><font color=black size=2>Party Symbol</font></th>
		 
	<th bgcolor=white><font color=black size=2>Vote</font></th>
			

		


			  
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
		<td  bgcolor=white><font color=black size=2><img src=<?php echo $row['psym'];?> width=190 height=90></td>
	<td bgcolor=white><font color=black size=2><a href="vote.php?select=<?php echo $row['cid'];?>">Vote</a></font></td>

	  
		

            
		
		
		
	</tr>
	<?php }  ?>
	
	</table>
</div>

</form> 

<br>
<br>
<br>
<br>
<br>

<?php
include('footer.php');
?>
