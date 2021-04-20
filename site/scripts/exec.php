<?php
    $cmd = escapeshellcmd('python3 main.py');
    $output = exec($cmd);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../navbar.css">
</head>
<body>
    <header>
        <p class="logo">PI3</p>
        <nav>
            <ul class="nav-area">
                <li><a href="https://pi3nada.tk">Acceuil</a></li>
                <li><a href="..">Page principale</a></li>
                <li><a href="../about.html">À propos</a></li>
            </ul>
        </nav>
        <a href="admin/train.php" class="btn-area">Administration</a>
    </header>
    <div class="center">
        <p><?php print_r($output); ?></p><br>
        <img src="verify/resultat.jpg" alt=":(">
    </div>
</body>
</html>