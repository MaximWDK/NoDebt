<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <title>NoDebt - <?php echo $nomPage?></title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    </head>
    <body>
    <div class="navBarre"></div>
        <header>
            <a href="index.php">
                <img src="images/logo.png" alt="logo" width="50" height="50">
            </a>
            <?php if($statut == 'partie'){require ('inc/menuPartie.inc.php');}elseif($statut == 'tout'){require ('inc/menuTout.inc.php');}?>
        </header>