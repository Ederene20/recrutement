<?php
        header('Location: index.php');
        if (isset($_POST['id']) AND isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['email']) AND 
            isset($_POST['telephone']) AND isset($_POST['niveau_etude']) AND
            isset($_FILES['fichier']) AND $_FILES['fichier']['error']==0) {
            include('connexion.php');
            $infoFichier = pathinfo($_FILES['fichier']['name']);
            $extensionFichier = $infoFichier['extension'];
            $extensionAutorisee = array('pdf', 'docx');
            if (in_array($extensionFichier, $extensionAutorisee)) {
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
                move_uploaded_file($_FILES['fichier']['tmp_name'], "cvs/".basename($_FILES['fichier']['name']));
                echo "success";
            }
        }

        elseif ($_FILES['fichier']['size']==0) {
            echo "Aucun fichier n'a été soumis";
        }

        else {
            echo "Attention ! Veuillez remplir toutes les zones de saisies";
        }
?>