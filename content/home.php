	<div id="best-deal">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box" data-animate-effect="fadeIn">
					<h2><?= isset($title)?$title:"BIENVENUE SUR STREAMAQ"; ?></h2>
					<p><?= isset($undertitle)?$undertitle:"Votre site de streaming préféré, retrouvez touts les derniers films quelques semaines seulement après leurs sorties en cinéma ainsi que les dernières saisons de vos séries préférées toutes catégories. <br/><br/><br/> FILMS "?></p>
				</div>
				
				
				
				
				<?php
        $requete = $bdd->query("SELECT * FROM film");
        while($reponse = $requete->fetch())
            {
    ?>
				
				
				
				<div class="col-md-3 item-block animate-box" data-animate-effect="fadeIn">
				
					<div class="fh5co-property">
					
						<figure>
						<div class="filmDim">
						<div class="imageDim">
						<img src="<?=$reponse['image_f']?>"/>
						</div>
							<!--<img src="images/slide_3.jpg" alt="Free Website Templates FreeHTML5.co" class="img-responsive">-->
							<a href="index.php?p=fiche&id_f=<?= $reponse['id_f'] ?>" class="tag">Regarder</a>
							</div>
						</figure>
						<div class="fh5co-property-innter">
							<h3><a href="#"><?= $reponse['titre'] ?></a></h3>
							<div class="price-status">
		                 	<span class="price"><?= $reponse['duree_f'] ?> <span class="per"></span></span>
		               </div>
		               <p><?= $reponse['desc_f'] ?></p>
		               <a href="index.php?p=fiche&id_f=<?= $reponse['id_f']?>&ba=1">Bande annonce</a>
                        </div>
					
					</div>
				</div>
				
				<?php }?>
				
				
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box" data-animate-effect="fadeIn">
					<h2><?= isset($title)?$title:""; ?></h2>
					<p><?= isset($undertitle)?$undertitle:"<br/><br/> SERIES "?></p>
				</div>
				
				<?php
        $requete = $bdd->query("SELECT * FROM serie");
        while($reponse = $requete->fetch())
            {
    ?>
				
				
				
				<div class="col-md-3 item-block animate-box" data-animate-effect="fadeIn">
				
					<div class="fh5co-property">
					
						<figure>
						<div class="filmDim">
						<div class="imageDim">
						<img src="<?=$reponse['image_se']?>"/>
						</div>
							<!--<img src="images/slide_3.jpg" alt="Free Website Templates FreeHTML5.co" class="img-responsive">-->
							<a href="index.php?p=fiche&id_se=<?= $reponse['id_se']?>&num_episodes=1" class="tag">Regarder</a>
							</div>
						</figure>
						<div class="fh5co-property-innter">
							<h3><a href="#"><?= $reponse['titre_se'] ?></a></h3>
							<div class="price-status">
		                 	<span class="price"><?= $reponse['nomb_ep'] ?> <span class="per">épisodes</span></span>
		               </div>
		               <p><?= $reponse['desc_se'] ?></p>
                       <a href="index.php?p=fiche&id_se=<?= $reponse['id_se'] ?>&ba=1">Bande annonce</a>
	            	</div>
					</div>
				</div>
				
				<?php }?>

				


			</div>
			<div class="row">
				<div class="col-md-12 text-center animate-box" data-animate-effect="fadeIn">
					<nav>
					  <ul class="pagination">
					    <li class="disabled">
					      <a href="#" aria-label="Previous">
					        <span aria-hidden="true">&laquo;</span>
					      </a>
					    </li>
					    <li class="active"><a href="">1</a></li>
					    <li><a href="#">2</a></li>
					    <li>
					      <a href="#" aria-label="Next">
					        <span aria-hidden="true">&raquo;</span>
					      </a>
					    </li>
					  </ul>
					</nav>
				</div>
			</div>
		</div>
	</div>