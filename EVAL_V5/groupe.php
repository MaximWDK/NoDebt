<?php $statut='tout'; $nomPage='Groupe'; require 'inc/checkConnexion.php'; require 'inc/header.inc.php'?>
        <main>
            <header class="titleIndex">
                <h1>Groupe de Maxim Léonet</h1>
            </header>
            <section class="groupes">
                <section class="groupeCouleur">
                    <section class="exception">
                        <section class="groupes2">
                            <h2>Dépenses par membre</h2>
                            <section class="posBoutonsGroupes">
                                <form action="invitation.php">
                                    <button class="boutonPublier" type="submit">Ajouter un membre</button>
                                </form>
                                <form action="editerGroupe.php">
                                    <button class="boutonPublier" type="submit">Modifier le groupe</button>
                                </form>
                                <form action="suppressionGroupe.php">
                                    <button class="boutonSupprimer" type="submit">Supprimer le groupe</button>
                                </form>
                            </section>
                        </section>
                        <table class="depense">
                            <thead>
                                <tr>
                                    <th>Utilisateur</th>
                                    <th>Dépenses totales</th>
                                    <th>Différence</th>
                                </tr>
                                </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <section class="membres2">
                                            <img src="images/profil_1.png" alt="image profil" width="80" height="80">
                                            <h3>Maxim Léonet</h3>
                                        </section>
                                    </td>
                                    <td>800€</td>
                                    <td>+441.66€</td>
                                </tr>
                                <tr>
                                    <td>
                                        <section class="membres2">
                                            <img src="images/profil_2.png" alt="image profil" width="80" height="80">
                                            <h3>RB_NewPokeaS</h3>
                                        </section>
                                    </td>
                                    <td>150€</td>
                                    <td>-208.33€</td>
                                </tr>
                                <tr>
                                    <td>
                                        <section class="membres2">
                                            <img src="images/profil_3.png" alt="image profil" width="80" height="80">
                                            <h3>Slyway</h3>
                                        </section>
                                    </td>
                                    <td>125€</td>
                                    <td>-233.33€</td>
                                </tr>
                            </tbody>
                        </table>
                    </section>
                </section>
                <section class="groupeCouleur">
                    <section class="exception">
                        <section class="groupes2">
                            <h2>Dépenses totales: 1075€</h2>
                            <form class="search" action="depense.php">
                                <input type="search" id="recherche" name="recherche" placeholder="Rechercher">
                                <button>
                                    <i class="material-icons">search</i>
                                </button>
                            </form>
                            <form action="rechercheAvancee.php">
                                <button class="boutonPublier" type="submit">Recherche Avancée</button>
                            </form>
                            <form action="versements.php">
                                <button class="boutonPublier" type="submit">Liste des versements</button>
                            </form>
                            <form action="solder.php">
                                <button class="boutonPublier" type="submit">Solder le groupe</button>
                            </form>
                            <form action="annulerSolde.php">
                                <button class="boutonSupprimer" type="submit">Annuler le solde</button>
                            </form>
                        </section>
                        <table class="depense">
                            <thead>
                                <tr>
                                    <th>Utilisateur</th>
                                    <th>Date</th>
                                    <th>Achat + Prix</th>
                                    <th>Tags</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <section class="membres2">
                                            <img src="images/profil_3.png" alt="image profil" width="80" height="80">
                                            <h3>Slyway</h3>
                                        </section>
                                    </td>
                                    <td>23/10/2021</td>
                                    <td>KFC (35€)</td>
                                    <td>Tags: Kfc, Resto, Slyway</td>
                                    <td>
                                        <section>
                                            <form action="depense.php">
                                                <button class="boutonBlanc" type="submit">Voir la dépense</button>
                                            </form>
                                        </section>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <section class="membres2">
                                            <img src="images/profil_1.png" alt="image profil" width="80" height="80">
                                            <h3>Maxim Léonet</h3>
                                        </section>
                                    </td>
                                    <td>27/10/2021</td>
                                    <td>3 planches de surf (600€)</td>
                                    <td>Tags: Surf, Planches, Maxim</td>
                                    <td>
                                        <section>
                                            <form action="depense.php">
                                                <button class="boutonBlanc" type="submit">Voir la dépense</button>
                                            </form>
                                        </section>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <section class="membres2">
                                            <img src="images/profil_2.png" alt="image profil" width="80" height="80">
                                            <h3>Rb_NewPokeaS</h3>
                                        </section>
                                    </td>
                                    <td>02/11/2021</td>
                                    <td>2 vestes (150€)</td>
                                    <td>Tags: Vestes, Vêtements, RB</td>
                                    <td>
                                        <section>
                                            <form action="depense.php">
                                                <button class="boutonBlanc" type="submit">Voir la dépense</button>
                                            </form>
                                        </section>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <section class="membres2">
                                            <img src="images/profil_3.png" alt="image profil" width="80" height="80">
                                            <h3>Slyway</h3>
                                        </section>
                                    </td>
                                    <td>05/11/2021</td>
                                    <td>Spa (90€)</td>
                                    <td>Tags: Spa, Piscine, Slyway</td>
                                    <td>
                                        <section>
                                            <form action="depense.php">
                                                <button class="boutonBlanc" type="submit">Voir la dépense</button>
                                            </form>
                                        </section>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <section class="membres2">
                                            <img src="images/profil_1.png" alt="image profil" width="80" height="80">
                                            <h3>Maxim Léonet</h3>
                                        </section>
                                    </td>
                                    <td>10/11/2021</td>
                                    <td>Saut à l'élastique (200€)</td>
                                    <td>Tags: Saut, Élastique, Maxim</td>
                                    <td>
                                        <section>
                                            <form action="depense.php">
                                                <button class="boutonBlanc" type="submit">Voir la dépense</button>
                                            </form>
                                        </section>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <form action="ajouterDepense.php" class="titleIndex">
                            <button class="boutonPublier" type="submit">Ajouter une dépense</button>
                        </form>
                    </section>
                </section>
            </section>
        </main>
<?php require 'inc/footer.inc.php'?>