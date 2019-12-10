<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <!-- Mobile prepare, viewport is the area of the user's screen, content tells us that the width of the page is the device's width and the content will be pritned with 1.0 scale  -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Adding blog!</title>
    </head>
    <body>
    <?php include 'menu.php'; ?>

    <form action="nowy.php" method="Post" enctype="multipart/form-data">
        <h1>Adding new blog form!</h1>

        <div> Blog Name: <input type="text" name="blogName"></div>
        <div> User Name: <input type="text" name="userName"></div>
        <div> User Password: <input type="password" name="userPassword"></div>
        <div> Blog Description: <textarea name="blogDescription" rows="20" cols="30"></textarea></div>

        <div><input type="reset" value="Clear" /></div>
        <div><input type="submit" value="Create Blog!"></div>
    </form>
    </body>
</html>