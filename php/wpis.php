<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <!-- Mobile prepare, viewport is the area of the user's screen, content tells us that the width of the page is the device's width and the content will be pritned with 1.0 scale  -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Adding post php!</title>
    </head>
    <body>
    <?php include 'menu.php'; ?>
		<?php			
			$userName = $_POST['userName'];
			$password = $_POST['userPassword'];
			$postDescription = $_POST['postDescription'];
			$date = $_POST['date'];
			$time = $_POST['time'];

			$blogPath = NULL;

			$directory = new RecursiveDirectoryIterator('.');
			
			foreach(new RecursiveIteratorIterator($directory) as $path => $file) {
				if ($file->getFileName() == 'info.txt' && !($file->isDir())) {				
					$fileArray = file($path);
					$fileUser = $fileArray[0];
					$fileUser = rtrim($fileUser,"\n");
					$filePassword = $fileArray[1];
					$filePassword = rtrim($filePassword,"\n");			
					if ($userName == $fileUser && md5($password) == $filePassword) {
						$blogPath = $file->getPath();
						break;
					}
				}
			}
			if (blogPath == NULL){
				echo "Wrong username or password.";
			}
			else{				
				$date = str_replace("-", "", $date);
				$time = str_replace(":", "", $time);
				$seconds = date("s");
				$uniqueId = 0;

				do {
					$stringCastId = sprintf("%02d",$uniqueId);
					$fileName = $date.$time.$seconds.$stringCastId;
					$filePath = "./".$blogPath."/".$fileName;
					$uniqueId = $uniqueId + 1;
				} while (file_exists($filePath));

				$fileAdd=fopen($filePath, 'w');
				fwrite($fileAdd,$postDescription."\n");
				fclose($myFile);
				echo "Post created.";
			}
		?> 
    </body>
</html>