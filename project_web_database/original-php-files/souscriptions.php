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

    <?php	
		if (isset($_POST['valider'])) {
			// on recupere les données du formulaire
			$INE = $_POST['INE'];
			$MotDePasse = $_POST['MotDePasse'];
			// on se connecte à la base
			$base = new mysqli('localhost','root','root','bonnote');
			// insertion de requete SQL
			$sql = $sql = 'SELECT * FROM Commande JOIN Inscrit JOIN Offre ON Commande.INE=Inscrit.INE AND Commande.id_offre=Offre.id_offre 
                        WHERE Inscrit.INE="'.$INE.'" AND MotDePasse="'.$MotDePasse.'"  ';
			// . = concaténation
			// envoi de la requete
			$req = $base->query($sql);
			// regarde si erreur ou pas
			if ($req) {
                echo '<table>
                        <tr>
                            <th>Matière</th>
                            <th>Offre</th>
                            <th>Prix</th>
                        </tr>';
                while ($data = mysqli_fetch_array($req)) 
                // on scanne les résultats de la requête un par un
                // chaque résultat est retrouvé par sa colonne dans la BDD
                            {echo '<tr><td>'.$data['NomMatiere'].'</td>
                                        <td>'.$data['NomOffre'].'</td>
                                        <td>'.$data['Prix'].'</td>';}
                    echo '</table>';
                } // fin du if
                else // message d'erreur si la requête est fausse
                    {echo "<p style='color:red; background-color:white; padding:5px'>Erreur de connexion : réessayez<br>".$base->error."</p>";}
                // on ferme la connection
                mysqli_close($base);
                }
                ?>

    <section class=mdp>
    <p>Si rien n'apparaît à l'écran alors que vous avez souscrit à une offre, réessayez en veillant à bien entrer le pseudo et le mot de passe exacts</p>
    </section>

    </article>

    <footer>
        <p>Guillaume B, Hakeem B et Kévin P - © Janvier 2022 BONNOTE</p>
    </footer>

</body>

</html>