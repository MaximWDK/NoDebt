<?php $statut='tout'; $nomPage='Modifier Dépense'; require 'inc/checkConnexion.php'; require 'inc/header.inc.php'; require 'php/modifierDepense.inc.php' ?>
        <main>
            <?php if(isset($_SESSION['message'])) echo $_SESSION['message']?>
            <form class="inscription" method="post">
                <section class="labelInscription">
                    <h1>MODIFIER UNE DÉPENSE</h1>
                    <label for="dateHeure">Date*</label>
                    <input id="dateHeure" name="dateHeure" type="datetime-local" min="2016-06-07T00:00" autofocus required>
                    <label for="montant">Montant*</label>
                    <input id="montant" name="montant" type="number" required placeholder="Montant">
                    <label for="nom">Libellé*</label>
                    <input id="nom" name="libelle" type="text" required placeholder="Libellé">
                    <label>Scan - Facture</label>
                    <input id="facture" name="facture" type="file" accept=".png, .jpg, .pdf">
                </section>
                <section class="posBouton">
                    <button class="boutonPublier" name="submit" type="submit">Modifier</button>
                </section>
            </form>
        </main>
<?php require 'inc/footer.inc.php'?>