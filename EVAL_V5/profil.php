<?php $statut='tout'; $nomPage='Profil'; require 'inc/checkConnexion.php'; require 'inc/header.inc.php'?>
        <main>
            <section class="profil">
                <header>
                    <h1>Mon profil</h1>
                </header>
                <section class="infos">
                    <h2>Nom: <?php if(isset($_SESSION['nom'])){echo $_SESSION['nom'];}?></h2>
                    <h2>Prénom: <?php if(isset($_SESSION['prenom'])){echo $_SESSION['prenom'];}?></h2>
                    <h2>Email: <?php if(isset($_SESSION['courriel'])){echo $_SESSION['courriel'];}?></h2>
                </section>
                <section class="posBoutonFacture">
                    <form action="modifierProfil.php" class="posBoutonProfil">
                        <button class="boutonPublier" type="submit">Modifier mon profil</button>
                    </form>
                    <form action="modifierMDP.php" class="posBoutonProfil">
                        <button class="boutonPublier" type="submit">Modifier mon MDP</button>
                    </form>
                    <form action="suppressionProfil.php" class="posBoutonProfil">
                        <button class="boutonSupprimer" type="submit">Supprimer mon profil</button>
                    </form>
                </section>
            </section>
        </main>
<?php require 'inc/footer.inc.php'?>