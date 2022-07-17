<?php require 'php/suppressionProfil.inc.php'; require 'inc/header.inc.php'?>
        <main>
            <section class="inscription">
                <header>
                    <h1>Voulez-vous vraiment supprimer le profil "<?php if(isset($_SESSION['prenom'])) { echo $_SESSION['prenom'];}?>" ?</h1>
                </header>
                <section class="suppression">
                    <form method="post">
                        <button class="boutonSupprimer" id="supprimer" type="submit" name="submit">Supprimer</button>
                        <button class="boutonPublier" id="garder" type="submit" name="nosubmit">Annuler</button>
                    </form>
                </section>
            </section>
        </main>
<?php require 'inc/footer.inc.php'?>