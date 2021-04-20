<?php
    $cmd = escapeshellcmd('python3 dataset.py');
    $output = exec($cmd);
    print_r($output);
    header('Location: train.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat</title>

</head>
<body>
</body>
</html>