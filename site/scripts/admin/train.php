<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../navbar.css">
</head>
<body>
    <header>
        <p class="logo">PI3</p>
        <nav>
            <ul class="nav-area">
                <li><a href="https://pi3nada.tk">Acceuil</a></li>
                <li><a href="../..">Page principale</a></li>
                <li><a href="../../about.html">À propos</a></li>
            </ul>
        </nav>
        <a href="#" class="btn-area">Administration</a>
    </header>
    <h1 style="margin: 50px;">Administration</h1>
    <div class="center" style="margin-top: 50px;">
        <h3>Important</h3><br>
        <p>Le nom de la personne entrée doit être écrit de la même manière que la première fois (sensible à la casse).<br>N'oubliez pas de cliquer sur exécuter pour refaire le dataset d'entrainement!</p>
        <form action="upload_train.php" method="post" enctype="multipart/form-data">
            <p>Nom:</p><input type="text" name="name"> <br>
            <input type="file" name="file">
            <input type="submit" value="Télécharger">
        </form>
        <a href="exec.php" class="btn">Exécuter</a>
        <a href="filemanager.php?p=site%2Fscripts%2Fpersonnes" class="btn">Gérer les fichiers</a>
        <a href="logout.php" class="btn">Logout</a>
    </div>
</body>
</html>