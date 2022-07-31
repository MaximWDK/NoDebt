<?php $statut='tout'; $nomPage='Modifier Dépense'; require 'inc/checkConnexion5.php'; require 'php/modifierDepense.inc.php'; require 'inc/header.inc.php'?>
        <main>
            <?php if(isset($_SESSION['message'])) echo $_SESSION['message']?>
            <form class="inscription" method="post">
                <section class="labelInscription">
                    <h1>MODIFIER UNE DÉPENSE</h1>
                    <label for="dateHeure">Date*</label>
                    <input id="dateHeure" name="dateHeure" type="datetime-local" min="2016-06-07T00:00" autofocus required value="<?php if(isset($depense->dateHeure)){echo $depense->dateHeure;}?>">
                    <label for="montant">Montant*</label>
                    <input id="montant" name="montant" step="0.01" type="number" required placeholder="Montant" value="<?php if(isset($depense->montant)){echo $depense->montant;}?>">
                    <label for="nom">Libellé*</label>
                    <input id="nom" name="libelle" type="text" required placeholder="Libellé" value="<?php if(isset($depense->libelle)){echo $depense->libelle;}?>">
                    <label for="tag">Tag*</label>
                    <input id="tag" name="tag" type="text" required placeholder="Tag" value="<?php if(isset($newTag->tag)){echo $newTag->tag;}?>">
                </section>
                <section class="posBouton">
                    <button class="boutonPublier" name="submit" type="submit">Modifier</button>
                </section>
            </form>
        </main>
<?php require 'inc/footer.inc.php'?>