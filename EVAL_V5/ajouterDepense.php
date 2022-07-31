<?php $statut='tout'; $nomPage='Ajouter Dépense'; require 'inc/checkConnexion3.php'; require 'inc/header.inc.php'; require 'php/ajouterDepense.inc.php' ?>
        <main>
            <?php if(isset($_SESSION['message'])) echo $_SESSION['message']?>
            <form class="inscription" method="post">
                <section class="labelInscription">
                    <h1>AJOUTER UNE DÉPENSE</h1>
                    <label for="dateHeure">Date*</label>
                    <input id="dateHeure" name="dateHeure" type="datetime-local" min="2016-06-07T00:00" autofocus required>
                    <label for="montant">Montant*</label>
                    <input id="montant" name="montant" step="0.01" type="number" required placeholder="Montant">
                    <label for="nom">Libellé*</label>
                    <input id="nom" name="libelle" type="text" required placeholder="Libellé">
                    <label for="tag">Tag*</label>
                    <input id="tag" name="tag" type="text" required placeholder="Tag">
                </section>
                <section class="posBouton">
                    <button class="boutonPublier" name="submit" type="submit">Valider</button>
                </section>
            </form>
        </main>
<?php require 'inc/footer.inc.php'?>