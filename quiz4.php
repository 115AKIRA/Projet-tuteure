<?php 

session_start();
 
$_SESSION['url'] ='quiz4.php';

if (isset($_POST['btn_valider'])) {
    
    if(!isset($_POST['radio'])) {
        echo 'Veuillez selectionner un bouton !';
    } else {
        $boutonval = $_POST['radio'];
        echo 'Consommation alimentaire : '.($boutonval/12).' kgCO2eq';
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
    <title>Quiz 4</title>
 
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
            <label for="0">
                <input checked type="radio"
                       id="0"
                       name="radio"
                       value="213.613">Jamais</input>
            </label>
            <label for="1">
                <input type="radio"
                       id="1"
                       name="radio"
                       value="600.251">Moins d'1 fois par semaine</input>
            </label>
            <label for="2">
                <input type="radio"
                       id="2"
                       name="radio"
                       value="1028.4">1 fois par semaine</input>
            </label>
            <label for="3">
                <input type="radio"
                       id="3"
                       name="radio"
                       value="1632">2 fois par semaine</input>
            </label>
            <label for="4">
                <input type="radio"
                       id="4"
                       name="radio"
                       value="1888.335">Plus de 2 fois par semaine</input>
            </label>
        </div>

        
    <!-- fin 1er questionnaire-->

        <!-- Multi-line Text Input Control -->
        <input type="submit" name="btn_valider" value="Valider"/>
    </form>
</body>

</html>
