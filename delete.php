<?php
        header('Location: index.php');
        if (isset($_GET['id'])) {
            include('connexion.php');
            $del = $bdd->prepare('DELETE FROM cvs WHERE id=:id');
            $del->execute(
                    array(
                        "id" => $_GET['id']
                    )
            );
        }
?>