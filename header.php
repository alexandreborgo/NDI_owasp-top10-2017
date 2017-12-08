<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Accueil</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="#">OWASP 2017 Top 10</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/?pg=home">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/?pg=inj">Injection</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/?pg=xss">XSS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/?pg=csrf">CSRF</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/?pg=ba">Broken Authentication</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container" style="padding-bottom: 100px;">