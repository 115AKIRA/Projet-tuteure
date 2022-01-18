<?php error_reporting(~(E_NOTICE | E_WARNING) );

session_start();

$erreur = array();

$url = $_SESSION['url'];

if ( $_SESSION['id'] ==  null ) {

    $titre = "Création de compte";
    $mdptitre = "Mot de passe ( 8 caractères minimum ) : ";
    $mdptitre2 = "Confirmer votre mot de passe : ";
    $modif_tel = $modif_email = $modif_prenom = $modif_nom = "";

} /*else {

    $titre = "Modification de compte";
    $mdptitre = "Nouveau mot de passe ( 8 caractères minimum ) : ";
    $mdptitre2 = "Confirmer votre ancient mot de passe : ";

    $modif_tel = $_SESSION['telephone'];
    $modif_email = $_SESSION['email'];
    $modif_pass = $_SESSION['password'];
    $modif_prenom = $_SESSION['prenom'];
    $modif_nom = $_SESSION['nom'];
    
    $id = $_SESSION['id'];

}*/


if (isset($_POST['btn_submit'])) {
    $v_prenom = trim(htmlentities($_POST['prenom']));
    $v_nom = trim(htmlentities($_POST['nom']));
    $v_tel = trim(htmlentities($_POST['tel']));
    $v_mail = trim(htmlentities($_POST['mail']));
    $v_pass = trim(htmlentities($_POST['pass']));
    $v_pass2 = trim(htmlentities($_POST['pass2']));

    require_once('connexion.php');
    $req_tel = $objPdo->prepare("SELECT * FROM compte WHERE tel = \"$v_tel\" ");
    $req_tel->execute();
    $req_mail = $objPdo->prepare("SELECT * FROM compte WHERE email = \"$v_mail\" ");
    $req_mail->execute();
	
    if ( $_SESSION['id'] ==  null ) {
        if(!isset($v_nom) or strlen($v_nom)==0) {
            $erreur['nom'] = "Saisie obligatoire du nom";
        }  else if ( is_numeric($v_nom ) ) {
            $erreur['nom'] = "Nom doit être composé uniquement de lettres";
        }
    }
	
    if(!isset($v_prenom) or strlen($v_prenom)==0) {
        $erreur['prenom'] = "Saisie obligatoire du prenom";
    }  else if ( is_numeric($v_prenom ) ) {
	$erreur['prenom'] = "Nom doit être composé uniquement de lettres";
    }

    if(!isset($v_tel) or strlen($v_tel)==0) {
        $erreur['tel'] = $erreur['tel']." | saisie obligatoire du numéro de téléphone";
    } else if ( $req_tel->rowCount() > 0 ) {
        $erreur['tel'] = $erreur['tel']." | Le numéro de téléphone est déjà associé";  
    } else if ( strpos($v_tel, '@') || strpos($v_tel, '.')) {
        $erreur['tel'] = $erreur['tel']." | pseudo comporte au moins charactere illegal";
    }

    if(!isset($v_mail) or strlen($v_mail)==0) {
        $erreur['email'] = "Saisie obligatoire du nom d'une adresse email";
    } else if (!(filter_var($v_mail, FILTER_VALIDATE_EMAIL))) {
        $erreur['email'] = "Adresse email invalide";
    } else if ( ( ( $req_mail->rowCount() > 0 ) && ( $_SESSION['id']) == null ) || ( ( $modif_email !== $v_mail ) && ( $req_mail->rowCount() > 0 ) ) ) {
        $erreur['email'] = "Email déjà existant"; 
    }

    if(!isset($v_pass) or strlen($v_pass) < 8) {
        $erreur['pass'] = $erreur['pass']." | saisie obligatoire du mot de passe valide";
    }

    if(!isset($v_pass2) or strlen($v_pass2) < 8) {
        $erreur['pass2'] = $erreur['pass2']." | saisie obligatoire du mot de passe de confirmation valide";
    } else if ( $_SESSION['id'] ==  null ) {
    	if ( $v_pass !== $v_pass2 ) {
            $erreur['pass2'] = $erreur['pass2']." | mot de passe de confirmation incorrect";
        }
    } else {
    	if ( $v_pass2 !== $modif_pass ) {
    	    $erreur['pass2'] = $erreur['pass2']." | mot de passe ancient incorrect";
    	}
    }

    if (count($erreur)==0) {
        require_once('connexion.php');
		if ( $_SESSION['id'] ==  null ) {

            echo("marche");
			
            $req= $objPdo->prepare("INSERT INTO compte (email,tel,pass,nom,prenom)  VALUES( ? , ? , ? , ? , ? ) "); 
			$req->bindValue(1, $v_mail, PDO::PARAM_STR); 
			$req->bindValue(2, $v_tel, PDO::PARAM_STR);
			$req->bindValue(3, $v_pass, PDO::PARAM_STR); 
			$req->bindValue(4, $v_nom, PDO::PARAM_STR);
			$req->bindValue(5, $v_prenom, PDO::PARAM_STR);			
			$req->execute();
		} /*else {
			
			$req= $objPdo->prepare("UPDATE compte SET prenom=?, adressemail=?, motdepasse=?, pseudo=? WHERE idcompte = \"$id\" "); 
			$req->bindValue(1, $v_prenom, PDO::PARAM_STR);
			$req->bindValue(2, $v_mail, PDO::PARAM_STR); 
			$req->bindValue(3, $v_pass, PDO::PARAM_STR);
			$req->bindValue(4, $v_tel, PDO::PARAM_STR);	
            var_dump($req);		
			$req->execute();
        }*/
        
        header("location: authentification.php");
    }

}

/*if (isset($_POST['btn_retour'])) {
    header("location: ".$url);
}*/


?>


<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="creer.css"/>
    <title>Création d'un compte</title>
</head>

<body>

<!--<div class="barre">
            <form name="retour" action="" method="post" class="btn">
                <input type="submit" name="btn_retour" value ="Retour à l'acceuil"/>
            </form>-->

        <!--<?php if ( $_SESSION['id'] !== null ) {
            echo '<p class="pseudo"> Bonjour, '.$modif_user.'</p>';
        }?>-->
</div>

<!--<h1> <?php echo($titre) ?> </h1>-->

<!--<form name="modif" action="" method="post" class="form">-->

<!--<?php 

if ( $_SESSION['id'] ==  null ) {
	
	echo '<div class="inputform">';
	echo '<label for="user">';
	echo 'Nom :' ;
	echo '</label>';
	echo '<br>';
	echo '<input type="text" id="nom" name="nom" size="30"/>';
	echo '</div>';
}

?>-->

<div class="carre">
    <div class="titre"><h5>Création d'un compte</h5></div>
        <form name="modif" action="" method="post" class="form">
            <div class="champ_saisie">
                <input type="text" id="nom" name="nom" value=""/>
                <label>Nom</label>
            </div>
            <div class="champ_saisie">
                <input type="text" id="prenom" name="prenom" value=""/>
                <label>Prenom</label>
            </div>
            <div class="champ_saisie">
                <input type="text" id="mail" name="mail" value=""/>
                <label>Email</label>
            </div>
            <div class="champ_saisie">
                <input type="text" id="tel" name="tel" value= ""/>
                <label>Téléphone</label>
            </div>
            <div class="champ_saisie">
                <input type="password" id="pass" name="pass"/>
                <!--<label for="pass"> <?php echo($mdptitre) ?> </label>-->
                <label>Mot de passe</label>
            </div>
            <div class="champ_saisie">
                <input type="password" id="pass2" name="pass2"/>
                <!--<label for="pass2"> <?php echo($mdptitre2) ?> </label>-->
                <label>Confirmer Mot de passe</label>
            </div>
            <br>
            <div class="champ_saisie">
                <input type="submit" name="btn_submit" value="Confirmer" class="buttons" />
            </div>
        <div class="signup-link">Vous avez déjà un compte?<a href="authentification.php"><br>Connectez-vous !</a></div>
      </form>
</div>

<!--
<div class="inputform">
    <label for="user"> Prenom : </label>
    <br>
    <input type="text" id="prenom" name="prenom" value= '<?php echo($modif_prenom) ?>' size="30"/>

</div>

<div class="inputform">
    <label for="user"> Téléphone </label>
    <br>
    <input type="text" id="pseudo" name="pseudo" value= '<?php echo($modif_user) ?>' size="30"/>

</div>

<div class="inputform">
    <label for="user"> Email : </label>
    <br>
    <input type="text" id="mail" name="mail" value= '<?php echo($modif_email) ?>' size="30" />

</div>

<div class="inputform">
    <label for="pass"> <?php echo($mdptitre) ?> </label>
    <br>
    <input type="password" id="pass" name="pass" size="30" />

</div>

<div class="inputform">
    <label for="pass2"> <?php echo($mdptitre2) ?> </label>
    <br>
    <input type="password" id="pass2" name="pass2" size="30" />

</div>

    <input type="submit" name="btn_submit" value="Confirmer" class="buttons" />

</form>-->

<?php 

if ( count($erreur) !== 0 ) {

    foreach($erreur as $err) { 
        ?>
    <div>
        <p class="erreur"> <?php echo $err ?> </p>
        <br>
    </div>
        <?php
    }
}

?>

</body>
</html>
