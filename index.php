<html>
    <head>
        <title>SOS partenaires - Venez rencontrer d'autres sportifs</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style-index.css" rel="stylesheet">
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="main-page">
                    <header>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="titre-principale">SOS partenaires</h1>
                                </div>
                            </div>
                        </div>
                    </header>
                    <div class="container">
                        <section class="presentation">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-presentation">Bonjour et bienvenue sur SOS partenaires, le site qui vous aide à trouver des partenaires près de chez vous<br>
                            Pour pouvoir accéder au site, pensez à vous inscrire.<br>
                            Déjà inscrit ? Connectez vous !
                                    </p>
                                </div>
                            </div>
                        </section>
                        <section class="form">
                            <?php if (isset($_GET["fin"])) echo "<p>Vous êtes déconnecté</p>"; ?>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-1">
                                    <article class="form-connexion">    
                                        <h3>Connexion</h3>
                                            <form method="post" action="connexion.php">
                                                <div class="form-group">
                                                    <label>Identifiant</label>
                                                    <input type="text" name="id-connexion" class="id-class-connexion form-control" id="id-connexion" placeholder="Entrez votre identifiant">
                                                </div>
                                                <div class="form-group">
                                                    <label>Mot de passe</label>
                                                    <input type="password" name="mp-connexion" class="mp-class-connexion form-control" id="mp-connexion" placeholder="Entrez votre mot de passe">
                                                    <?php if (isset($_GET["erreur5"])) echo "veuillez remplir toutes les zones de texte";?>
                                                    <?php if (isset($_GET["erreur4"])) echo "l'identifiant ou le mot de passe est incorrect";?>
                                                </div>
                                                <button type="submit" class="btn btn-default">Se connecter</button>
                                            </form>
                                        </article>
                                    </div>
                                
                                
                                    <div class="col-md-4 col-md-offset-1">
                                        <article class="form-inscription">
                                            <h3>Inscription</h3>
                                                <form method="post" action="inscription.php">
                                                    <div class="form-group">
                                                        <label>Identifiant</label>
                                                        <input type="text" name="id" class="id-class-inscription form-control" id="id-inscription" placeholder="Entrez votre identifiant">
                                                        <?php if (isset($_GET["erreur"])) echo "identifiant indisponible";?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Mot de passe</label>
                                                        <input type="password" name = "mp" class="mp-class-inscription form-control" id="mp-inscription" placeholder="Entrez votre mot de passe">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Confirmation du mot de passe</label>
                                                        <input type="password" name="mp-confirm" class="mp-confirm-class-inscription form-control" id="mp-confirm-insciption" placeholder="Entrez de nouveau votre mot de passe">
                                                        <?php if (isset($_GET["erreur2"])) echo "les mots de passes ne sont pas identiques";?>
                                                        <?php if (isset($_GET["erreur3"])) echo "veuillez remplir toutes les zones de texte";?>
                                                        </div>
                                                    <button type="submit" class="btn btn-default">S'inscrire</button>
                                                </form>
                                            </article>
                                        </div>
                                
                            </div>
                        </section>
                    </div>            
                <footer class="bas-page">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-5 col-md-offset-7">
                                <nav class="nav-rigth nav-bas-page">
                                    <ul class="nav nav-pills">
                                        <li role="presentation"><a href="plan_du_site.html" class="lien-bas-page">Plans du site</a></li>
                                        <li role="presentation"><a href="mentions_legales.html" class="lien-bas-page">mentions legales</a></li>
                                        <li role="presentation"><a href="cgu.html" class="lien-bas-page">CGU</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script> 
    </body>
</html>
    