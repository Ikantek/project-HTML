<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <!-- Mobile prepare, viewport is the area of the user's screen, content tells us that the width of the page is the device's width and the content will be pritned with 1.0 scale  -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Post</title>
    </head>
    <body>
    <?php include 'menu.php'; ?>

    <form action="wpis.php" method="Post" enctype="multipart/form-data">
        <h1>Adding new post!</h1>
        
        <div> User Name: <input type="text" name="userName"></div>
        <div> User Password: <input type="password" name="userPassword"></div>
        <div> Post Description: <textarea name="postDescription" rows="20" cols="30"></textarea></div>
        <div><input type="text" name = "date" value="<?php echo date("Y-m-d"); ?>"></div>
        <div><input type="text" name = "time" value="<?php date_default_timezone_set("America"); echo date("H:i"); ?>"> </div>
        <div>Attachment 1<input type="file" name="file1"></div>
		<div>Attachment 2<input type="file" name="file2"></div>
		<div>Attachment 3<input type="file" name="file3"></div>
        <div><input type="reset" value="Clear" /></div>
        <div><input type="submit" value="Create Blog!"></div>
    </form>
    </body>
</html>