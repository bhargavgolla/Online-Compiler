<?php
	if($_FILES['file']['error']>0)
	{
		echo "Error: ".$_FILES['file']['error']."<br />";
	}
	else if($_FILES['file']['size']>20500)
	{
		echo "The size of the uploaded file is greater than 20 KB";
	}
	else	
	{
		if(($_FILES['file']['type']=="application/zip") || ($_FILES['file']['type']=="application/x-gzip"))
		{
			move_uploaded_file($_FILES['file']['tmp_name'],$_FILES['file']['name']);
			$dir_name="multi";
			mkdir($dir_name);
			if($_FILES['file']['type']=="application/zip")
			{
				$extract_error="extract_error.txt";
				$extract="unzip ".$_FILES['file']['name']." -d $dir_name";
				$extract_out="extract_out.txt";
				shell_exec("$extract 1>$extract_out 2>$extract_error");
			}
			else
			{
				$extract_error="extract_error.txt";
				$extract="tar -xzf ".$_FILES['file']['name']." -C $dir_name";
				$extract_out="extract_out.txt";
				shell_exec("$extract 1>$extract_out 2>$extract_error");
			}
			$error=file_get_contents($extract_error);
			$out=file_get_contents($extract_out);
			if(trim($error)=="")
			{
				$dir=opendir($dir_name);
				$count=0;
				while (($file = readdir($dir)) !== false)
				{
					$file_name=$file;
					$count=$count+1;
				}
				$make_error="make_error.txt";
				if(($count==3) && (is_dir($file_name)==true))
				{
					$make="make -C $dir_name/$file_name";
				}
				else
				{
					$make="make -C $dir_name";
				}
				$make_out="make_out.txt";
				shell_exec("$make 1>$make_out 2>$make_error");
				$error=file_get_contents($make_error);
				$out=file_get_contents($make_out);
				if(trim($error)=="")
				{
					echo "<pre>$out</pre>";
				}
				else
				{
					echo "<pre>$error</pre>";
				}
				closedir($dir_name);
			}
			else
			{
				echo "<pre>$out</pre><pre>$error</pre>";
			}
		}
		else 
		{
			echo 'Please upload only ".zip" or ".tar.gz" files';
		}
	}
	include "../recursive_directory_delete.php";
	recursive_remove_directory("multi");
	exec("rm *.txt");
	exec("rm *.zip");
	exec("rm *.tar.gz");
?>
