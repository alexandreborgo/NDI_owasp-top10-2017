<div style="padding-top: 20px; padding-bottom: 20px;">
    <h1>Injections</h1>
    <hr \>
    L'injection SQL est l'une des techniques de piratage Web les plus courantes.<br \><br \>
    <h2>Explication</h2>
    <hr \>
    Une injection SQL (ou d'autre type) consiste à envoyer un bout de code malicieux qui va être exécuter sur le serveur.<br \>
    Dans le cas d'un injection SQL on cherche à modifier la logique de la requête SQL pour détourner son action<br \><br \>

    <b>SELECT password FROM user WHERE username='$username'</b><br \>

    Si $username prend comme valeur : <b>toto' OR '1'='1</b><br \><br \>

    Le requête devient : <b>SELECT password FROM user WHERE username='toto' OR '1'='1'</b><br \><br \>

    Cette requête nous renvoie tous les mots de passe de tous les comptes.<br \><br \>
    <br \><br \>
    <h2>Example</h2>
    <hr \>
    <p>Essayez de vous connecter via le formulaire suivant en utilisans une injection SQL.<br \><br \></p>
    <?php

    if(isset($_POST['username']) && !empty($_POST['username'])) {

        $bdd = new PDO('mysql:host=localhost;dbname=symfony;charset=utf8', 'root', 'root');

        $reponse = $bdd->query("SELECT * FROM user WHERE username='" . $_POST['username'] . "' AND password='" . $_POST['password'] . "'");

        if($reponse->rowCount() > 0) {
            $donnees = $reponse->fetch();

            echo "<div class=\"alert alert-success\" role=\"alert\">Vous avez réussi à vous connecter en tant que " . $donnees['username'] . ".</div>";

        }
        else {
            echo "<div class=\"alert alert-danger\" role=\"alert\">Erreur réessayer !</div>";
        }

        $reponse->closeCursor();
    }

    ?>
    <form method="post" action="/?pg=inj">
        <div class="form-group col-lg-5">
            <label for="username">Pseudo :</label>
            <input name="username" type="text" class="form-control" id="username">
            <label for="password">Mot de passe :</label>
            <input name="password" type="password" class="form-control" id="password">
        </div>
        <button type="submit" class="btn btn-primary">Connexion</button>
    </form><br \><br \>

    <h2>Solutions</h2>
    <hr \>
    <a href="#" class="secret">Passer la souris ici pour afficher les solutions.</a>
       <div class="secretdiv">
        <p>
            Dans le champ Pseudo : <br \>
            <span style="margin-left: 100px;"><b>admin' -- </b></span><br \>
            avec un espace après les --<br \>
            et n'importe quoi dans le champ mot de passe<br \><br \>

            Ou :<br \>
            Pseudo : <b>admin</b><br \>
            Mot de passe : <b>a' or '1'='1</b>


        </p>
    </div><br \><br \>

    <h2>Comment se protéger</h2>
    <hr \>
    Nous pouvons protéger nos sites avec des fonctions qui vont détecter les caractères spéciaux comme : '. Et les rendre inéficaces lors de ll'éxécution de la requête.<br \>
    Des fonctions comme : addslash.
</div>
