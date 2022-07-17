<?php $statut='tout'; $nomPage='Versements'; require 'inc/checkConnexion.php'; require 'inc/header.inc.php'?>
        <main>
            <section class="inscription">
                <header>
                    <h1>Confirmez-vous avoir reçu ces versements ?</h1>
                </header>
                <section class="membres3">
                    <section class="membres4">
                        <img src="images/profil_1.png" alt="image profil" width="80" height="80">
                        <h3>Maxim Léonet a versé 208.33€ à RB_NewPokeaS</h3>
                    </section>
                </section>
                <section class="suppression">
                    <form action="groupe.php">
                        <button class="boutonPublier" name="confirmer" type="submit">Confirmer</button>
                    </form>
                </section>
                <section class="membres3">
                    <section class="membres4">
                        <img src="images/profil_1.png" alt="image profil" width="80" height="80">
                        <h3>Maxim Léonet a versé 233.33€ à Slyway</h3>
                    </section>
                </section>
                <section class="suppression">
                    <form action="groupe.php">
                        <button class="boutonPublier" name="confirmer" type="submit">Confirmer</button>
                    </form>
                </section>
            </section>
        </main>
<?php require 'inc/footer.inc.php'?>