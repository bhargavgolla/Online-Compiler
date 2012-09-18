<?php
session_start();
if(!isset($_SESSION['username']))
{header('Location:../index.php');}
?>
<html>
	<head>
		<title>Online Compiler for Off-Campus Students</title>
			<meta name="keywords" content="BITS,OffCampus,Pilani,Compiler,WILPD" />
			<link rel="shortcut icon" href="../styles/favicon.ico" />
			<link rel="stylesheet" type="text/css" href="../styles/style.css" />		
		
			<script type="text/javascript" src="../js/jquery.js"></script>
			<script type="text/javascript" src="../js/compile.js"></script>
			<script type="text/javascript" src="../js/tab.js"></script>
			<script type="text/javascript" src="../js/jquery.form.js"></script>
			<script type="text/javascript">
				$(document).ready(function() { 
					$('#form2').ajaxForm(function(msg) { 
						$('#output2').html(msg); 
					}); 
				});
			</script>
	</head>

	<body>
	<div id="whole">
		<div id="header">
			<!--<img src="../styles/header.png" width="1000px" height="200px" alt="BITS logo" />
			<br />-->
			<img src="../styles/BITS_univ_logo.png" class="BITS_logo" width="400px" height="134px" alt="BITS logo" />
			<img src="../styles/title_name.png" class="title_name" width="290px" height="134px" alt="Title" />
			<!--<p class="title_name">
			WILP Online Lab
			</p>-->
			<!--Build block of blue-->
			<img class="top_bar" src="../styles/BITS_bar.png" width="400px" height="6px" alt="bar" />
		</div>
		<div id="content">
			<p id="logout">Click <a href="../logout.php">Here</a> to logout!!</p>
			<table class="code">
				<td class="code">	
				<form action="compile.php" method="post" id="form">
					Select Language of Interest:
						<select name="language" id="language">
							<option value="c">C</option>
							<option value="cpp">C++</option>
							<option value="java">Java</option>
							<option value="python2.7">Python</option>
							<option value="python3.2">Python3</option>
						</select>
					<br />
					<strong>Enter Your code here:<br/></strong>
					<textarea name="code" rows=15 cols=100 onkeydown=insertTab(this,event) id="code"></textarea><br/>
					<span id="errorCode" class="error"></span><br/><br/>
					<strong>Sample Input please:<br/></strong>
					<textarea name="input" rows=7 cols=100 id="input"></textarea><br/><br/>
					<input type="submit" value="Submit" id="submit">
					<input type="reset" value="Reset"><br/>
				</form>
				</td>
				<td class="code">
				<p>
				For Multiple file implementation of C code, upload your tar.gz or zip or rar file that contains your makefile.</p>
				<form action="compile.php" method="post" enctype="multipart/form-data" id="form2">
					<!--<p>Select Language of Interest:
						<select name="language">
							<option value="1">C</option>
							<option value="2">Python</option>
							<option value="3">Java</option>
						</select>
					</p>-->
					<label for="file">Filename:</label>
					<input type="file" name="file" id="file" /> 
					<br />
					<input type="submit" name="submit" value="Submit" />
					<input type="reset" value="Reset"><br/>
				</form>
			</td>
			<tr>
			<td class="code"><strong>Output:</strong>
			<span id="output"></span><br/></td>
			<td class="code"><strong>Output:</strong>
			<span id="output2"></span><br/></td>
			</tr>
		</div>
		<table>
		<div id="bottom">
			<img class="bottom_bar" src="../styles/BITS_bar.png" width="400px" height="6px" alt="bar" /><br /><hr />
			<p class="descri">
			<strong>&nbsp;&nbsp;An institution deemed to be a University estd. vide Sec.3 of the UGC<br />
			&nbsp;&nbsp;Act,1956 under notification # F.12-23/63.U-2 of Jun 18,1964</strong><br />
			&nbsp;&nbsp;&#169; 2011-2012&nbsp;Centre for Software Development,SDET Unit, BITS-Pilani, India.<br />
			&nbsp;&nbsp;Contact us : taxila@bits-pilani.ac.in</p>
			<img class="tagline" src="../styles/tagline.png" width="300px" height="98px" alt="BITS_tagline" />
		</div>
		</table>
	</div>
	
	</body>
</html>
