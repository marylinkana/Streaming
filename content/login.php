<?php
            if(!empty($_POST))
            {
                $user = $bdd->prepare("SELECT id_u, login, mdp_user FROM Users WHERE login=:login AND mdp_user=:mdp_user");
                $user->bindValue(':login',$_POST['login'],PDO::PARAM_STR); 
                $user->bindValue(':mdp_user',sha1($_POST['mdp_user']),PDO::PARAM_STR); 
                $user->execute();
                if($donnee = $user->fetch());
                {
                
                    if(isset($_POST['remember']))
                    {
                        setcookie('auth',$donnee['id_u'].'-----'.sha1($donnee['login'].$donnee['mdp_user'].$_SERVER['REMOTE_ADDR']),time()+(3600*24*3),'/','localhost',false,true);

                    }

                    if($donnee)
                    {
                        $_SESSION['id_u'] = $donnee['id_u'];
                        $_SESSION['connecte']= true;
                        $_SESSION['auth'] = $donnee;
                        header("Location:index.php?p=profil");
                        die();
                    }
                    else{setFlash("Vos identifiants sont incorrects","danger");}
                }
            }
       
        if(isset($_COOKIE['auth'])&& !isset($_SESSION['auth']))
        {
            $auth = $_COOKIE['auth'];
            $auth = explode('-----',$auth); 
            $user = $bdd->prepare("SELECT * FROM Users WHERE id_u=:id_u");
            $user->bindValue(':id_u',$auth[0],PDO::PARAM_INT);
            $user->execute();
            $donnee = $user->fetch();
            $key = sha1($donnee['login'].$donnee['mdp_user'].$_SERVER['REMOTE_ADDR']);
            if($key == $auth[1])
            {
                $_SESSION['auth'] = $donnee;
                setcookie('auth',$donnee['id_u'].'-----'.sha1($donnee['login'].$donnee['mdp_user'].$_SERVER['REMOTE_ADDR']),time()+(3600*24*3),'/','localhost',false,true);
                //Réécrire ça, permet d'écraser le cookie pour le remettre à jour
                
                header("Location:profil");
                die();
                
            }
             else 
            {
                setcookie('auth','',time()-3600,'/','localhost',false,true);
                //A mettre aussi sur la page de deconnexion
            }
        }
        ?>



    <form class="form-signin" method="post">
        <h1 class="h3 mb-3 font-weight-normal">Veuillez vous connecter</h1>
        <label for="login" class="sr-only">Login</label>
        <input type="text" name='login' id="login" class="form-control" placeholder="Login" required autofocus>
        <label for="mdp_user" class="sr-only">Password</label>
        <input type="password" id="mdp_user" name='mdp_user' class="form-control" placeholder="mdp" required>
        <div class="checkbox mb-3">
            <label>
          <input type="checkbox" value="remember" name="remember"> Se souvenir de moi
        </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Connexion</button>
    </form>
