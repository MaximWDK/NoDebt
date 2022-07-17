<?php require 'php/modifierMDP.inc.php'; $statut='tout'; $nomPage='Modifier MDP'; require 'inc/header.inc.php'?>
        <main>
            <?php echo $_SESSION['message']?>
            <form class="inscription" method="post">
                <section class="labelInscription">
                    <h1>MODIFIER LE PROFIL</h1>
                    <label for="motPasse">Mot de passe*</label>
                    <input id="motPasse" name="motPasse" type="password" required placeholder="Votre mot de passe">
                    <label for="confirmerMotPasse">Confirmer le mot de passe*</label>
                    <input id="confirmerMotPasse" name="confirmerMotPasse" type="password" required placeholder="Confirmer mot de passe">
                </section>
                <section class="posBouton">
                    <button class="boutonPublier" type="submit" name="submit">Modifer</button>
                </section>
            </form>
        </main>
<?php require 'inc/footer.inc.php'?>