<?php
$bdd = new PDO ("mysql:host=localhost;dbname=streaming","root","");

//if(isset($_SESSION['connecte'])){
    if(isset($_GET['t'],$_GET['id']) AND !empty($_GET['t']) AND !empty($_GET['id'])) {
        $getid = (int) $_GET['id'];
        $gett = (int) $_GET['t'];

//        $sessionid = $_SESSION['id'];
        $sessionid = 4;

        $check = $bdd->prepare('SELECT id_se FROM serie WHERE id_se = ?');
        $check->execute(array($getid));

        if($check->rowCount() == 1) { // J'aime
            if($gett == 1) {
                $check_like = $bdd->prepare('SELECT id FROM likes WHERE id_se = ? AND id_u = ?');
                $check_like->execute(array($getid, $sessionid));

                $del = $bdd->prepare('DELETE FROM dislikes WHERE id_se = ? AND id_u = ?');
                $del->execute(array($getid, $sessionid));

                if($check_like->rowCount() == 1) {
                    $del = $bdd->prepare('DELETE FROM likes WHERE id_se = ? AND id_u = ?');
                    $del->execute(array($getid, $sessionid));
                } else {
                    $ins = $bdd->prepare('INSERT INTO likes (id_se, id_u) VALUES (?, ?)');
                    $ins->execute(array($getid, $sessionid));
                }

            } elseif($gett == 2) {  // Je n'aime pas
                $check_like = $bdd->prepare('SELECT id FROM dislikes WHERE id_se = ? AND id_u = ?');
                $check_like->execute(array($getid, $sessionid));

                $del = $bdd->prepare('DELETE FROM likes WHERE id_se = ? AND id_u = ?');
                $del->execute(array($getid, $sessionid));

                if($check_like->rowCount() == 1) {
                    $del = $bdd->prepare('DELETE FROM dislikes WHERE id_se = ? AND id_u = ?');
                    $del->execute(array($getid, $sessionid));
                } else {
                    $ins = $bdd->prepare('INSERT INTO dislikes (id_se, id_u) VALUES (?, ?)');
                    $ins->execute(array($getid, $sessionid));
                } 
            }
            header('Location:http://localhost/Stream_final/index.php?p=fiche&id_se='.$getid);
        } else {
            exit('Erreur fatale. <a href ="http://localhost/Projet_Streaming_2/index.php?p=home">Revenir à l\'accueil</a>');
        }
        } else {
            exit('Erreur fatale. <a href ="http://localhost/Projet_Streaming_2/index.php?p=home">Revenir à l\'accueil</a>');
    }
//} else {
//    echo "Veuillez connecter pour continuer";
//}