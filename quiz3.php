<?php 

session_start();
 
$_SESSION['url'] ='quiz3.php';  

if (isset($_POST['btn_valider3'])) {
    $erreur = array();
    $v_nbTele = trim(htmlentities($_POST['nbTele']));
    $v_nbOrdiPortable = trim(htmlentities($_POST['nbOrdiPortable']));
    $v_nbOrdiFixe = trim(htmlentities($_POST['nbOrdiFixe']));
    $v_nbImprimante = trim(htmlentities($_POST['nbImprimante']));
    $v_nbConsole = trim(htmlentities($_POST['nbConsole']));
    $v_nbRouteur = trim(htmlentities($_POST['nbRouteur']));
    $v_nbAspirateur = trim(htmlentities($_POST['nbAspirateur']));
    $v_nbTablette = trim(htmlentities($_POST['nbTablette']));
    $v_nbPhone = trim(htmlentities($_POST['nbPhone']));

    if(!isset($v_nbTele) or strlen($v_nbTele)==0) {
        $erreur['nbTele'] = 'Saisir un nombre de téléviseurs';
    }
    if(!isset($v_nbOrdiPortable) or strlen($v_nbOrdiPortable)==0) {
        $erreur['nbOrdiPortable'] = 'Saisir un nombre d\'ordinateur portable';
    }
    if(!isset($v_nbOrdiFixe) or strlen($v_nbOrdiFixe)==0) {
        $erreur['nbOrdiFixe'] = 'Saisir un nombre d\'ordinateur fixe';
    }
    if(!isset($v_nbImprimante) or strlen($v_nbImprimante)==0) {
        $erreur['nbImprimante'] = 'Saisir un nombre d\'imprimante';
    }
    if(!isset($v_nbConsole) or strlen($v_nbConsole)==0) {
        $erreur['nbConsole'] = 'Saisir un nombre de console';
    }
    if(!isset($v_nbRouteur) or strlen($v_nbRouteur)==0) {
        $erreur['nbRouteur'] = 'Saisir un nombre de routeur';
    }
    if(!isset($v_nbAspirateur) or strlen($v_nbAspirateur)==0) {
        $erreur['nbAspirateur'] = 'Saisir un nombre d\'aspirateur';
    }
    if(!isset($v_nbTablette) or strlen($v_nbTablette)==0) {
        $erreur['nbTablette'] = 'Saisir un nombre de tablette';
    }
    if(!isset($v_nbPhone) or strlen($v_nbPhone)==0) {
        $erreur['nbPhone'] = 'Saisir un nombre de smartphones';
    }
    echo 'nbOrdiPortable : ' . $v_nbOrdiPortable . ' nbOrdiFixe : ' . $v_nbOrdiFixe . ' nbImprimante : ' . $v_nbImprimante. ' nbConsole : ' . $v_nbConsole;
    echo ' nbRouteur : ' . $v_nbRouteur . ' nbAspirateur : ' . $v_nbAspirateur . ' nbTablette : ' . $v_nbTablette;
    ?><br><?php
    echo 'Consommation appareil electrique : '.((($v_nbTele*54.1)+($v_nbOrdiPortable*43)+($v_nbTablette*23.2)+($v_nbPhone*19.7)+($v_nbImprimante*41.1)+($v_nbConsole*21.1)+($v_nbAspirateur*7.3)+($v_nbRouteur*2.2)+($v_nbOrdiFixe*34))/12).' kgCO2eq';
}
?>

<html>
<html lang="fr">
  
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="quiz.css"/>
    <title>Quiz</title>
 
</head>
  
<body>
    <h1>Questionnaire transport</h1>
    <!-- Create Form -->
    <form name="transport" action="" method="post" class="form">
 
        <!-- Details -->

        <div class="form-control">
            <label for="name" id="label-name">Nombre de téléviseurs</label>
            <!-- Input Type Text -->
            <input type="text" id="nbTele" name="nbTele" placeholder="Saisir un nombre" />
        </div>

        <div class="form-control">
            <label for="name" id="label-name">Nombre d'ordinateur portable</label>
            <!-- Input Type Text -->
            <input type="text" id="nbOrdiPortable" name="nbOrdiPortable" placeholder="Saisir un nombre" />
        </div>
  
        <div class="form-control">
            <label for="email" id="label-email">Nombre d'ordinateur fixe</label>
            <!-- Input Type Email-->
            <input type="text" id="nbOrdiFixe" name="nbOrdiFixe" placeholder="Saisir un nombre" />
        </div>
  
        <div class="form-control">
            <label for="age" id="label-age">Nombre d'imprimantes</label>
        <!-- Input Type Text -->
            <input type="text" id="nbImprimante" name="nbImprimante" placeholder="Saisir un nombre" />
        </div>

        <div class="form-control">
            <label for="age" id="label-age">Nombre de consoles</label>
        <!-- Input Type Text -->
            <input type="text" id="nbConsole" name="nbConsole" placeholder="Saisir un nombre" />
        </div>

        <div class="form-control">
            <label for="age" id="label-age">Nombre de routeur internet</label>
        <!-- Input Type Text -->
            <input type="text" id="nbRouteur" name="nbRouteur" placeholder="Saisir un nombre" />
        </div>

        <div class="form-control">
            <label for="age" id="label-age">Nombre d'aspirateur</label>
        <!-- Input Type Text -->
            <input type="text" id="nbAspirateur" name="nbAspirateur" placeholder="Saisir un nombre" />
        </div>

        <div class="form-control">
            <label for="age" id="label-age">Nombre de tablette</label>
        <!-- Input Type Text -->
            <input type="text" id="nbTablette" name="nbTablette" placeholder="Saisir un nombre" />
        </div>

        <div class="form-control">
            <label for="age" id="label-age">Nombre de smartphones</label>
        <!-- Input Type Text -->
            <input type="text" id="nbPhone" name="nbPhone" placeholder="Saisir un nombre" />
        </div>
  
        
    <!-- fin 3e questionnaire-->  

        <!-- Multi-line Text Input Control -->
        <input type="submit" name="btn_valider3" value="Valider"/>
    </form>
</body>
  
</html>