<?php 

session_start();
 
$_SESSION['url'] ='quiz2.php';

if (isset($_POST['btn_valider'])) {
    $erreur = array();
    $v_frigo = trim(htmlentities($_POST['frigo']));
    $v_congelo = trim(htmlentities($_POST['congelo']));
    $v_fours = trim(htmlentities($_POST['four']));
    $v_sechelinge = trim(htmlentities($_POST['sechelinge']));
    $v_lavelinge = trim(htmlentities($_POST['lavelinge']));
    $v_plaquechauffante = trim(htmlentities($_POST['plaquechauffante']));
    $v_lavevaisselle = trim(htmlentities($_POST['lavevaisselle']));
    $v_microonde = trim(htmlentities($_POST['microonde']));

    if(!isset($v_distance) or strlen($v_distance)==0) {
        $erreur['frigo'] = 'Saisir un nombre';
    }
    if(!isset($v_congelo) or strlen($v_congelo)==0) {
        $erreur['congelo'] = 'Saisir un nombre';
    }
    if(!isset($v_fours) or strlen($v_fours)==0) {
        $erreur['fours'] = 'Saisir un nombre';
    }
    if(!isset($v_sechelinge) or strlen($v_sechelinge)==0) {
        $erreur['sechelinge'] = 'Saisir un nombre';
    }
    if(!isset($v_lavelinge) or strlen($v_lavelinge)==0) {
        $erreur['lavelinge'] = 'Saisir un nombre';
    }
    if(!isset($v_plaquechauffante) or strlen($v_plaquechauffante)==0) {
        $erreur['plaquechauffante'] = 'Saisir un nombre';
    }
    if(!isset($v_lavevaisselle) or strlen($v_lavevaisselle)==0) {
        $erreur['lavevaisselle'] = 'Saisir un nombre';
    }
    if(!isset($v_microonde) or strlen($v_microonde)==0) {
        $erreur['distance'] = 'Saisir un nombre';
    }
    echo 'Distance : ' . $v_frigo . ' Moyen de transport : ' . $v_congelo . ' nbTrajets : ' . $v_fours. ' Type transport : ' . $v_sechelinge . $v_sechelinge . $v_lavelinge . $v_plaquechauffante . $v_lavevaisselle . $v_microonde; 
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
    <form name="consommationElec" action="" method="post" class="form">
 
        <!-- Details -->
        <div class="form-control">
            <label for="name" id="label-name"> Nombre de frigo possédé:</label>
            <!-- Input Type Text -->
            <input type="text" id="frigo" name="frigo" placeholder="Saisir le nombre" />
        </div>

        <div class="form-control">
            <label for="email" id="label-email">Nombre de congelateurs possédés:</label>
            <!-- Input Type Email-->
            <input type="text" id="congelo" name="congelo" placeholder="Saisir le nombre" />
        </div>
        
        <div class="form-control">
            <label for="age" id="label-age">Nombre de fours possédés:</label>
        <!-- Input Type Text -->
            <input type="text" id="four" name="four" placeholder="Saisir un nombre" />
        </div>

        <div class="form-control">
            <label for="age" id="label-age">Nombre de sèche linge possédés:</label>
        <!-- Input Type Text -->
            <input type="text" id="sechelinge" name="sechelinge" placeholder="Saisir un nombre" />
        </div>

        <div class="form-control">
            <label for="age" id="label-age">Le nombre de lave linge possédés:</label>
        <!-- Input Type Text -->
            <input type="text" id="lavelinge" name="lavelinge" placeholder="Saisir un nombre" />
        </div>
        <div class="form-control">
            <label for="age" id="label-age">Nombre de plaques chauffantes possédées:</label>
        <!-- Input Type Text -->
            <input type="text" id="plaquechauffante" name="plaquechauffante" placeholder="Saisir un nombre" />
        </div>

        <div class="form-control">
            <label for="age" id="label-age">Nombre de lave-vaisselle possédé:</label>
        <!-- Input Type Text -->
            <input type="text" id="lavevaiselle" name="lavevaisselle" placeholder="Saisir un nombre" />
        </div>

        <div class="form-control">
            <label for="age" id="label-age">Nombre de micro-ondes possédés:</label>
        <!-- Input Type Text -->
            <input type="text" id="microonde" name="microonde" placeholder="Saisir un nombre" />
        </div>

        
    <!-- fin 1er questionnaire-->

        <!-- Multi-line Text Input Control -->
        <input type="submit" name="btn_valider" value="Valider"/>
    </form>
</body>

</html>