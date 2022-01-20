<?php
    session_start();
    include "connexion.php";
    include "fonction.php";
    $idcompte = $_SESSION['id'];

    $consomTransport =  getConsomTransport($idcompte);
    $consomElectromenage =  getConsomElectromenage($idcompte);
    $consomAppareilElectrique = getConsomAppareilElectrique($idcompte);
    $consomAlimentaire =  getConsomAlimentaire($idcompte);

    //variables transport
    $empreinteCarb = getEmpreinteCarbParKm($consomTransport[0]->id_type_moyen);
    $kilometrage = floatval($consomTransport[0]->kilometrageTransport);
    $nbTrajet = floatval($consomTransport[0]->nbTrajetParSem);
    $carb = floatval($empreinteCarb[0]->empreinteCarboneParKm);

    //total transport
    $totalCT = $kilometrage*$nbTrajet*$carb*4;

    //variables electromenage
    $frigo = $consomElectromenage[0]->nbFrigo;
    $congelo = $consomElectromenage[0]->nbCongelo;
    $four = $consomElectromenage[0]->nbFour;
    $plaque = $consomElectromenage[0]->nbPlaqueChauff;
    $seche = $consomElectromenage[0]->nbSecheLinge;
    $linge = $consomElectromenage[0]->nbLaveLinge;
    $lave = $consomElectromenage[0]->nbLaveVaisselle;
    $micro = $consomElectromenage[0]->nbMicroOnde;

    //total electromenage
    $totalCE = floatval(($frigo*35 + $congelo*39+$four*17+$plaque*31+$seche*45+$linge*49+$lave*47+$micro*15)/12);

    //variables appareil electrique
    $tele = $consomAppareilElectrique[0]->nbTele;
    $ordifixe = $consomAppareilElectrique[0]->nbOrdiFixe;
    $ordiport = $consomAppareilElectrique[0]->nbOrdiPort;
    $imprim = $consomAppareilElectrique[0]->nbImprimante;
    $console = $consomAppareilElectrique[0]->nbConsole;
    $routeur = $consomAppareilElectrique[0]->nbRouteur;
    $aspirateur = $consomAppareilElectrique[0]->nbAspirateur;
    $tablette = $consomAppareilElectrique[0]->nbTablette;
    $phone = $consomAppareilElectrique[0]->nbPhone;

    //total appareil electrique
    $totalCAE = floatval(($tele*54.1+$ordifixe*34+$ordiport*43+$imprim*41.1+$console*21.1+$routeur*2.2+$aspirateur*7.3+$tablette*23.2+$phone*19.7)/12);

    //variable alimentaire et total alimentaire
    $viande = $consomAlimentaire[0]->consommationViande;
    $totalCA = 0;
    switch($viande) {
        case("Jamais"):
            $totalCA = 213.613/12;
            break;
        case("Moins d'1 fois par semaine"):
            $totalCA = 600.251/12;
            break;
        case("1 fois par semaine"):
            $totalCA = 1028.4/12;
            break;
        case("2 fois par semaine"):
            $totalCA = 1632/12;
            break;
        case("Plus de 2 fois par semaine"):
            $totalCA = 1888.335/12;
    }

    
    //calcul du total de l'empreinte carbone

    $totalCarbone = floatval($totalCA + $totalCAE + $totalCE + $totalCT);
?>





<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="profil.css"  />
    <title>Profil</title>
</head>

<body>
    <div class="carre">
        <div class="titre">Profil</div>
        
        <div class="wrapper">
    <div class="card"> <img src="https://cdn.pixabay.com/photo/2018/04/18/18/56/user-3331257_960_720.png">
        <h3><?php echo $_SESSION['nom']; echo " ".$_SESSION['prenom']; ?> </h3> <span>Metz 57000 <br> Etudiant : Université de Lorraine - IUT de Metz <br> </span>
        <p> <?php echo "Consommation transport : ".round($totalCT, 3)." kgCO2eq<br>\n"; ?> </p>
        <p> <?php echo "Consommation electromenage : ".round($totalCE, 3)." kgCO2eq<br>\n"; ?> </p>
        <p> <?php echo "Consommation appareil electrique : ".round($totalCAE, 3)." kgCO2eq<br>\n"; ?> </p>
        <p> <?php echo "Consommation alimentaire : ".round($totalCA, 3)." kgCO2eq<br>\n"; ?> </p>

        <h2> <?php echo "Consommation totale : ".round($totalCarbone, 3)." kgCO2eq<br>\n"; ?> </h2>

    </div>

<!--
<?php 
if ( count($erreur) !== 0 ) {
    foreach($erreur as $err) { 
        ?>
        <p class="erreur"> <?php echo $err ?> </p>;
        <?php
    }
}
?>-->
</body>
</html>
