<?php

        "<pre>".print_r($_POST)."<pre>";
        "<pre>".print_r($_FILES)."<pre>";

        if (isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['email']) AND 
            isset($_POST['telephone']) AND  isset($_POST['niveau_etude']) AND
            isset($_FILES['fichier']) AND $_FILES['fichier']['error']==0) 
        {
                echo 1;
                $infosFichier = pathinfo($_FILES['fichier']['name']);
                $extensionFichier = $infosFichier['extension'];
                $extensionsAutorisees = array('pdf', 'docx');
                echo $extensionFichier;
                if (in_array($extensionFichier, $extensionsAutorisees)) {

                    include('connexion.php');
                    $store = $bdd->prepare('INSERT INTO cvs(nom, prenom, email, telephone, niveau_etude, 
                            fichier) VALUES(:nom, :prenom, :email, :telephone, :niveau_etude, :fichier)');
                    $store->execute(
                        array(
                            'nom' => $_POST['nom'],
                            'prenom' => $_POST['prenom'],
                            'email' => $_POST['email'],
                            'telephone' => $_POST['telephone'],
                            'niveau_etude' => $_POST['niveau_etude'],
                            'fichier' => "cvs/" . basename($_FILES['fichier']['name'])
                        )
                        );

                    echo "Tout va bien";

                    move_uploaded_file($_FILES['fichier']['tmp_name'], "cvs/". basename($_FILES['fichier']['name']));

                }

        }

        else {
            echo "Erreur";
        }


        
?>