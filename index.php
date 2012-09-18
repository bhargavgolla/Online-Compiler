<html>
	<head>
		<title>Online Compiler for Off-Campus Students</title>
		<meta name="keywords" content="BITS,OffCampus,Pilani,Compiler,WILPD" />
		<link rel="shortcut icon" href="styles/favicon.ico" />
		<link rel="stylesheet" type="text/css" href="styles/style.css" />	
	</head>

	<body>
	<div id="whole">
		<div id="header">
			<!--<img src="styles/header.png" width="1000px" height="200px" alt="BITS logo" />
			<br />-->
			<img src="styles/BITS_univ_logo.png" class="BITS_logo" width="400px" height="134px" alt="BITS logo" />
			<img src="styles/title_name.png" class="title_name" width="290px" height="134px" alt="Title" />
			<!--<p class="title_name">
			WILP Online Lab
			</p>-->
			<!--Build block of blue-->
			<img class="top_bar" src="styles/BITS_bar.png" width="400px" height="6px" alt="bar" />
		</div>
		<div id="content">
			<?php
			session_start();
			 
			if(isset($_SESSION['username']))
			{
				$folder=$_SESSION['username'];
				header("Location: ./$folder/");
			}
			?>

			<div id="login_portal">
			<form action="checklogin.php" method="post">
			<table width="300" border="0" cellspacing="0" cellpadding="2">
			<tr><td>Username<td><td>:<td><td><input type="text" name="username"><td></tr>
			<tr><td>Password<td><td>:<td><td><input type="password" name="password"><td></tr>
			<tr><td colspan="2"><center><input type="submit" value="Login" /></center></td></tr>
			<?php if(isset($_GET['login_attempt']) and ($_GET['login_attempt']==1)) {?>
			<font color="red" class="error">Bad Login or Password. Please try again. <br/></font>
			<?php }?>
			</table>
			</form>
			</div>
		</div>
		<div id="bottom">
			<img class="bottom_bar" src="styles/BITS_bar.png" width="400px" height="6px" alt="bar" /><br /><hr />
			<p class="descri">
			<strong>&nbsp;&nbsp;An institution deemed to be a University estd. vide Sec.3 of the UGC<br />
			&nbsp;&nbsp;Act,1956 under notification # F.12-23/63.U-2 of Jun 18,1964</strong><br />
			&nbsp;&nbsp;&#169; 2011-2012&nbsp;Centre for Software Development,SDET Unit, BITS-Pilani, India.<br />
			&nbsp;&nbsp;Contact us : taxila@bits-pilani.ac.in</p>
			<img class="tagline" src="styles/tagline.png" width="300px" height="98px" alt="BITS_tagline" />
		</div>
	</div>
	</body>
</html>
