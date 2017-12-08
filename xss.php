<div style="padding-top: 20px; padding-bottom: 20px;">
    <h1>XSS</h1>
    <hr \>
    <h2>Explication</h2>
    <hr \>
    Ce type de faille permet à l'attaquant d'injecté du code javascript sur le site web victime, code qui sera éxécuter au chargement de la page.
    <br \>
    <br \>
    <h2>Example</h2>
    <hr \>
    <p>Voici un système de commentaires (qui affiche seulement le dernier commentaire enregistré). Essayez d'exploiter la faille XSS du système.<br \><br \></p>
    <?php

    if(isset($_POST['message'])) {
        if(!empty($_POST['message'])) {

            $bdd = new PDO('mysql:host=localhost;dbname=symfony;charset=utf8', 'root', 'root');

            $reponse = $bdd->exec("INSERT INTO commentaires VALUES (null, '" . $_POST['username'] . "', '" . $_POST['message'] . "', " . time() . ")");

            if ($reponse == 1) {

                $message = "<div class=\"alert alert-success\" role=\"alert\">Message enregistrer !</div>";

            } else {
                $message = "<div class=\"alert alert-danger\" role=\"alert\">Erreur lors de l'enregistrement du message dans la base de données :(</div>";
            }
        }
        else {
            $message = "<div class=\"alert alert-danger\" role=\"alert\">Message vide :/</div>";
        }
    }
    ?>
    Le dernier commentaire :<br \><br \>
    <?php
        $bdd = new PDO('mysql:host=localhost;dbname=symfony;charset=utf8', 'root', 'root');

        $reponse = $bdd->query("SELECT * FROM commentaires ORDER BY time DESC LIMIT 1");

        if($reponse->rowCount() == 1) {
            $donnees = $reponse->fetch();
            echo "Message de " . $donnees["username"] . " : <br \><div class=\"rounded\" style=\"border:1px solid black; padding:5px;\">" . $donnees["message"] . "</div><br \><br \>";

        }
        else {
            echo "<div class=\"alert alert-danger\" role=\"alert\">Aucun commentaire !</div>";
        }

    ?>

    Postez votre commentaire :<br \>
    <?php if(isset($message)) echo $message; ?><br \>
    <form method="post" action="/?pg=xss">
        <div class="form-group">
            <label for="username">Pseudo :</label>
            <input name="username" type="text" class="form-control col-lg-5" id="username"><br \>
            <label for="message">Message :</label>
            <textarea name="message" type="text" class="form-control" id="message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form><br \><br \>

    <h2>Solutions</h2>
    <hr \>
    <a href="#" class="secret">Passer la souris ici pour afficher les solutions.</a>
    <div class="secretdiv">
        <p>
            La faille peut être exploitée depuis les deux champs :<br \>
            Une simple injection de code nuisible :<br \>
           <b>&lt;script&gt;alert(\'Hello World!\')&lt;/script&gt;</b><br \>
            on ajoute les \ devant les ' pour ne pas provoquer d'erreur SQL<br \>
            On peut aussi redirigé vers un autre site :<br \>
            <b>&lt;script&gt; document.location=
                \'https://google.fr\' &lt;/script&gt;</b><br \>
        </p>
    </div><br \><br \>

    <h2>Comment se protéger</h2>
    <hr \>
</div>
