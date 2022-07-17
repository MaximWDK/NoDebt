<?php $statut='tout'; $nomPage='Accueil'; require 'inc/checkConnexion.php'; require 'inc/header.inc.php'?>
		<main>
			<header class="posInvit">
				<section class="titleIndex">
					<h1>Vos invitations</h1>
				</section>
				<section class="posInvit">
					<table class="depense">
                        <thead>
                            <tr>
                                <th>Utilisateur</th>
                                <th>Intitulé</th>
                                <th>Choix</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php for ($i = 1; $i <= 2; $i++) {?>
                            <tr>
                                <td>
                                    <section class="membres2">
                                        <img src="images/profil_2.png" alt="image profil" width="80px" height="80px">
                                        <h3>RB_NewPokeaS</h3>
                                    </section>
                                </td>
                                <td>Invitation pour rejoindre le groupe "RB_NewPokeaS"</td>
                                <td>
                                    <section>
                                        <button class="boutonBlanc" type="submit">Accepter</button>
                                        <button class="boutonBlanc" type="submit">Refuser</button>
                                    </section>
                                </td>
                            </tr>
                        <?php }?>
                        </tbody>
					</table>
				</section>
			</header>
			<section class="titleIndex">
				<header>
					<h2>Vos groupes</h2>
				</header>
			</section>
			<section class="groupes">
                <?php for ($i = 1; $i <= 5; $i++) {?>
                    <section class="groupeCouleur">
                        <a href="groupe.php">
                            <h2>Groupe public "Maxim"</h2>
                        </a>
                        <section class="infosGroupes">
                            <img src="images/groupes.png" alt="image groupe" width="900px">
                            <h2>Créateur:</h2>
                            <section class="profilsGroupes">
                                <img src="images/profil_1.png" alt="profil" title="Maxim Léonet" width="70px" height="70px">
                            </section>
                            <h2>Participants:</h2>
                            <section class="profilsGroupes">
                            <?php for ($j = 1; $j <= 2; $j++) {?>
                            <img src="images/profil_2.png" alt="profil" title="RB_NewPokeaS" width="70px" height="70px">
                            <?php }?>
                            </section>
                            <table class="depense">
                                <thead>
                                <tr>
                                    <th>Utilisateur</th>
                                    <th>Date</th>
                                    <th>Achat + Prix</th>
                                    <th>Tags</th>
                                    <th>Voir Dépense</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <section class="membres2">
                                            <img src="images/profil_3.png" alt="image profil" width="80px" height="80px">
                                            <h3>Slyway</h3>
                                        </section>
                                    </td>
                                    <td>23/10/2021</td>
                                    <td>KFC (35€)</td>
                                    <td>Kfc, Resto, Slyway</td>
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
                                            <img src="images/profil_1.png" alt="image profil" width="80px" height="80px">
                                            <h3>Maxim Léonet</h3>
                                        </section>
                                    </td>
                                    <td>27/10/2021</td>
                                    <td>3 planches de surf (600€)</td>
                                    <td>Surf, Planches, Maxim</td>
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
                                            <img src="images/profil_2.png" alt="image profil" width="80px" height="80px">
                                            <h3>Rb_NewPokeaS</h3>
                                        </section>
                                    </td>
                                    <td>02/11/2021</td>
                                    <td>2 vestes (150€)</td>
                                    <td>Vestes, Vêtements, RB</td>
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
                            <h2>Dépenses totales: 1075€</h2>
                            <form action="groupe.php" class="titleIndex">
                                <button class="boutonPublier" type="submit">Consulter le groupe</button>
                            </form>
                        </section>
                    </section>
                <?php }?>
			</section>
		</main>
 <?php require 'inc/footer.inc.php'?>