<form action="SendMail.php" method="POST">
	<input type="hidden" name="template" value="<?php 
		$read = file('template.txt');
		foreach ($read as $fname) 
		{
			echo $fname.'<br>';
		} 
	?>"><br><br>
	<input type="submit" name="submit" value="Send Mail">
</form>

<div>
	<?php
		if(!empty($_POST['template'])) {
			$to = "ujjawalus98@gmail.com";
			$header = "From:ujjawalsharma@ameyo.com";
			$subject = "Send Mail Example";
			$message = $_POST['template'];;
			$handle = fopen("template.txt","r");
			$sendmail = mail($to, $subject, $message, $header);

			if($sendmail == true)
				echo "<h2>Sent successfully....</h2><br>";
			else
				echo "Mail could not be sent";
			echo "<h3>Message was:</h3><p>".$message."</p>";
		}
	?>
</div>