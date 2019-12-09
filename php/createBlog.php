<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <!-- Mobile prepare, viewport is the area of the user's screen, content tells us that the width of the page is the device's width and the content will be pritned with 1.0 scale  -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dodawanie bloga!</title>
    </head>
    <body>
    <?php include 'menu.php'; ?>

    <form action="newBlogFile.php" method="Post" enctype="multipart/form-data">
        <h1>Formularz dodawania nowego bloga!</h1>

        <div> Nazwa bloga: <input type="text" name="blogName"></div>
        <div> Nazwa u¿ytkownika: <input type="text" name="userName"></div>
        <div> Has³o u¿ytkownika: <input type="password" name="userPassword"></div>
        <div> Opis bloga: <textarea name="blogName" rows="20" cols="30"></textarea></div>

        <div><input type="reset" value="Wyczyœæ pola" name="wyczysc"/></div>
        <div><input type="submit" value="Stwórz bloga!"></div>
    </form>
    </body>
</html>