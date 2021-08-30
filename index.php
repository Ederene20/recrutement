<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Liste des candidats</title>
</head>
<body>

    <h1>Liste des candidats</h1>

    <?php
            require('connexion.php');
            $list = $bdd->query('SELECT * FROM cvs');
    ?>

    <a href="create.php" class="btn btn-primary" style="margin-left: 1250px;">Nouveau</a>

    <br><br>

    <table class="table table-bordered border-light table-hover container">
        <thead class="table-light">
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Telephone</th>
                <th scope="col">Email</th>
                <th scope="col">Niveau d'étude</th>
                <th scope="col">Fichier</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($donnee = $list->fetch()) {
                    ?>
                    
                    <tr>

                    <div class="modal fade" id="P<?php echo $donnee['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title" id="exampleModalLabel">Attention !</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                     </button>
                                </div>
                                <div class="modal-body">
                                    Cette action est irréversible. Voulez-vous vraiment supprimer ce projet ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                                    <a class="btn btn-danger" href="<?php echo "delete.php?id=".$donnee['id']; ?>">Oui</a>
                                </div>
                            </div>
                        </div>
                    </div>

                        <td>
                            <?php  echo $donnee['nom']; ?>
                        </td>
                        <td>
                            <?php  echo $donnee['prenom']; ?>
                        </td>
                        <td>
                            <?php  echo $donnee['telephone']; ?>
                        </td>
                        <td>
                            <?php  echo $donnee['email']; ?>
                        </td>
                        <td>
                            <?php  echo $donnee['niveau_etude'];?>
                        </td>
                        <td>
                            <a href="<?php  echo $donnee['fichier']; ?>" target="blank">Fichier</a>
                        </td>
                        
                        <td style="display: flex; justify-content: space-around">
                            <a href="<?php echo "edit.php?id=".$donnee['id']; ?>" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16" style="color: white">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </a>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="<?php echo "#P".$donnee['id']; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16" style="color: white">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                            </button>
                        </td>
                    </tr>

            <?php
                };
            ?>
        </tbody>
    </table>
    
</body>
</html>