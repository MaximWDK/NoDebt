<?php ob_start(); $statut='tout'; $nomPage='Confirmation Solde'; require 'inc/checkConnexion3.php'; require 'inc/header.inc.php'?>
        <main>
            <section class="inscription">
                <header>
                    <h1>Voulez-vous vraiment solder ce groupe ?</h1>
                    <section class="membres3">
                        <section class="membres4">
                            <img src="images/profil_1.png" alt="image profil" width="80" height="80">
                            <h3>Maxim Léonet devra 208.33€ à RB_NewPokeaS et 233.33€ à Slyway</h3>
                        </section>
                    </section>
                </header>
                <section class="suppression">
                    <form action="groupe.php">
                        <button class="boutonPublier" id="supprimer" type="submit">Oui</button>
                        <button class="boutonPublier" id="garder" type="submit">Non</button>
                    </form>
                </section>
            </section>
        </main>
<?php require 'inc/footer.inc.php'?>