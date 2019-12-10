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
    $nazwaBloga = $_POST['nazwaBloga'];
    $nazwaUzytkownika = $_POST['nazwaUzytkownika'];
    $haslo = $_POST['haslo'];
    $opis = $_POST['opisBloga'];

    include 'menu.php';

    if (!file_exists($nazwaBloga)) {
      mkdir($nazwaBloga, 0755, true);

      $sciezka_pliku_txt = $nazwaBloga . "/info.txt";
      $plik = fopen($sciezka_pliku_txt, 'w');

      if (flock($plik, LOCK_EX)) {
         fputs($plik, $nazwaUzytkownika . "\n");
         fputs($plik, md5($haslo) . "\n");
         fputs($plik, $opis);
         echo "Blog utworzony <br />";
      }

      flock($plik, LOCK_UN);
      fclose($plik);

   } else {
      echo "Blog with this name arleady exist";
   }
?>
    </body>
</html>