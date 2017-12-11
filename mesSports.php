<?php 
    session_start();
    $id = $_SESSION["id"];
    include("connectDB.php"); 
    $req_id = "select id_utilisateur from utilisateur where nom_utilisateur='$id'";
    $res_id= mysql_query($req_id); if(!$res_id) echo mysql_error();
    $ligne = mysql_fetch_assoc($res_id);
    $id_utilisateur = $ligne["id_utilisateur"]; 
?>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SOS partenaires - Venez rencontrer d'autres sportifs</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/style-mes-sports.css">
        
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
                                      <li role="presentation" class="active"><a href="mesSports.php" class="nav-haut">Mes sports</a></li>
                                      <li role="presentation"><a href="monCompte.php" class="nav-haut">Mon compte</a></li>
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
                            ?>
                        </div>
                        <div class="row">
                            <?php
                                $res4=  "SELECT sport, niveau, lieu FROM recherche WHERE id='$id_utilisateur'";
                                $req4=mysql_query($res4);
                                $ligne4=mysql_fetch_assoc($req4);
                                if(!$ligne4) {
                                    echo "<div class='col-md-8 col-md-offset-4'><p>Aucun sport pour le moment...</p></div>";
                                } else {
                                    echo "<div class='col-md-12'>
                                            <table class='table'>
                                                <h3>Vos sports</h3>
                                                    <tr>
                                                        <th> sport </th>
                                                        <th> niveau </th>
                                                        <th> lieu </th>
                                                    </tr>";
                                    while($ligne4) {
                                        echo "<tr>
                                                <td>".$ligne4["sport"]."</td>
                                                <td>".$ligne4["niveau"]."</td>
                                                <td>".$ligne4["lieu"]."</td>
                                            </tr>";
                                                $ligne4=mysql_fetch_assoc($req4);
                                    }echo "</table></div>";
                                }
                                    
                            ?>
                        </div>
                        <div class="row">
                            <form method="post" action="mesSports.php">
                                <div class="col-md-3">
                                    <label>Sports</label>
                                    <select name="sport_selection" class="sport">
                                    <?php
                                
                                        $req1 = "SELECT nom FROM sport";
                                        $res1 = mysql_query($req1);
                                        $ligne1 =mysql_fetch_assoc($res1);
                                        if(!$res1) echo mysql_error();

                                        while($ligne1){
                                            $sport = $ligne1["nom"];
                                            echo '<option value="'.$sport.'">'.$sport.'</option>';
                                            $ligne1 = mysql_fetch_assoc($res1);
                                        }
                                    ?>  
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>Niveau</label>
                                    <?php
                                        $req2 = "SELECT niveau FROM niveau";
                                        $res2 = mysql_query($req2);
                                        $ligne2 =mysql_fetch_assoc($res2);

                                        if(!$res2) echo mysql_error();
                                        echo '<select name="niveau_selection" class="niveau">';
                                    
                                        while($ligne2){
                                            $niveau = $ligne2["niveau"];
                                            echo '<option value="'.$niveau.'">'.$niveau.'</option>';
                                            $ligne2 = mysql_fetch_assoc($res2);
                                        }
                                    ?>  
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>Lieu</label>
                                    <input type="text" name="lieu" placeholder="Lieu d'entrainement" />
                                </div>
                                <div class="col-md-3">
                                    <input type="submit" name="envoyer" class="btn btn-default" value="Envoyer">
                                </div>
                            </form>
                            <?php
                                if(isset($_POST["envoyer"]))
                                {
                                    $sport_selection = $_POST["sport_selection"];
                                    $niveau_selection = $_POST["niveau_selection"];
                                    $lieu = $_POST["lieu"];     
                                    $req3="insert into recherche values('$id_utilisateur','$sport_selection','$niveau_selection','$lieu')";
                                    $res3=mysql_query($req3);
                                    echo "Votre ajout à été enregistré";
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

        <script type="text/javascript">
            $(".sport").select2();
            $(".niveau").select2();
        </script> 
    </body>
</html>