<nav>
    <ul class="menu">
        <li class="<?php if($nomPage=='Accueil') {echo 'pageOuverte';}else{echo 'nonOuverte';}?>"><a href="index.php">Accueil</a></li>
        <li class="<?php if($nomPage=='Nous Contacter') {echo 'pageOuverte';}else{echo 'nonOuverte';}?>"><a href="contact.php">Nous contacter</a></li>
        <li class="<?php if($nomPage=='Création Groupe') {echo 'pageOuverte';}else{echo 'nonOuverte';}?>"><a href="creerGroupe.php">Créer un groupe</a></li>
    </ul>
    <section class="profilBulle">
        <a href="profil.php"><img src="images/profil_<?php if(isset($_SESSION['pdp']) && $_SESSION['pdp'] == 1){echo $_SESSION['uid'];} else {echo "default";}?>.png" alt="image profil" title="<?php if(isset($_SESSION['prenom']) && isset($_SESSION['nom'])){ echo $_SESSION['prenom'].' '.$_SESSION['nom'];}?>" width="30" height="30"></a>
    </section>
    <form action="deconnexion.php" class="posBouton">
        <button class="boutonPublier" type="submit">Se déconnecter</button>
    </form>
</nav>