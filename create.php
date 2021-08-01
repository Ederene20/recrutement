<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Create</title>
</head>
<body class="container">

        <h1>Nouveau candidat</h1>
    
        <form action="store.php" method="post" class="container" enctype="multipart/form-data">

            <div class="row mb-3">
                <label for="nom" class="col-form-label col-sm-2">Nom : </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Nom du candidat" id="nom" name="nom">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-form-label col-sm-2" for="prenom">Prenom : </label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="prenom" name="prenom" placeholder="Prenom du candidat">
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="col-form-label col-sm-2">Email : </label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email du candidat">
                </div>
            </div>

            <div class="row mb-3">
                <label for="telephone" class="col-form-label col-sm-2">Telephone</label>
                <div class="col-sm-10">
                    <input type="text" id="telephone" name="telephone" class="form-control" placeholder="Contact telephonique du candidat">
                </div>
            </div>

            <div class="row mb-3">
                <label for="niveau_etude" class="col-form-label col-sm-2">Niveau d'etude : </label>
                <div class="col-sm-10">
                    <input type="text" id="niveau_etude" name="niveau_etude" class="form-control" placeholder="Niveau d'etude">
                </div>
            </div>

            <div class="row mb-3">
                <label for="fichier" class="col-form-label col-sm-2">Fichier : </label>
                <div class="col-sm-10">
                    <input type="file" id="fichier" name="fichier" class="form-control" value="">
                </div>
            </div>

            <div class="row mb-3 justify-content-around">
                <input type="reset" value="Annuler" reset class="col-sm-2 btn btn-secondary">
                <input type="submit" value="Enregistrer" class="col-sm-2 btn btn-success">
            </div>

        </form>

</body>
</html>