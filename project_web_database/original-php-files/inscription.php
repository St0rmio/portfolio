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

    <section class="hero3">
	<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body>
        <div id="container">
            <!-- zone d'inscription' -->
            
            <form name = "inscription" method="post" action = "inscription.php">
                <h1>Inscription</h1>
                
                <label><b>Votre Code INE</b></label>
                <input type="text" placeholder="Entrer votre code INE" name="INE" required>

                <label><b>Pseudo</b></label>
                <input type="text" placeholder="Choisir un pseudo" name="pseudo" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Choisir un mot de passe" name="password" required>

                <input type="submit" name='valider' value='SIGN IN' >
            
            
            <?php
                if (isset($_POST['valider']))  {
                    // on récupère les données du formulaire
                    $INE = $_POST['INE'];
                    $pseudo = $_POST['pseudo'];
                    $password = $_POST['password'];
                    // on se connecte à la base de données
                    $base = new mysqli('localhost','root','root','bonnote');
                    // insertion de requête SQL
                    $sql = 'INSERT INTO INSCRIT VALUES("'.$INE.'","'.$pseudo.'","'.$password.'")';
                    // . = concaténation
                    // envoie de la requête
                    $req = $base->query($sql);
                    // regarde si erreur ou pas
                    if (!$req)   // si la requete a envoyé une erreur
                    {echo "<p style='color:red; background-color:white; padding:5px; font-size: 1.5rem;'>Echec d'inscription : réessayez<br />".$base->error."</p>";}
                    else {echo "<p style='color:green; background-color:white; padding:5px; font-size: 1.5rem;'>Inscription effectuée avec succès</p>";}
                    // on ferme la connection
                    mysqli_close($base);
                }
            // on ferme le php
            ?>
            
            
                
            </form>
        </div>
    </body>
</html>
    </section>

    <footer>
        <p>Guillaume B, Hakeem B et Kévin P - © Janvier 2022 BONNOTE</p>
    </footer>

</body>

</html>