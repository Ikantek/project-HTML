<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <!-- Mobile prepare, viewport is the area of the user's screen, content tells us that the width of the page is the device's width and the content will be pritned with 1.0 scale  -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog creation status</title>
    </head>
    <body>
    <?php include 'menu.php'; ?>

    <?php
    $blogName = $_POST['blogName'];
    $userName = $_POST['userName'];
    $password = $_POST['userPassword'];
    $blogDescription = $_POST['blogDescription'];

    include 'menu.php';

    if (!file_exists($blogName)) {
      mkdir($blogName, 0755);
      $filePath = $blogName . "/info.txt";
      $file = fopen($filePath, 'w');
      fwrite($filePath,$userName,$password,$blogDescription);
      fclose($file);
      echo "Blog has been created succesfully";
   } else {
      echo "Blog with this name arleady exist";
   }
?>
    </body>
</html>