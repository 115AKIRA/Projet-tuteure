<?php

//fonction qui recupère tous les type moyens
function getTypeMoyens()
{
    require('connexion.php');
    $req = $objPdo->prepare('SELECT id_type_moyen, libelle_moyen, specificite, empreinteCarboneParKm FROM TypeMoyen ORDER BY id_type_moyen');
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
  
}

//fonction qui recupère tous les trophes d'un utilisateur
function getTrophes($idcompte)
{
    require('connexion.php');
    $req = $objPdo->prepare('SELECT idtrophe, dateTrophe, libelleTrophe FROM Trophes WHERE idcompte = ? ORDER BY dateTrophe DESC');
    $req->execute(array($idcompte));
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
  
}
function getEmpreinteCarbParKm($idtypemoy)
{
    require('connexion.php');
    $req = $objPdo->prepare('SELECT empreinteCarboneParKm FROM TypeMoyen WHERE id_type_moyen = ? ');
    $req->execute(array($idtypemoy));
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
}

//fonction qui met les donnée de l'utilisateur pour le transport dans la bdd
function setConsomTransport($idcompte, $kilometrage, $nbTrajet, $idTypeMoyen)
{
    require('connexion.php');
    $req = $objPdo->prepare('INSERT INTO ConsomTransport(dateCT,idcompte,kilometrageTransport,nbTrajetParSem, id_type_moyen) VALUES(NOW(),?,?,?,?)');
    $req->execute(array($idcompte,$kilometrage,$nbTrajet,$idTypeMoyen));
}

//fonction qui met les donnée de l'utilisateur pour les electromenages dans la bdd
function setConsomElectromenages($idcompte, $nbFrigo, $nbCongelo, $nbFour, $nbPlaqueChauff, $nbSecheLinge, $nbLaveLinge, $nbLaveVaisselle, $nbMicroOnde)
{
    require('connexion.php');
    $req = $objPdo->prepare('INSERT INTO ConsomElectromenages(dateCE,idcompte,nbFrigo,nbCongelo,nbFour,nbPlaqueChauff,nbSecheLinge,nbLaveLinge,nbLaveVaisselle,nbMicroOnde) VALUES(NOW(),?,?,?,?,?,?,?,?,?)');
    $req->execute(array($idcompte,$nbFrigo,$nbCongelo,$nbFour,$nbPlaqueChauff,$nbSecheLinge,$nbLaveLinge,$nbLaveVaisselle,$nbMicroOnde));
}

//fonction qui met les donnée de l'utilisateur pour les appareil electrique dans la bdd
function setConsomAppareilElectrique($idcompte, $nbTele, $nbOrdiFixe, $nbOrdiPort, $nbImprimante, $nbConsole, $nbRouteur, $nbAspirateur, $nbTablette)
{
    require('connexion.php');
    $req = $objPdo->prepare('INSERT INTO ConsomAppareilElectrique(idcompte,dateCAE,nbTele,nbOrdiFixe,nbOrdiPort,nbImprimante,nbConsole,nbRouteur,nbAspirateur,nbTablette) VALUES(?,NOW(),?,?,?,?,?,?,?,?)');
    $req->execute(array($idcompte,$nbTele,$nbOrdiFixe,$nbOrdiPort,$nbImprimante,$nbConsole,$nbRouteur,$nbAspirateur,$nbTablette));
}
?>