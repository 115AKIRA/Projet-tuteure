<?php 

session_start();
 
$_SESSION['url'] ='authentification.php';  

if (isset($_POST['btn_login'])) {
    $erreur = array();
    $valeur = array();
    $v_user = trim(htmlentities($_POST['user']));
    $v_pass = trim(htmlentities($_POST['password']));

    if(!isset($v_user) or strlen($v_user)==0) {
        $erreur['id'] = 'saisie obligatoire du numéro de téléphone ou de l\'adresse email';
    }

    if(!isset($v_pass) or strlen($v_pass) < 8) {
        $erreur['password'] = 'saisie obligatoire du mot de passe';
    }

    if (count($erreur)==0) {
        require_once('connexion.php');
        if (strpos($v_user, '@')) {
            $req = $objPdo->prepare("SELECT * FROM compte WHERE email = \"$v_user\" AND pass = \"$v_pass\" ");
            $req->execute();
        } else {
            $req = $objPdo->prepare("SELECT * FROM compte WHERE tel = \"$v_user\" AND pass = \"$v_pass\" ");
            $req->execute();
        }

        if ( $req->rowCount() == 0 ) {
            echo("Identification échouée, erreur.");
       } else {
           while ($row=$req->fetch()) {

               $_SESSION['id'] = $row['idcompte'];
               $_SESSION['nom'] = $row['nom'];
               $_SESSION['prenom'] = $row['prenom'];
               $_SESSION['telephone'] = $row['tel'];
               $_SESSION['email'] = $row['email'];
               $_SESSION['password'] = $row['pass'];
               /*header("location: acceuil.php");*/

           }
        }
    }

}
/*
if (isset($_POST['btn_creer'])) {
    header("location: creer.php");
}


if (isset($_POST['btn_retour'])) {
    header("location: acceuil.php");
}
*/
if(isset($_POST['btn_deconnexion'])){
    session_destroy();
    header("location: authentification.php");
}
?>

<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="authentification.css"  />
    <title>Authentification</title>
</head>

<body>
    <div class="carre">
        <div class="titre">Authentification</div>
        <form name="login" action="" method="post" class="form">
            <div class="champ_saisie">
            <input type="text" id="user" name="user"/>
            <label>Email</label>
            </div>
            <div class="champ_saisie">
            <input type="password" id="password" name="password"/>
            <label>Mot de passe</label>
            </div>
            <br>
            <div class="champ_saisie">
            <input type="submit" name="btn_login" value="Connexion"/>
            </div>
            <br>
            <div class="champ_saisie">
            <input type="submit" name="btn_deconnexion" value="Deconnexion"/>
            </div>
            <div class="signup-link">Vous n'avez pas de compte?<br> <a href="creer.php">Créer-en un !</a></div>
        </form>
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

<!--
<div class="barre">
            <form name="retour" action="" method="post" class="btn">
                <input type="submit" name="btn_retour" value ="Retour à l'acceuil"/>
            </form>
</div>

<h1> Authentification </h1>

<form name="login" action="" method="post" class="form">

<div class="inputform">
    <label for="user"> Pseudo ou email : </label>
    <br>
    <input type="text" id="user" name="user" size="30"/>

</div>

<div class="inputform">
    <label for="pass"> Mot de passe ( 8 caractères minimum ) : </label>
    <br>
    <input type="password" id="pass" name="pass" size="30" />

</div>

<div class="inputform">

    <input type="submit" name="btn_login" value="Connexion" class="buttons"/>
    <input type="submit" name="btn_creer" value="Créer un nouveau compte" class="buttons"/>
</div>
</form> 
-->