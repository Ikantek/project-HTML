<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <!-- Mobile prepare, viewport is the area of the user's screen, content tells us that the width of the page is the device's width and the content will be pritned with 1.0 scale  -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Adding comment!</title>
    </head>
    <body>
    <?php include 'menu.php'; ?>

    <form action="koment.php" method="Post" enctype="multipart/form-data">
        <h1>Adding new comment form!</h1>
        <div>Choose the post to comment</div>
        <select name="postToComment">
            <?php
				
	        $directory = new RecursiveDirectoryIterator('.');
	        foreach (new RecursiveIteratorIterator($directory) as $filePath => $file) {
	            if (!($file->isDir())) {
	                if (preg_match("/\d{16}$/", $file)) {
	                    echo "<option>".$file."</option>";
					}
	            }
	        }?>
          </select>

        <div> Name: <input type="text" name="userName"></div>
        <div> Comment: <textarea name="comment" rows="20" cols="30"></textarea></div>
        <select name="commentType">
            <option>Positive</option>
            <option>Negative</option>
            <option>Neutral</option>
        </select>
        <div><input type="reset" value="Clear" /></div>
        <div><input type="submit" value="Create Comment!"></div>
    </form>
    </body>
</html>