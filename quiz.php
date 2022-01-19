<?php 

session_start();
 
$_SESSION['url'] ='quiz.php';

require('connexion.php');
$req = $objPdo->prepare('SELECT id_type_moyen, libelle_moyen, specificite, empreinteCarboneParKm FROM type_moyen ORDER BY id_type_moyen');
$req->execute();
$data = $req->fetchAll(PDO::FETCH_OBJ);

if (isset($_POST['btn_valider'])) {
    $erreur = array();
    $v_distance = trim(htmlentities($_POST['distance']));
    $v_moyenTransport = trim(htmlentities($_POST['moyenTransport']));
    $v_nbTrajet = trim(htmlentities($_POST['nbTrajets']));
    $v_typeTransport = trim(htmlentities($_POST['typeTransport']));

    if(!isset($v_distance) or strlen($v_distance)==0) {
        $erreur['distance'] = 'Saisir une distance';
    }
    if (!is_numeric($v_distance)) {
        $erreur['distance'] = 'Saisir uniquement des chiffres';
    }

    if(!isset($v_moyenTransport) or strlen($v_moyenTransport)==0) {
        $erreur['moyenTransport'] = 'Saisir un moyen de transport';
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

    require('connexion.php');
    $req2 = $objPdo->prepare('SELECT empreinteCarboneParKm FROM type_moyen WHERE id_type_moyen = ? ');
    $req2->execute(array($v_typeTransport));
    $carb = $req2->fetchAll(PDO::FETCH_OBJ);
    
    echo 'Distance : ' . $v_distance . ' Moyen de transport : ' . $v_moyenTransport . ' nbTrajets : ' . $v_nbTrajet. ' Type transport : ' . $v_typeTransport;
    ?>
    <br>
    <?php 
    echo 'Consommation transport par mois : '.floatval($v_distance)*floatval($carb)*floatval($v_nbTrajet)*floatval(4).' kgCO2eq';
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
            <label for="email" id="label-email">Quel moyen de transport utilisez-vous?</label>
            <!-- Input Type Email-->
            <input type="text" id="moyenTransport" name="moyenTransport" placeholder="Saisir le moyen de transport" />
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
                    foreach($data as $moyen) {
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