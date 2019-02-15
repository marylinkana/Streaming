
  <?php

   if(isset($_GET['id_f']))
   {
       $requete = $bdd->query("SELECT * FROM film WHERE id_f =".$_GET['id_f']);
       $reponse = $requete->fetch();
       $id = $reponse['id_f'];
       $titre = $reponse['titre'];

            //like&dislike
            $show_likes =$bdd->prepare('SELECT id FROM likes WHERE id_f = ?');
            $show_likes->execute(array($id));
            $show_likes = $show_likes->rowCount();

            $show_dislikes =$bdd->prepare('SELECT id FROM dislikes WHERE id_f = ?');
            $show_dislikes->execute(array($id));
            $show_dislikes = $show_dislikes->rowCount();
            
            //affiche commentaires
            $show_commentaires = $bdd->prepare('SELECT * FROM commentaires c INNER JOIN users u ON c.id_u = u.id_u WHERE id_se = ?');
            $show_commentaires->execute(array($id));
?>
    <div class="fiche">
     
      <div class="col-md-5 p-lg-5 mx-auto my-5">
        <h1 class="display-4 font-weight-normal"> Titre du film : <?= $reponse['titre'] ?></h1>
        <?= $show_likes ?><a href="content/action2.php?t=1&id=<?= $id ?>"> Likes</a> 
        <?= $show_dislikes ?><a href="content/action2.php?t=2&id=<?= $id ?>"> Dislikes</a> 
        <p class="lead font-weight-normal">Description : <?= $reponse['desc_f'] ?></p>
        <a class="btn btn-outline-secondary" href="index.php?p=fiche&id_f=<?= $reponse['id_f'] ?>">Voir le film</a>
      </div>
      <div class="product-device box-shadow d-none d-md-block"></div>
      <div class="product-device product-device-2 box-shadow d-none d-md-block"></div>
    
</div>
    
<?php
   }
if(isset($_GET['id_f']))
{
    $requete = $bdd->query("SELECT * FROM film WHERE id_f =".$_GET['id_f']);
    $reponse = $requete->fetch();
?>  <div class="ficheVideo"><?php if(isset($_GET['ba'])) echo "BANDE ANNONCE".$reponse['lien_trailer'];
                                    else echo"FILM INTEGRALE".$reponse['lien_f']; 
                                    echo"<br/><br/><br/> LES AUTRES FILMS SUSCEPTIBLES DE VOUS INTERESSER";?>
      </div> <br/><br/><br/><br/><br/><br/><br/><br/>
      
       <?php
        $requete = $bdd->query("SELECT * FROM film WHERE id_f <>".$_GET['id_f']);
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
	            	
					
					</div> <br/><br/><br/><br/><br/>
				</div>
				
				<?php }?>

<div class="ficheCommentaires">
   <div class="col-md-5 p-lg-5 mx-auto my-5">
     <h2>Commentaires : </h2>
    
            <br>
            <?php 
                //affiche commentaires
                while($c = $show_commentaires->fetch()) { ?>
                <u><?= $c['nom_user'] ?> : </u> <?= $c['description'] ?><br><br>-----------------------<br><br>
            <?php }
            ?>
    </div>
</div>

<?php }?>

<?php
   if(isset($_GET['id_se']))
   {
       $requete = $bdd->query("SELECT * FROM serie WHERE id_se =".$_GET['id_se']);
       $reponse = $requete->fetch();
       $id = $reponse['id_se'];
       $titre = $reponse['titre_se'];

            //like&dislike
            $show_likes =$bdd->prepare('SELECT id FROM likes WHERE id_se = ?');
            $show_likes->execute(array($id));
            $show_likes = $show_likes->rowCount();

            $show_dislikes =$bdd->prepare('SELECT id FROM dislikes WHERE id_se = ?');
            $show_dislikes->execute(array($id));
            $show_dislikes = $show_dislikes->rowCount();
       
            //affiche commentaires
            $show_commentaires = $bdd->prepare('SELECT * FROM commentaires c INNER JOIN users u ON c.id_u = u.id_u WHERE id_se = ?');
            $show_commentaires->execute(array($id));
?>
    <div class="fiche">
     
      <div class="col-md-5 p-lg-5 mx-auto my-5">
        <h1 class="display-4 font-weight-normal"> Titre de la serie : <?= $reponse['titre_se'] ?></h1>
        <?= $show_likes ?><a href="content/action.php?t=1&id=<?= $id ?>"> Likes</a> 
        <?= $show_dislikes ?><a href="content/action.php?t=2&id=<?= $id ?>"> Dislikes</a> 
        <p class="lead font-weight-normal">Description : <?= $reponse['desc_se'] ?></p>
        <p class="lead font-weight-normal">Nombre d'épisode : <?= $reponse['nomb_ep'] ?> épisodes</p>
        <a class="btn btn-outline-secondary" href="index.php?p=fiche&id_se=<?= $reponse['id_se']?>&num_episodes=1">Voir la série</a>
      </div>
      <div class="product-device box-shadow d-none d-md-block"></div>
      <div class="product-device product-device-2 box-shadow d-none d-md-block"></div>
    
</div>
    
<?php
   }
if(isset($_GET['id_se']))
{
    $requete = $bdd->query("SELECT * FROM serie WHERE id_se =".$_GET['id_se']);
    $reponse = $requete->fetch();
 
    if(isset($_GET['ba']))
    { ?> <div class="ficheVideo"> <?php
        echo "BANDE ANNONCE".$reponse['lien_se']."<br/><br/><br/> LES AUTRES SERIES SUSCEPTIBLES DE VOUS INTERESSER";
                
       ?></div> <br/><br/><br/><br/><br/><br/><br/><br/>
       
       <?php
        $requete = $bdd->query("SELECT * FROM serie WHERE id_se <>".$_GET['id_se']);
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
		                 	<span class="price"><?= $reponse['nomb_ep'] ?> <span class="per"> épisodes</span></span>
		               </div>
		               <p><?= $reponse['desc_se'] ?></p>
		               <a href="index.php?p=fiche&id_se=<?= $reponse['id_se']?>&ba=1">Bande annonce</a>
	            	</div>
	            	
					
					</div> <br/><br/><br/><br/><br/>
				</div>
				
				<?php 
        }
    }
     else
     {
         if($_GET['num_episodes'] == 1)
         {
          $requetea = $bdd->query("SELECT * FROM episodes WHERE num_episodes = 1 AND id_se =".$_GET['id_se']);
          $reponsea = $requetea->fetch();
          ?> <div class="ficheVideo"> <?php
          echo $reponsea['nom_episodes'].$reponsea['lien_episodes']."<br/><br/><br/> LES AUTRES SERIES SUSCEPTIBLES DE VOUS INTERESSER"; 
          ?></div> <br/><br/><br/><br/><br/><br/><br/><br/> <?php
    
          $requet = $bdd->query("SELECT * FROM episodes WHERE id_se =".$_GET['id_se']);
          while($repons = $requet->fetch())
          {?>
              <div class="col-md-3 item-block animate-box" data-animate-effect="fadeIn">
				
					<div class="fh5co-property">
					
						<figure>
						<div class="filmDim">
						<div class="imageDim">
						<img src="<?=$reponse['image_se']?>"/>
						</div>
							<!--<img src="images/slide_3.jpg" alt="Free Website Templates FreeHTML5.co" class="img-responsive">-->
							<a href="index.php?p=fiche&id_se=<?= $reponse['id_se']?>&num_episodes=<?= $repons['num_episodes'] ?>" class="tag">Regarder</a>
							</div>
						</figure>
						<div class="fh5co-property-innter">
							<h3><a href="#"><?= $reponse['titre_se'] ?></a></h3>
							<div class="price-status">
		                 	<span class="price"><?= $repons['nom_episodes'] ?> <span class="per"> épisodes <?= $repons['num_episodes'] ?> </span></span>
		               </div>
		               <p><?= $reponse['desc_se'] ?></p>
		               <a href="index.php?p=fiche&id_se=<?= $repons['id_se']?>&ba=1">Bande annonce</a>
	            	</div>
	            	
					
					</div> <br/><br/><br/><br/><br/>
				</div>
        <?php 
          } 
?>
        
         <?php 
          }
           else
           {
          $requetea = $bdd->query("SELECT * FROM episodes WHERE num_episodes = 2 AND id_se =".$_GET['id_se']);
          $reponsea = $requetea->fetch();
          ?> <div class="ficheVideo"> <?php
          echo $reponsea['nom_episodes']."".$reponsea['lien_episodes']."<br/><br/><br/> LES EPISODES"; 
             ?></div><br/><br/><br/><br/><br/><br/><br/><br/> <?php
    
          $requet = $bdd->query("SELECT * FROM episodes WHERE id_se =".$_GET['id_se']);
          while($repons = $requet->fetch())
          {?>
              <div class="col-md-3 item-block animate-box" data-animate-effect="fadeIn">
				
					<div class="fh5co-property">
					
						<figure>
						<div class="filmDim">
						<div class="imageDim">
						<img src="<?=$reponse['image_se']?>"/>
						</div>
							<!--<img src="images/slide_3.jpg" alt="Free Website Templates FreeHTML5.co" class="img-responsive">-->
							<a href="index.php?p=fiche&id_se=<?= $reponse['id_se']?>&num_episodes=<?= $repons['num_episodes'] ?>" class="tag">Regarder</a>
							</div>
						</figure>
						<div class="fh5co-property-innter">
							<h3><a href="#"><?= $reponse['titre_se'] ?></a></h3>
							<div class="price-status">
		                 	<span class="price"><?= $repons['nom_episodes'] ?> <span class="per"> épisodes <?= $repons['num_episodes'] ?> </span></span>
		               </div>
		               <p><?= $reponse['desc_se'] ?></p>
		               <a href="index.php?p=fiche&id_se=<?= $repons['id_se']?>&ba=1">Bande annonce</a>
	            	</div>
	            	
					
					</div> <br/><br/><br/><br/><br/>
				</div>
        <?php 
          } 
?>
          <?php
           }
     }
?>
 
<br/><br/><br/><br/><br/> <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<div class="ficheCommentaires">
   <div class="col-md-5 p-lg-5 mx-auto my-5">
     <h2>Commentaires : </h2>
    
            <br>
            <?php 
                //affiche commentaires
                while($c = $show_commentaires->fetch()) { ?>
                <u><?= $c['nom_user'] ?> : </u> <?= $c['description'] ?><br><br>-----------------------<br><br>
            <?php }
            ?>
    </div>
</div>
<?php
}
?>

      

