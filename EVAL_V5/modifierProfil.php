<?php require 'php/modifierProfil.inc.php'; $statut='tout'; $nomPage='Modifier Profil'; require 'inc/header.inc.php'?>
        <main>
            <?php echo $_SESSION['message']?>
            <form class="inscription" method="post">
                <section class="labelInscription">
                    <h1>MODIFIER LE PROFIL</h1>
                    <label for="nom">Nom*</label>
                    <input id="nom" name="nom" type="text" required placeholder="Votre nom" value="<?php if(isset($_SESSION['nom'])){echo $_SESSION['nom'];}?>">
                    <label for="prénom">Prénom*</label>
                    <input id="prénom" name="prenom" type="text" required placeholder="Votre prénom" value="<?php if(isset($_SESSION['prenom'])){echo $_SESSION['prenom'];}?>">
                    <label for="courriel">Courriel*</label>
                    <input id="courriel" name="courriel" type="email" placeholder="Votre courriel" value="<?php if(isset($_SESSION['courriel'])){echo $_SESSION['courriel'];}?>">
                </section>
                <section class="posBouton">
                    <button class="boutonPublier" type="submit" name="submit">Modifer</button>
                </section>
            </form>
        </main>
<?php require 'inc/footer.inc.php'?>