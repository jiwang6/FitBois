<html>

<!-- Demo.php - 3/21/2011 - Steve Hadfield (edited by Joel Coffman) -->
<!-- Shows how to access POST and SYSTEM parameters in PHP -->

 <head>
 <link rel="stylesheet" href="styles.css">
   <title>FitBois Login Page </title>
 </head>

 <body>
   <center>
     <h1>FitBois Login Page</h1>
     <br />
     <br />
	 
	 		<?php
			$value = $_POST['Username'];

			setcookie("TestCookie", $value);
		?>

<!-- Note the use of <?php ?> to embed PHP commands
     and $_POST['<parameter_name>'] to get POST parameters -->
	 <h2>Welcome <?php echo $_POST['Username']; ?>!</h2>

     <br />

<!-- Below demonstrates how to get system information from PHP 

     Web page <b><?php echo $_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'] ?></b><br />
     accessed on <b><?php echo date("Y-m-d H:i") ?></b>
        from IP address <b><?php echo $_SERVER['REMOTE_ADDR'] ?></b> via
        <b><?php echo $_SERVER['REQUEST_METHOD'] ?></b><br/>
     <br />

<!-- Give a link back to the main page -->

     <a href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">Click Here</a> to return to the FitBois site.

   </center>
 </body>
</html>