 <?php

    include("connectDB.php");

    $id = $_POST["id"];
    $mp = $_POST["mp"];
    $confirm_mp = $_POST["mp-confirm"];



    
if (!empty($id) && !empty($mp) && !empty($confirm_mp)){
    $req_id = "select * from utilisateur where nom_utilisateur='$id'";
    $res_id = mysql_query($req_id);
    if (mysql_num_rows($res_id) >= 1){header("location:index.php?erreur=1");}
    
    else if ($mp == $confirm_mp){
        $req = "insert into utilisateur (nom_utilisateur, mot_de_passe)
				values ('$id', '$mp')";
        $res = mysql_query($req);
        if(!$res) echo mysql_error();
        else {
            session_start();
            $_SESSION["id"] = $id;
		  header("location:partenairesDispo.php");
        }    
    }else header("location:index.php?erreur2=1");
}else header("location:index.php?erreur3=1");
    
?>