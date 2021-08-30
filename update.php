<?php
        header('Location: index.php');
        if (isset($_POST['id']) AND isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['email']) AND 
            isset($_POST['telephone']) AND isset($_POST['niveau_etude'])) {
            include('connexion.php');
            
            if(isset($_FILES['fichier']) AND $_FILES['fichier']['error']==0){
                $infoFichier = pathinfo($_FILES['fichier']['name']);
                $extensionFichier = $infoFichier['extension'];
                $extensionAutorisee = array('pdf', 'docx');
                if (in_array($extensionFichier, $extensionAutorisee)) {
                    move_uploaded_file($_FILES['fichier']['tmp_name'], "cvs/".basename($_FILES['fichier']['name']));
                }  
                $update = $bdd->prepare('UPDATE cvs SET nom=:nom, prenom=:prenom, email=:email, telephone=:telephone,
                niveau_etude=:niveau_etude,fichier=:fichier WHERE id=:id');  
                $update->execute(
                array(
                        "id" => $_POST['id'],
                        "nom" => $_POST['nom'],
                        "prenom" => $_POST['prenom'],
                        "email" => $_POST['email'],
                        "telephone" => $_POST['telephone'],
                        "niveau_etude" => $_POST['niveau_etude'],
                        "fichier" => "cvs/".basename($_FILES['fichier']['name'])
                )
                );  
                
            }else{

                $update = $bdd->prepare('UPDATE cvs SET nom=:nom, prenom=:prenom, email=:email, telephone=:telephone,
                niveau_etude=:niveau_etude WHERE id=:id');  
                $update->execute(
                array(
                        "id" => $_POST['id'],
                        "nom" => $_POST['nom'],
                        "prenom" => $_POST['prenom'],
                        "email" => $_POST['email'],
                        "telephone" => $_POST['telephone'],
                        "niveau_etude" => $_POST['niveau_etude'])
                );  

            }
        }
?>