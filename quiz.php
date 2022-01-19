<?php 

session_start();
 
$_SESSION['url'] ='quiz.php';
//$idcompte = $_SESSION['id']; 
$idcompte = 1;

require('fonction.php');
$typemoy = getTypeMoyens();

if (isset($_POST['btn_valider'])) {
    $erreur = array();
    $v_distance = trim(htmlentities($_POST['distance']));
    $v_nbTrajet = trim(htmlentities($_POST['nbTrajets']));
    $v_typeTransport = trim(htmlentities($_POST['typeTransport']));

    if(!isset($v_distance) or strlen($v_distance)==0) {
        $erreur['distance'] = 'Veuillez saisir une distance valable';
    }
    if (!is_numeric($v_distance)) {
        $erreur['distance'] = 'Saisir uniquement des chiffres';
    }
   
    if(!isset($v_nbTrajet) or strlen($v_nbTrajet)==0) {
        $erreur['nbTrajets'] = 'Saisir un nombre de trajets';
    }
    if (!is_numeric($v_nbTrajet)) {
        $erreur['nbTrajets'] = 'Saisir uniquement des chiffres';
    }

    if(!isset($v_typeTransport) or strlen($v_typeTransport)==0) {
        $erreur['typeTransport'] = 'Choisir un type de transport';
    }

    if (count($erreur) > 0 ) {
        foreach($erreur as $err) {
            echo $err.' ; ';
        }
    } else {

    $carb = getEmpreinteCarbParKm($v_typeTransport);
    
    echo 'Distance : ' . $v_distance .  ' nbTrajets : ' . $v_nbTrajet. ' Type transport : ' . $v_typeTransport;
    ?>
    <br>
    <?php 
    echo 'Consommation transport par mois : '.floatval($v_distance)*floatval($carb)*floatval($v_nbTrajet)*floatval(4).' kgCO2eq';
    $insert = setConsomTransport($idcompte, $v_distance, $v_nbTrajet, $v_typeTransport);
    }
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
            <label for="name" id="label-name">Distance entre le lieu de residence et le lieu de travail</label>
            <!-- Input Type Text -->
            <input type="text" id="distance" name="distance" placeholder="Saisir la distance" />
        </div>
  
        <div class="form-control">
            <label for="age" id="label-age">Le nombre de fois que vous vous rendez au travail par semaine?</label>
        <!-- Input Type Text -->
            <input type="text" id="nbTrajets" name="nbTrajets" placeholder="Saisir le nombre de trajets par semaine" />
        </div>
  
        <div class="form-control">
            <label for="role" id="label-role">
                Quel type de transport utilisez-vous?</label>
             
            <!-- Dropdown options -->
            <select name="typeTransport" id="typeTransport">
                <?php
                    foreach($typemoy as $moyen) {
                        echo '<option value= " '.$moyen->id_type_moyen.'" > '.$moyen->libelle_moyen.' </option>';
                    }
                ?>
            </select>
        </div>
    <!-- fin 1er questionnaire-->  

        <!-- Multi-line Text Input Control -->
        <input type="submit" name="btn_valider" value="Valider"/>
    </form>
</body>
  
</html>
