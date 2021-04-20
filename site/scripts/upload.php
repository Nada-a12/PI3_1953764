<?php
$img = $_POST['image'];
$folderPath = "verify/";

$parties_image = explode(";base64,", $img);
$image_type_aux = explode("image/", $parties_image[0]);
$type_image = $image_type_aux[1];

$image_base64 = base64_decode($parties_image[1]);
exec('rm verify/personne*');
$nom_fichier = 'personne.jpg';

$fichier = $folderPath . $nom_fichier;
file_put_contents($fichier, $image_base64);

header('Location: https://pi3nada.tk/site/')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Done!</title>
</head>
<body>
    Done!
</body>
</html>