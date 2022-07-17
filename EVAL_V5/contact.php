<?php session_start(); require 'inc/checkConnexion2.php'; $nomPage='Nous Contacter'; require 'inc/header.inc.php'?>
        <main>
            <form action="index.php" class="inscription">
                <section class="labelInscription">
                    <h1>CONTACTER UN ADMINISTRATEUR</h1>
                    <section class="courrielSujet">
                        <label for="courriel">Courriel*</label>
                        <input id="courriel" name="courriel" type="email" autofocus required placeholder="Votre courriel" value="<?php if(isset($_SESSION['courriel'])){echo $_SESSION['courriel'];}?>">
                        <label for="sujet">Sujet*</label>
                        <input id="sujet" name="sujet" type="text" required placeholder="Sujet">
                    </section>
                    <label for="message">Message*</label>
                    <textarea id="message" name="message" rows="1" cols="20" required="" placeholder="Votre message"></textarea>
                    <label>Ajouter un fichier (facultatif)</label>
                    <input class="facture" id="fichier" name ="fichier" type="file" accept=".png, .jpg">
                </section>
                <section class="posBouton">
                    <button class="boutonPublier" type="submit">Publier</button>
                </section>
            </form>
        </main>
<?php require 'inc/footer.inc.php'?>