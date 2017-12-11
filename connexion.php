<?php

    
    include('connectDB.php');

    $id = $_POST["id-connexion"];
    $mp = $_POST["mp-connexion"];
    
if(!empty($id) && !empty($mp)) {
    $req =( "SELECT mot_de_passe FROM utilisateur WHERE nom_utilisateur = '$id'");
    $res =mysql_query($req);
    if(!$res) echo "nous avons rencontré un problème !!!";
        else {
            $ligne = mysql_fetch_assoc($res);
                if($ligne['mot_de_passe'] == $mp){
                    session_start();
                    $_SESSION["id"] = $id;
                    header("location:partenairesDispo.php");
                }else header("location:index.php?erreur4=1");
            }
    } else header("location:index.php?erreur5=1");
?>