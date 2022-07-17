<?php $statut='tout'; $nomPage='Dépense'; require 'inc/checkConnexion.php'; require 'inc/header.inc.php'?>
        <main>
            <section class="titleIndex">
                <header>
                    <h1>Afficher une dépense</h1>
                </header>
            </section>
            <header class="groupes">
                <article class="exception">
                    <section class="groupes3">
                        <h2>Dépense sélectionnée</h2>
                    </section>
                    <table class="depense">
                        <thead>
                            <tr>
                                <th>Utilisateur</th>
                                <th>Achat + Prix</th>
                                <th>Afficher Facture</th>
                                <th>Modifier Dépense</th>
                                <th>Supprimer Dépense</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <img src="images/profil_3.png" alt="image profil" width="80" height="80">
                                <h3>Slyway</h3>
                            </td>
                            <td>KFC (35€)</td>
                            <td>
                                <form action="images/facture.pdf" target="_blank">
                                    <button class="boutonBlanc" type="submit">Voir la facture</button>
                                </form>
                            </td>
                            <td>
                                <form action="modifierDepense.php">
                                    <button class="boutonBlanc" type="submit">Modifier</button>
                                </form>
                            </td>
                            <td>
                                <form action="suppressionDepense.php">
                                    <button class="boutonBlanc" type="submit">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </article>
            </header>
        </main>
<?php require 'inc/footer.inc.php'?>