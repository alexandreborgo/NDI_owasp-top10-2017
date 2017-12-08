<div style="padding-top: 20px; padding-bottom: 20px;">
    <h1>CSRF</h1>
    <hr \>
    <h2>Explication</h2>
    <hr \>
    <h2>Example</h2>
    <hr \>
    <p>Vous êtes ici connecté sur le site de votre banque en train d'effectuer des virements bancaires :<br \></p>
    <?php

    if(isset($_GET['montant']) && !empty($_GET['montant'])) {
        $bdd = new PDO('mysql:host=localhost;dbname=symfony;charset=utf8', 'root', 'root');

        $reponse = $bdd->exec("UPDATE compte SET montant = montant+" . $_GET['montant'] . " WHERE username='" . $_GET['username'] . "'");

        if ($reponse == 1) {

            echo "<div class=\"alert alert-success\" role=\"alert\">Transfer enregistré !</div>";

        }
        else {
            echo "<div class=\"alert alert-danger\" role=\"alert\">Erreur lors de l'enregistrement du transfert :(</div>";
        }
    }

    $bdd = new PDO('mysql:host=localhost;dbname=symfony;charset=utf8', 'root', 'root');

    $reponse = $bdd->query("SELECT * FROM compte");


    while($donnees = $reponse->fetch()) {
        echo "Solde de <b>" . $donnees['username'] . "</b> : <b>" . $donnees['montant'] . "</b><br \><br \>";
    }

    ?>
    <form method="get" action="/?pg=csrf&">
        <div class="form-group col-lg-5">
            <input type="hidden" value="csrf" name="pg">
            <label for="username">Transférer à : </label>
            <select class="form-control" name="username">
                <option value="mathieu">Mathieu</option>
                <option value="alistair">Alistair</option>
            </select><br \>
            <label for="montant">Montant :</label>
            <input name="montant" type="number"  id="montant">
        </div>
        <button type="submit" class="btn btn-primary">Transférer</button>
    </form><br \>

    Une fois les virements effectués vous ne vous déconnecter pas du site bancaire et visiter d'autre site...<br/><br />
    Mais sur l'un des sites un pirate à glissé un lien qui vous redirige vers le site de votre banque tout en demandant un virement vers leur compte :<br /><br />

    <a href="/?pg=csrf&username=mathieu&montant=500">/?pg=csrf&username=mathieu&montant=500</a><br \><br \>

    <h2>Comment se protéger</h2>
    <hr \>
    La protection est au niveau des formulaires et de leur traitement. Le code qui traite les informations doit s'assurer que'elles proviennent bien du bon formulaire et non pas d'un autre page.<br/><br/>
    Pour ça un technique consiste à attribuer un identifiant aléatoire caché à chaque chargement de formulaire (qui sera envoyé en même temps que les informations) et de l'enregistrer côté serveur.<br /><br/>
    Quand le serveur traite les informations, il vérifie la présence de l'identifiant et la validité !
</div>
