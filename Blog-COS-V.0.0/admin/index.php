<?php
include '../functions/main-functions.php';

$pages = scandir('pages/');
if(isset($_GET['page']) && !empty($_GET['page'])){
    if(in_array($_GET['page'].'.php',$pages)){
        $page = $_GET['page'];
    }else{
        $page = "error";
    }
}else{
    $page = "dashboard";
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
    <link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection"/>
    <title>Code@OpenSource-Blog 0.0 | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8"/>
</head>

<body class="<?php echo ($page=="login" or $page=="new" or $page=="password")?"black" : ""; ?>">

<?php

if($page != 'login' && $page != 'new' && !isset($_SESSION['admin'])){
    header("Location:index.php?page=login");
}

include "body/topbar.php";
?>
<div class="container">
    <?php
    include 'pages/'.$page.'.php';
    ?>
</div>


<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/materialize.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<?php
$pages_js = scandir('js/');
if(in_array($page.'.func.js',$pages_js)){
    ?>
    <script type="text/javascript" src="js/<?php echo $page ; ?>.func.js"></script>
<?php
}

?>

</body>
</html>