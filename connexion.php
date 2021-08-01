<?php

        // Make the connection with the database `recrutementbd`
        try {
              $bdd = new PDO('mysql:host=localhost;dbname=recrutementbD;charset=utf8', 'root', '');
        }

        catch (Exception $e) {
                    die('Erreur : ' .$e->getMessage());
        }


?>