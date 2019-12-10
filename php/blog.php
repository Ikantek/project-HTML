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
			$blogName = " ";
            echo $blogName;
            if (isset($_GET['nazwa'])) {
			    $blogName = $_GET['nazwa'];
            }
            echo "asd1".$blogName;
            if ($blogName = " "){
                echo "asd2".$blogName;
                $directory = new DirectoryIterator(".");
                foreach($directory as $file){
                    if ($file->isDir() && !$file->isDot()){
                        $blog = $file->getFilename();
                        echo sprintf("<div><a href=\"blog.php?nazwa=%s\">%s</a></div>", $blog, $blog);
					}
				}
			} else {
                echo "asd3".$blogName;
                $existFlag = false;
                $directoryPath = "./".$blogName."/";
                $lineNumber = 1;
                if(file_exists($directoryPath)){
                      $existFlag = true;
                      $blogText = fopen($blogName."/info", 'r');
                      echo "<div><h1>Title: ".$blogName."</h1></div>";
                      while(($line = fgets($blogText))!=false){
                          if ($lineNumber == 1){
                             echo "<div><h2>Blog is being written by: ".$line."</h2>M/div>";
					      }
                          if ($lineNumber == 3){
                            echo "<div><h3>Short description: ".$line."</h3></div>";
					      }
                          $lineNumber = $lineNumber + 1;
                      }
                      fclose($blogText);
			    }
                if ($existFlag = false){
                    echo "Blog does not exist";        
				}
			}
		
		?> 
    </body>
</html>