<?php
include('adminheader.php');
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

<form method="post">
    <div>
      
        <br>
        <br>
        <h2 align="center">View User Details</h2>

	

     
        <table border="2" cellspacing="6" class="displaycontent" width="1000" height="120" style="border:4px solid lightblue;" align="center">
            <tr>
                <th bgcolor=white><font color=black size=2>id</font></th>
                <th bgcolor=white><font color=black size=2>Name</font></th>
				  <th bgcolor=white><font color=black size=2>Password</font></th>
				   <th bgcolor=white><font color=black size=2>DOB</font></th>
                <th bgcolor=white><font color=black size=2>Mobile</font></th>
				  <th bgcolor=white><font color=black size=2>Email</font></th>
                <th bgcolor=white><font color=black size=2>Address</font></th>
				 <th bgcolor=white><font color=black size=2>User picture</font></th>
				 <th bgcolor=white><font color=black size=2>FatherName</font></th>
                <th bgcolor=white><font color=black size=2>MotherName</font></th>
                <th bgcolor=white><font color=black size=2>Aadhar card</font></th>
                <th bgcolor=white><font color=black size=2>VoterId</font></th>
            </tr>
            <br><br>
            <br>
            <br>
            <br>
            <?php
            while ($row = mysql_fetch_assoc($result)) {
            ?>
                <tr>
                    <td bgcolor=white><font color=black size=2><?php echo $row['id']; ?></font></td>
                    <td bgcolor=white><font color=black size=2><?php echo $row['name']; ?></font></td>
                    <td bgcolor=white><font color=black size=2><?php echo $row['password']; ?></font></td>
					  <td bgcolor=white><font color=black size=2><?php echo $row['dob']; ?></font></td>
                    <td bgcolor=white><font color=black size=2><?php echo $row['mobile']; ?></font></td>
					  <td bgcolor=white><font color=black size=2><?php echo $row['email']; ?></font></td>
                    <td bgcolor=white><font color=black size=2><?php echo $row['address']; ?></font></td>
					<td  bgcolor=white><font color=black size=2><img src=<?php echo $row['uimg'];?> width=80 height=70></td>
                    <td bgcolor=white><font color=black size=2><?php echo $row['fname']; ?></font></td>
                    <td bgcolor=white><font color=black size=2><?php echo $row['mname']; ?></font></td>
                    <td bgcolor=white><font color=black size=2><?php echo $row['aadhar']; ?></font></td>
                    <td bgcolor=white><font color=black size=2><?php echo $row['vid']; ?></font></td>
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
