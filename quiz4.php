<?php 

session_start();
 
$_SESSION['url'] ='quiz4.php';

if (isset($_POST['btn_valider'])) {
    $erreur = array();
    $v_unefois = trim(htmlentities($_POST['unefois']));
    $v_deuxfois = trim(htmlentities($_POST['deuxfois']));
    $v_troisfois = trim(htmlentities($_POST['troisfois']));
    $v_jamais = trim(htmlentities($_POST['jamais']));

    if(!isset($v_unefois) or strlen($v_unefois)==0) {
        $erreur['unefois'] = 'Choisir une réponse';
    }
    if(!isset($v_deuxfois) or strlen($v_deuxfois)==0) {
        $erreur['deuxfois'] = 'Choisir une réponse';
    }
    if(!isset($v_troisfois) or strlen($v_troisfois)==0) {
        $erreur['troisfois'] = 'Choisir une réponse';
    }
    if(!isset($v_jamais) or strlen($v_jamais)==0) {
        $erreur['jamais'] = 'Choisir une réponse';
    }
   
    echo 'Distance : ' . $v_unefois . ' Moyen de transport : ' . $v_deuxfois . ' nbTrajets : ' . $v_troisfois. ' Type transport : ' . $v_jamais ; 
}
?>
<html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="quiz.css"/>
    <title>Quiz 2</title>
 
</head>

<body>
    <h1>Questionnaire consommation électrique</h1>
    <!-- Create Form -->
    <form name="consommationViande" action="" method="post" class="form">
 
        <!-- Details -->
        <div class="form-control">
            <label>
                A combien de reprise mangez vous de la viande dans la semaine ?
            </label>
 
            <!-- Input Type Radio Button -->
            <label for="jamais">
                <input type="radio"
                       id="jamais"
                       name="jamais">Jamais</input>
            </label>
            <label for="unefois">
                <input type="radio"
                       id="unefois"
                       name="unefois">1 fois par semaine</input>
            </label>
            <label for="deuxfois">
                <input type="radio"
                       id="deuxfois"
                       name="deuxfois">2 fois par semaine</input>
            </label>
            <label for="troisfois">
                <input type="radio"
                       id="troisfois"
                       name="troisfois">Plus de 2 fois par semaine</input>
            </label>
        </div>

        
    <!-- fin 1er questionnaire-->

        <!-- Multi-line Text Input Control -->
        <input type="submit" name="btn_valider" value="Valider"/>
    </form>
</body>

</html>