<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Vérification du mot de passe</title>
</head>

<body>

    <?php
    if (isset($_POST['mot_de_passe']) and $_POST['mot_de_passe'] ==  "password") // Si le mot de passe est bon
    {
        // On affiche les codes
    ?>

        <p>
            on peut voir
        </p>
    <?php
    } else // Sinon, on affiche un message d'erreur
    {
        echo '<p>Mot de passe incorrect</p>';
    }
    ?>


</body>

</html>