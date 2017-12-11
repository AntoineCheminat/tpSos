<?php
                                if(isset($_POST["envoyer"]))
                                {
                                    $sport_selection = $_POST["sport_selection"];
                                    $niveau_selection = $_POST["niveau_selection"];
                                    $lieu = $_POST["lieu"];     
                                    $req3="insert into recherche values('$id_utilisateur','$sport_selection','$niveau_selection','$lieu')";
                                    $res3=mysql_query($req3);
                                    header('location:mesSports.php?ajout=1');
                                }
?>
