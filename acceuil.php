<html>
<html lang="fr">

<?php

session_start();
$idcompte = $_SESSION['id'];
$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];

?>
  
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="acceuil.css"/>
    <title>Accueuil</title>
 
</head>
  
<body>
    <header>
        <?php echo "Bonjour, ".strtoupper($nom)." ".$prenom; ?>
    </header>

    <section>
        <figure id="nuage1"> <a href="quiz.php"> <img class = "nuage" src="img/nuag.png"> </a> <figcaption> Missions </figcaption> </figure>
        <figure id="nuage2"> <a href="profil.php"> <img class = "nuage" src="img/nuag.png"> </a>  <figcaption> Profil </figcaption> </figure>
        <figure id="nuage3"> <a href="articles.php"> <img class = "nuage" src="img/nuag.png"> </a>  <figcaption> Articles</figcaption> </figure>
        <figure id="nuage4"> <a href="https://dino-chrome.com/fr"> <img class = "nuage" src="img/nuag.png"> </a>  <figcaption> Jeux </figcaption> </figure>
    </section>

<footer>
    <nav>
        <ul>
            <li><a href="acceuil.php"> <img class="menu" src="img/menu.png"> </a></li>
            <li><a href="quiz.php"> <img class ="menu" src="img/missions.png"> </a></li>
            <li><a href="profil.php"> <img class = "menu" src="img/profil.png"> </a></li>
            <li><a href="articles.php"> <img class = "menu" src="img/articles.png"> </a></li>
            <li><a href="https://dino-chrome.com/fr"> <img class = "menu" src="img/jeux.png"> </a></li>
        </ul> 
    </nav>
</footer>

</body>

</html>