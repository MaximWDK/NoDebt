<?php ob_start(); $statut='tout'; $nomPage='Suppression Groupe'; require 'inc/checkConnexion4.php'; require 'inc/header.inc.php'; require 'php/accepterInvitation.inc.php'?>
        <main>
            <section class="inscription">
                <?php if(isset($_SESSION['message'])) echo $_SESSION['message']?>
                <header>
                    <h1>Voulez-vous vraiment accepter cette invitation ?</h1>
                </header>
                <section class="suppression">
                    <form method="post">
                        <button class="boutonPublier" name="submit" id="supprimer" type="submit">Accepter</button>
                        <button class="boutonSupprimer" name="noSubmit" id="garder" type="submit">Annuler</button>
                    </form>
                </section>
            </section>
        </main>
<?php require 'inc/footer.inc.php'?>