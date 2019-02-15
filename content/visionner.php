<?php
$requete = $bdd->query("SELECT * FROM serie, episodes");
$reponse = $requete->fetch();
    ?>
     <div class="album py-5 bg-light">
                    <div class="container">
                        <div class="row">
                            <!-- Hover-Fall Effect-->
                            <div class="col-xs-6 col-sm-3">
                                <div class="fall-item fall-effect" style="width:300px; height:200px; margin-top:700px;"> <img src="<?=$reponse['image_se']?>" />
                                    <div class="mask">
                                        <h2>
                                            nom
                                        </h2>
                                        <p>
                                            temps min</p> <a href="index.php?p=visionner&id_se=<?=$reponse['id_se']?>&num_episodes=<?=$reponse['num_episodes']?>" class="btn btn-default">Voir</a> </div>
                                </div>
                                <h4 class="text-center">
                                    numero
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>