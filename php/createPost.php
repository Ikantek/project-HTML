<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <!-- Mobile prepare, viewport is the area of the user's screen, content tells us that the width of the page is the device's width and the content will be pritned with 1.0 scale  -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Post</title>
    </head>
    <body onload="actualizeDate();actualizeHour();listOfAttachments();">
    <?php include 'menu.php'; ?>

    <form action="wpis.php" method="Post" enctype="multipart/form-data">
        <h1>Adding new post!</h1>
        
        <div> User Name: <input type="text" name="userName"></div>
        <div> User Password: <input type="password" name="userPassword"></div>
        <div> Post Description: <textarea name="postDescription" rows="20" cols="30"></textarea></div>
        <div> Date: <input type="text" id="date" name = "date" value="" onchange="validateDate()"> </div>
        <div> Hour: <input type="text" id="time" name = "time" value="" onchange="validateHour()"> </div>
        <div> Files: </br></div><div id="attachments"></div></br>
        <div><input type="reset" value="Clear" /></div>
        <div><input type="submit" value="Create Post!"></div>
    </form>
    </body>
    <script type="text/javascript" src="sc.js">
	</script>
</html>