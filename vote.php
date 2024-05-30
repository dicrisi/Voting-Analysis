<?php 
	include_once("config.php");
	include_once("style.php");
 include_once('phpmailer/class.smtp.php');
include_once('phpmailer/class.pop3.php');
include_once('email.class.inc.php');
?>	

<?php
error_reporting(0);



$query2 = "select * from candidate where cid='".$_GET['select']."'";
			//echo $query2;
			$result = mysql_query($query2);
			if(mysql_num_rows($result)){
			$row = mysql_fetch_assoc($result);
			}

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
		color:black;
    }
</style>

  <!-- Carousel Start -->
  
                       <div class="container">



<form action="" method="post" name="addroom">
    <center>
        <style>
            body {
                background-image: url("vote.jpg");
            }
        </style>
        <br>
        <br>
        <br>
        <br>
        <center><font color="black" size="5"> <b>Vote</b> </font></center>
        </br>

       <b> Candidate id</b><br />
        <input name="cid" type="text" value="<?php echo $row['cid']; ?>" readonly />
        <br />
        <b> Candidate  name</b><br />
        <input name="cname" type="text" value="<?php echo $row['cname']; ?>" readonly />
        <br />
		 <b> Party name</b><br />
        <input name="pname" type="text" value="<?php echo $row['pname']; ?>" readonly />
<br />
       <b> User Mail</b><br />
<input name="mail" type="text" value="<?php echo $_SESSION['email']; ?>" readonly />

        <br />
       <input type="submit" name="submit" value="Vote" id="button1" />
	
        <br>

    </center>
</form>

</div>

<?php
 
 
if(isset($_POST['submit'])){

	$query = "INSERT INTO `vote` VALUES (null,'".$_POST['cname']."',  '".$_POST['pname']."' ,'".$_POST['mail']."', curdate())";
	$query1 = "UPDATE `user` SET login='yes' WHERE email='" . $_SESSION['email'] . "'";

	echo $query;
	 echo $query1;
      
	   
 if(mysql_query($query) && mysql_query($query1)){
        $umail = $_POST['mail'];
        $email = new Email();
        $email->set_from($configVars['my_email']);
        $email->set_from_name('Voting Analysis');
        $email->set_subject("Voting Details");
        $email->set_message("Hi, your vote for candidate name as " . $_POST['cname'] . " from party name as " . $_POST['pname'] . " has been successfully registered!!!");
        $email->add_to($umail);

        $sent_flag = $email->send();
        
        if($sent_flag) {
            echo 'UPDATE SUCCESSFULLY';
            header("Location: userlogin.php");
            exit;
        } else {
            echo 'Failed to send email';
        }
    } else {
        echo 'Failed to submit vote or update login status';
    }
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
