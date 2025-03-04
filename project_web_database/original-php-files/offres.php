<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="icons/award-solid.svg" type="image/svg+xml">
    <title>BONNOTE</title>
</head>

<body>

    <header class="main-head">
        <nav>

            <img src="icons/award-solid.svg" width=30px height=30px>
            <h1 id="logo"><a href="index.html">BONNOTE</a></h1>
            <ul>
                <li><a href="offres.php">Offres</a></li>
                <li><a href="faq.html">FAQ</a></li>
                <li><a href="inscription.php">Inscription</a></li>
            </ul>
        </nav>
    </header>

    <article class="hero1">

    <section class="commande">
	<form method="post" action="offres.php">
    <h1>Souscrire à une offre</h1><br>

    <p> Choix de la matière : 
		<select name="NomMatiere">
            <option>NSI
            <option>MATHEMATIQUES
            <option>PHILOSOPHIE
            <option>ANGLAIS
            <option>ENSEIGNEMENT SCIENTIFIQUE
            <option>HISTOIRE-GEO
            <option>EPS
		</select><br>

        Augmentation de moyenne voulue : 
				<input type="radio" name="id_offre" value="1" checked/> 5% → 25€/trimestre
				<input type="radio" name="id_offre" value="2" /> 10% → 45€/trimestre
				<input type="radio" name="id_offre" value="3" /> 15% → 65€/trimestre


	    <input type="text" placeholder="Entrez votre code INE" name="INE" required><br>
        </p>
	<input type="submit" name="valider" value="Souscrire" /><br>
    </form>

    
    <?php
    if (isset ($_POST['valider'])) {
        //on récupère les valeurs entrées par l'utilisateur
        $NomMatiere=$_POST['NomMatiere'];
        $id_offre=$_POST['id_offre'];
        $INE=$_POST['INE'];

        // on se connecte à la base
        $base = new mysqli('localhost', 'root', 'root','bonnote');

        $sql = 'INSERT INTO COMMANDE(INE,NomMatiere,id_offre) VALUES("'.$INE.'","'.$NomMatiere.'","'.$id_offre.'")'; 

        $req = $base->query($sql); 

        if (!$req)   // si la requete a envoyé une erreur
        {echo "<p style='color:red; background-color:white; padding:5px'>Code INE invalide ! Vérifiez que l'INE entré est bien le même qu'à votre inscription<br />".$base->error."</p>";}
        else {echo "<p style='color:green; background-color:white; padding:5px'>Souscription effectuée avec succès</p>";}
            //on ferme la connexion à la base
        mysqli_close ($base);
        }
    ?>
    

    </section><br>
    
    <section class="connexion"><br><br>
    <form method="post" action="souscriptions.php"> 
    <h1>Visualiser mes abonnements en cours</h1><br>
        
        <label><b>Code INE</b></label>
        <input type="text" placeholder="Entrez votre INE" name="INE" required><br>

        <label><b>Mot de passe</b></label>
		<input type="password" placeholder="Entrez votre mot de passe" name="MotDePasse" required><br>

		<input type="submit" name="valider" value="Connexion" /><br>
		</form>
    </section>

    </article>

    <footer>
        <p>Guillaume B, Hakeem B et Kévin P - © Janvier 2022 BONNOTE</p>
    </footer>

</body>

</html>