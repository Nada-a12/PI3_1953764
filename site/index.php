<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page principale</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <p class="logo">PI3</p>
        <nav>
            <ul class="nav-area">
                <li><a href="https://pi3nada.tk">Accueil</a></li>
                <li><a href="#">Page principale</a></li>
                <li><a href="about.html">À propos</a></li>
            </ul>
        </nav>
        <a href="scripts/admin/train.php" class="btn-area">Administration</a>
    </header>
    <h1 style="margin: 50px;">Page principale</h1>
    <div class="center">
        <div class="camera center" id="camera"></div>
        <input type="button" value="Capturer" onClick="capturer()">
        <div id="photo"></div>
        <form action="scripts/upload.php" method="post">
            <input type="hidden" name="image" class="image-tag">
            <input type="submit" value="Sauvegarder">
        </form>
        <button class="btn"><a href="scripts/exec.php">Exécuter</a></button>
    </div>
</body>
</html>

<script type="text/javascript" src="scripts/webcamjs/webcam.min.js"></script>
<script type="text/javascript" src="scripts/webcam.js"></script>