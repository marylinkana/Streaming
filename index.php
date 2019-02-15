<?php
    session_start();

    

    try
    {
        $bdd = new PDO("mysql:host=localhost;dbname=streaming;charset=utf8","root","");
    }
    catch(Exception $e)
    {
        die("bdd non trouvée");
    }

    if(!isset($_GET['p']))
    {
        $page = 'home';
    }
    else
    {
        if(!file_exists("content/".$_GET['p'].".php"))
            $page="404";
        else
            $page = $_GET['p'];
    }

    ob_start();
        include "content/".$page.".php";
        $content = ob_get_contents();
    ob_end_clean();

    include "layout.php";

?>