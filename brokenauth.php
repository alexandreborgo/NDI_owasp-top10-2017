<div style="padding-top: 20px; padding-bottom: 20px;">
    <div class="alert alert-danger" role="alert">Nous n'avons pas réussis à mettre en place cette faille :(</div>
    <h1>Broken Authentification</h1>
    <hr \>
    <h2>Explication</h2>
    <hr \>
    <h2>Example</h2>
    <hr \>
    <p>Essayez de vous connecter via le formulaire suivant en utilisans une injection SQL.<br \><br \></p>
    <?php


        /*if(isset($_GET['sessionid']) && !empty($_GET['sessionid'])) {
            session_id($_GET['sessionid']);
        }*/

        if(isset($_POST['message']) && !empty($_POST['message'])) {
            $_SESSION['message'] = $_POST['message'];
            echo "<div class=\"alert alert-success\" role=\"alert\">Message enregistré.</div>";
        }

        if(isset($_SESSION['message']) && !empty($_SESSION['message'])) {
            echo "Le message enregistré sur la session est : " . $_SESSION['message'] . "<br \><br \>";
        }
    ?>
    <form method="post" action="/?pg=ba">
        <div class="form-group col-lg-5">
            <label for="message">Message :</label>
            <textarea name="message" type="text" class="form-control" id="message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Sauvegarder</button>
    </form><br \><br \>

    <a href="/?pg=ba&sid=<?php echo session_id(); ?>">link <?php echo session_id(); ?></a>

    <h2>Solutions</h2>
    <hr \>

    <h2>Comment se protéger</h2>
    <hr \>
</div>
