<?php $statut='tout'; $nomPage='Recherche Avancée'; require 'inc/checkConnexion.php'; require 'inc/header.inc.php'?>
        <main>
            <form action="depense.php" class="inscription" method="post">
                <section class="labelInscription">
                    <h1>RECHERCHE AVANCÉE</h1>
                    <label for="nom">Libellé</label>
                    <input id="nom" name="nom" type="text" autofocus placeholder="Libellé">
                    <label for="montantmin">Montant Minimum</label>
                    <input id="montantmin" name="montantmin" type="number" placeholder="Montant minimum">
                    <label for="montantmax">Montant Maximum</label>
                    <input id="montantmax" name="montantmax" type="number" placeholder="Montant maximum">
                    <label for="datedebut">Date début</label>
                    <input id="datedebut" name="datedebut" type="date">
                    <label for="datefin">Date fin</label>
                    <input id="datefin" name="datefin" type="date">
                    <label for="tags">Tags</label>
                    <input id="tags" name="tags" type="text" placeholder="Tags">
                    <label for="prenom">Prénom du participant</label>
                    <select id="prenom" name="prenom">
                        <option value="">Choisissez un participant</option>
                        <option value="maxim">Maxim</option>
                        <option value="rb_newpokeas">RB_NewPokeaS</option>
                        <option value="slyway">Slyway</option>
                        <option value="drseballot">DrSeballot</option>
                        <option value="mega">Mega</option>
                    </select>
                </section>
                <section class="posBouton">
                    <button class="boutonPublier" type="submit">Valider</button>
                </section>
            </form>
        </main>
<?php require 'inc/footer.inc.php'?>