<?php
    include 'functions/main-functions.php';

    $pages = scandir('pages/');
    if(isset($_GET['page']) && !empty($_GET['page'])){
        if(in_array($_GET['page'].'.php',$pages)){
            $page = $_GET['page'];
        }else{
            $page = "error";
        }
    }else{
        $page = "home";
    }

    $pages_functions = scandir('functions/');
    if(in_array($page.'.func.php',$pages_functions)){
        include 'functions/'.$page.'.func.php';
    }

?> 


<!DOCTYPE html>
<html>
    <head>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
        <title>Code@OpenSource-Blog 0.0</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="utf-8"/>
        <style type="text/css">
            .custom_cos{
               background-color:rgba(22,22,22,0.5);
               border-radius:8px;
            }
            .custom_cos_2{
               background-color:rgba(244,244,244,0.5);
               border-radius:8px;
               color: black;
            }
        </style>
    </head>

    <body>
        <?php
            include "body/topbar.php";
        ?>
        <div class="container">
            <?php
                include 'pages/'.$page.'.php';
            ?>
        </div>


       
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/materialize.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
         <script type="text/javascript" src="js/post.func.js"></script>
        <?php
            $pages_js = scandir('js/');
            if(in_array($page.'.func.js',$pages_js)){
                ?>
                    <script type="text/javascript" src="js/<?= $page ?>.func.js"></script>
                <?php
            }

        ?>
        <script type="text/javascript">
                $(document).ready(function(){
                     $('.slider').slider();
                });
        </script>

    </body>
</html>