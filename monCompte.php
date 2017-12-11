<?php 
    session_start();
    $id = $_SESSION["id"];
    include("connectDB.php");
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>SOS partenaires - Venez rencontrer d'autres sportifs</title>
            <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
            <link rel="stylesheet" href="css/style-mon-compte.css">

            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
            <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
            <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
                <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
    </head>
    <body>
        <div class="main-page">
                       <header class="head-page">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="titre-principale">SOS partenaires</h1>
                            </div>
                            <div class="col-md-2 col-md-offset-1">
                                 <p class="id"><?php echo 'Bonjour '.$id ;?></p></span>
                            </div>
                        </div>
                        <div class="row nav-section">
                            <div class="col-md-4">
                                <nav class="nav-left">
                                    <ul class="nav nav-pills">
                                        <li role="presentation"><a href="partenairesDispo.php" class="nav-haut">Partenaires disponibles</a></li>
                                    </ul>
                                </nav>
                            </div>

                            <div class="col-md-6 col-md-offset-2">
                                <nav class="nav-rigth">
                                    <ul class="nav nav-pills">
                                      <li role="presentation"><a href="mesSports.php" class="nav-haut">Mes sports</a></li>
                                      <li role="presentation" class="active"><a href="monCompte.php" class="nav-haut">Mon compte</a></li>
                                      <li role="presentation"><a href="deconnexion.php" class="nav-haut">Deconnexion</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
              </header>
                    <div class="container">
                        <div class="row">
                            <?php
                                $req_tel="select telephone from utilisateur where nom_utilisateur='$id'";
                                $res_tel=mysql_query($req_tel);
                                $ligne_tel=mysql_fetch_assoc($res_tel);
                                $req_email="select email from utilisateur where nom_utilisateur='$id'";
                                $res_email=mysql_query($req_email);
                                $ligne_email=mysql_fetch_assoc($res_email);
                                if(!$ligne_tel["telephone"] && !$ligne_email["email"])
                                {
                                    echo "<div class='col-md-12'><p>Vous n'avez renseigné  ni votre numéro de téléphone, ni votre email, rendez vous sur <a href='monCompte.php'>mon compte</a><br/>Vous devez renseigner ces informations avant de pourvoir apparaitre dans les recherches sur la page partenaires disponibles</p></div>";
                                } else if(!$ligne_tel["telephone"])
                                {
                                    echo "<div class='col-md-12'><p>Vous n'avez pas renseigné votre numéro de téléphone rendez vous sur <a href='monCompte.php'>mon compte</a><br/>Vous devez renseigner cette information avant de pourvoir apparaitre dans les recherches sur la page partenaires disponibles</p></div>";
                                } else if (!$ligne_email["email"])
                                {
                                    echo "<div class='col-md-12'><p>Vous n'avez pas renseigné votre email, rendez vous sur <a href='monCompte.php'>mon compte</a><br/>Vous devez renseigner cette information avant de pourvoir apparaitre dans les recherches sur la page partenaires disponibles</p></div>";
                                } else
                                {
                                    echo "<div class='col-md-12'><p>numéro de téléphone : 0".$ligne_tel["telephone"]."<br/>email : ".$ligne_email["email"]."</p></div>";
                                }

                                $req = "select * from utilisateur where nom_utilisateur='$id'";
                                $res = mysql_query($req);if (!$res) echo mysql_error();
                                $ligne = mysql_fetch_assoc($res);
                        ?>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <form method="post" action="monCompte.php">

                                <div class="form-group">
                                    <label for="change-nom">Nom</label>
                                    <input type="text" name="nom" class="form-control" id="change-nom" value=<?php echo $ligne["nom"]?>>
                                </div>

                                <div class="form-group">
                                    <label for="change-prenom">Prenom</label>
                                    <input type="text" name="prenom" class="form-control" id="change-prenom" value=<?php echo $ligne["prenom"]?>>
                                </div>

                                <input type="submit" name="envoyerNP" class="btn btn-default" value="Envoyer">
                            </form>
                            
                            <form method="post" action="monCompte.php">
                                
                                <div class="form-group">
                                    <label>Mot de passe</label>
                                    <input type="password" name = "mp" class="mp-class-inscription form-control" id="mp-inscription" placeholder="Entrez votre mot de passe">
                                </div>
                                
                                <div class="form-group">
                                    <label>Confirmation du mot de passe</label>
                                    <input type="password" name="mpConfirm" class="mp-confirm-class-inscription form-control" id="mp-confirm-insciption" placeholder="Entrez de nouveau votre mot de passe">
                                </div>
                                
                                <input type="submit" name="envoyerMP" class="btn btn-default" value="Envoyer">
                            </form>
                        </div>
                        
                        <?php
                            
                            if (isset($_POST["nom"])) $nom = $_POST["nom"];
                            if (isset($_POST["prenom"])) $prenom = $_POST["prenom"];
                            if (isset($_POST["mp"])) $mp = $_POST["mp"];
                            if (isset($_POST["mpConfirm"])) $mpConfirm = $_POST["mpConfirm"];
                            
                            if (isset($_POST["envoyerNP"])){
                                if ($nom && $prenom){
                                        $req1=("UPDATE utilisateur SET nom = '$nom', prenom = '$prenom' WHERE nom_utilisateur = '$id'");
                                        $res1 =mysql_query($req1);
                                        if(!$res1) { echo mysql_error();}
                                        else"Les modifications ont été enregistrées";
                                }
                                else echo "<p>Tous les champs ne sont pas remplis</p>";
                            }

                            if(isset($_POST["envoyerMP"])){
                                if ($mp && $mpConfirm){
                                    if ($mp == $mpConfirm){
                                        $req2=("UPDATE utilisateur SET mot_de_passe = '$mp' WHERE nom_utilisateur = '$id'");
                                        $res2= mysql_query($req2);
                                        if(!res2) echo mysql_error();
                                        else echo "<p>Les modifications ont été enregistrées</p>";
                                    }else echo "<p>Les mot de passe ne sont pas identiques";
                                }else echo "<p>Tous les champs ne sont pas remplis</p>";
                            }
                            
                        ?>
                        
                        <div class="col-md-6">
                            <form method="post" action="monCompte.php">
                                <div class="form-group">
                                    <label for="change-addresse">Adresse</label>
                                    <input type="text" name="adresse" class="form-control" id="change-addresse" value=<?php echo $ligne["adresse"]?>>
                                </div>

                                <div class="form-group">
                                    <label for="change-ville">Ville</label>
                                    <input type="text" name="ville" class="form-control" id="change-ville" value=<?php echo $ligne["ville"]?>>
                                </div>

                                <div class="form-group">
                                    <label for="change-cp">Code Postal</label>
                                    <input type="text" name="cp" class="form-control" id="change-cp" value=<?php echo $ligne["code_postal"]?>>
                                </div>

                                <input type="submit" name="envoyerVCP" class="btn btn-default" value="Envoyer">
                                
                            </form>
                        </div>
                        
                        <?php
                            
                            if (isset($_POST["ville"])) $ville = $_POST["ville"];
                            if (isset($_POST["cp"])) $cp = $_POST["cp"];
                            if (isset($_POST["adresse"])) $adresse = $_POST["adresse"];
                            
                            if (isset($_POST["envoyerVCP"])){
                                if ($adresse && $ville && $cp){
                                        $req3=("UPDATE utilisateur SET adresse = '$adresse', ville = '$ville', code_postal = '$cp' WHERE nom_utilisateur = '$id'");
                                        $res3= mysql_query($req3);
                                        if(!$res3) { echo mysql_error();}
                                        else echo "<p>Les modifications ont été enregistrées</p>";
                                }
                                else echo "<p>Tous les champs ne sont pas remplis</p>";
                            }
                        ?>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <form method="post" action="monCompte.php">
                                <div class="form-group">
                                    <label for="change-tel">Telephone</label>
                                    <input type="tel" name="tel" class="form-control" id="change-tel" value=<?php echo $ligne["telephone"]?>>
                                </div>
                                <input type="submit" name="envoyerTEL" class="btn btn-default" value="Envoyer">
                            </form>
                        </div>
                        <?php
                            
                            if (isset($_POST["tel"])) $tel = $_POST["tel"];
                            
                            if (isset($_POST["envoyerTEL"])){
                                if ($tel){
                                        $req4=("UPDATE utilisateur SET telephone = '$tel' WHERE nom_utilisateur = '$id'");
                                        $res4= mysql_query($req4);
                                        if(!$res4) { echo mysql_error();}
                                        else echo "<p>Les modifications ont été enregistrées</p>";
                                }
                                else echo "<p>Tous les champs ne sont pas remplis</p>";
                            }
                        ?>
                        
                        <div class="col-md-6">
                            <form method="post" action="monCompte.php">
                                <div class="form-group">
                                    <label for="change-email">Email</label>
                                    <input type="email" name="email" class="form-control" id="change-email" value=<?php echo $ligne["email"]?>>
                                </div>

                                 <input type="submit" name="envoyerEMAIL" class="btn btn-default" value="Envoyer">
                            </form>
                        </div>
                        
                        <?php
                            
                            if (isset($_POST["email"])) $email = $_POST["email"];
                            
                            if (isset($_POST["envoyerEMAIL"])){
                                if ($email){
                                        $req5=("UPDATE utilisateur SET email = '$email' WHERE nom_utilisateur = '$id'");
                                        $res5= mysql_query($req5);
                                        if(!$res5) echo mysql_error();
                                        else echo "<p>Les modifications ont été enregistrées</p>";
                                }
                                else echo "<p>Tous les champs ne sont pas remplis</p>";
                            }
                        ?>
                    </div>
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
    </body>
</html>