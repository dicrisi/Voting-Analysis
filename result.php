<?php
include('adminheader.php');
include('style.php');
include('config.php');
error_reporting(0);
session_start();


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
	  
             <h2 align="center">View Result Details</h2>

	<table border="2" cellspacing="6" class="displaycontent"  width="1000" height="120" style="border:4px solid lightblue;" align="center">
	<tr>
			<th bgcolor=white><font color=black size=2> Candidate name</font></th> 
			<th bgcolor=white><font color=black size=2>Party Name</font></th> 
		   <th bgcolor=white><font color=black size=2>Count </font></th>
 
	</tr>
<br>
	<?php
 $query = "SELECT cname, pname, COUNT(*) AS count FROM vote GROUP BY cname, pname";
	$result = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_assoc($result))
		{
 ?>
	<tr>
		<td bgcolor=white><font color=black size=2><?php echo $row['cname']; ?></font></td>
	    <td bgcolor=white><font color=black size=2><?php echo $row['pname']; ?></font></td>
		 <td bgcolor=white><font color=black size=2><?php echo $row['count']; ?></font></td>

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
