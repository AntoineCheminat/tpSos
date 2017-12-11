<?php 
    include("connectDB.php");
    session_start();
    $id = $_SESSION["id"];
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
        <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/style-partenaire-dispo.css">
        
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
                                        <li role="presentation" class="active"><a href="partenairesDispo.php" class="nav-haut">Partenaires disponibles</a></li>
                                    </ul>
                                </nav>
                            </div>

                            <div class="col-md-6 col-md-offset-2">
                                <nav class="nav-rigth">
                                    <ul class="nav nav-pills">
                                      <li role="presentation"><a href="mesSports.php" class="nav-haut">Mes sports</a></li>
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
                                    echo "<div class='col-md-12'><p class='info'>Vous n'avez renseigné  ni votre numéro de téléphone, ni votre email, rendez vous sur <a href='monCompte.php'>mon compte</a><br/>Vous devez renseigner ces informations avant de pourvoir apparaitre dans les recherches sur la page partenaires disponibles</p></div>";
                                } else if(!$ligne_tel["telephone"])
                                {
                                    echo "<div class='col-md-12'><p class='info'>Vous n'avez pas renseigné votre numéro de téléphone rendez vous sur <a href='monCompte.php'>mon compte</a><br/>Vous devez renseigner cette information avant de pourvoir apparaitre dans les recherches sur la page partenaires disponibles</p></div>";
                                } else if (!$ligne_email["email"])
                                {
                                    echo "<div class='col-md-12'><p class='info'>Vous n'avez pas renseigné votre email, rendez vous sur <a href='monCompte.php'>mon compte</a><br/>Vous devez renseigner cette information avant de pourvoir apparaitre dans les recherches sur la page partenaires disponibles</p></div>";
                                } else
                                {
                                    echo "<div class='col-md-12'><p class='info'>numéro de téléphone : 0".$ligne_tel["telephone"]."<br/>email : ".$ligne_email["email"]."</p></div>";
                                }
                            ?>
                      </div>
                      
                        <?php
                                        $req_id = "select id_utilisateur from utilisateur where nom_utilisateur='$id'";
                                        $res_id= mysql_query($req_id); if(!$res_id) echo mysql_error();
                                        $ligne = mysql_fetch_assoc($res_id);
                                        $id_utilisateur = $ligne["id_utilisateur"]; 
                                        $req = "select sport from recherche where id='$id_utilisateur'";
                                        $res = mysql_query($req);if (!$res) echo mysql_error();
                                        $ligne2 = mysql_fetch_assoc($res);               

                                        if(!empty($ligne2["sport"])) {
                                            echo "<div class='row'>";
                                            echo "<div class='col-md-12'>";
                                            echo "<form method='post' action='partenairesDispo.php' class='form-select'>";
                                            echo "<select name='sport_choix' class='sport'";
                                            
                                            while($ligne2)
                                                {
                                                    echo "<option value='".$ligne2["sport"]."'>".$ligne2["sport"]."</option>";
                                                    $ligne2 = mysql_fetch_assoc($res);
                                                }
                                            echo "</select>";
                                            echo "<input type='submit' name='rechercher' class='btn btn-default' value='rechercher'>";
                                            echo "</form>";
                                            echo "</div>";
                                            echo "</div>";
                                        } else echo "vous n'avez renseigné aucun sport, rendez-vous dans la rubrique <a href='mesSports.php'>mes sports</a> ";
                                    ?>

                      <div class="row">
                              <?php
                                        if(isset($_POST["rechercher"])) {
                                            $sport_choix=$_POST["sport_choix"];
                                            $req1="select distinct id from recherche where sport='$sport_choix'";
                                            $res1=mysql_query($req1);
                                            $ligne3=mysql_fetch_assoc($res1);
                                            if(mysql_num_rows($res1)>1) {
                                                echo "<div class='col-md-12'><table class='table table-select'>";
                                                echo "<tr>
                                                            <th> Identifiant </th>
                                                            <th> Lieu </th>
                                                            <th> téléphone </th>
                                                            <th>email</th>
                                                    </tr>";
                                                while($ligne3)
                                                {
                                                $affiche= $ligne3["id"];
                                                $req2="SELECT nom_utilisateur,telephone,email FROM utilisateur WHERE id_utilisateur='$affiche'";
                                                $res2=mysql_query($req2); if(!$res2) echo mysql_error();
                                                $ligne4=mysql_fetch_assoc($res2);

                                                $req3="SELECT lieu FROM recherche WHERE id = '$affiche' AND sport='$sport_choix'";
                                                $res3=mysql_query($req3);
                                                $ligne5=mysql_fetch_assoc($res3);
                                                    if($ligne4["nom_utilisateur"] != $id && $ligne4["telephone"] && $ligne4["email"])
                                                    {
                                                    echo "<tr>
                                                            <td>".$ligne4["nom_utilisateur"]."</td>
                                                            <td>".$ligne5["lieu"]."</td>
                                                            <td>".$ligne4["telephone"]."</td>
                                                            <td>".$ligne4["email"]."</td>
                                                        </tr>"; 
                                                    }
                                                    $ligne3=mysql_fetch_assoc($res1);
                                                }
                                                echo "</table></div>";
                                                } else  {
                                                            echo "<div class='col-md-8 col-md-offset-4'><p> Aucun partenaire trouvé pour le moment... </p>                                                                        </div>";
                                                        }
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
    
    <script type="text/javascript">
        $(".sport").select2(); 
    </script>
    
</html>