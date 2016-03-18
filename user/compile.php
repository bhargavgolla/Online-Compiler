<?php

	$languageID=$_POST["language"];
	if(isset($_FILES["file"]) && isset($_FILES["file"]["name"]) && $_FILES["file"]["name"]!="")
	{
		include "../compilers/make.php";
	}
	else
	{
		switch($languageID)
			{
				case "c":
				{
					include("../compilers/c.php");
					break;
				}
				case "cpp":
				{
					include("../compilers/cpp.php");
					break;
				}
				case "java":
				{
					include("../compilers/java.php");
					break;
				}
				case "python2.7":
				{
					include("../compilers/python27.php");
					break;
				}
				case "python3.2":
				{
					include("../compilers/python32.php");
					break;
				}
			}
	}
?>
