<?php $statut='tout'; $nomPage='Accueil'; require 'inc/checkConnexion.php'; require 'php/index.inc.php'; require 'inc/header.inc.php'?>
		<main>
			<header class="posInvit">
                <section class="titleIndex">
                    <h1>Vos invitations</h1>
                </section>
                        <?php displayInvitations(); ?>
			</header>
			<section class="titleIndex">
				<header>
					<h2>Vos groupes</h2>
				</header>
			</section>
			<section class="groupes">
                <?php displayGroups(); ?>
			</section>
		</main>
 <?php require 'inc/footer.inc.php'?>