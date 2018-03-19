<nav class="black">
    <div class="container">
        <div class="nav-wrapper">
            <a href="index.php?page=home" class="brand-logo">Code@Open Source</a>
            <?php
            if($page != 'login' && $page != 'new' && $page != 'password'){
                ?>
                    <a href="#" data-activates="mobile-menu" class="button-collapse">Menu</a>

                    <ul class="right hide-on-med-and-down">
                        <li class="<?php echo ($page=="dashboard")?"active" : ""; ?>"><a href="index.php?page=dashboard"><i class="material-icons">home</i></a></li>
                        <?php

                        if(admin()==1){
                            ?>
                            <li class="<?php echo ($page=="write")?"active" : ""; ?>"><a href="index.php?page=write"><i class="material-icons">mode_edit</i></a></li>
                            <li class="<?php echo ($page=="list")?"active" : ""; ?>"><a href="index.php?page=list"><i class="material-icons">list</i></a></li>
                            <li class="<?php echo ($page=="settings")?"active" : ""; ?>"><a href="index.php?page=settings"><i class="material-icons">settings</i></a></li>

                            <?php
                        }

                        ?>
                        <li><a href="../index.php?page=home"><i class="material-icons">public</i></a></li>
                        <li><a href="index.php?page=logout"><i class="material-icons">settings_power</i></a></li>
                    </ul>

                    <ul class="side-nav" id="mobile-menu">
                        <li class="<?php echo ($page=="dashboard")?"active" : ""; ?>"><a href="index.php?page=dashboard">Tableau de bord</a></li>
                        <?php
                        if(admin()==1){
                            ?>
                                <li class="<?php echo ($page=="write")?"active" : ""; ?>"><a href="index.php?page=write">Publier un article</a></li>
                                <li class="<?php echo ($page=="list")?"active" : ""; ?>"><a href="index.php?page=list">Listing des articles</a></li>
                                <li class="<?php echo ($page=="settings")?"active" : ""; ?>"><a href="index.php?page=settings">Paramètres</a></li>
                            <?php
                        }

                        ?>
                        <li><a href="../index.php?page=home">Home</a></li>
                        <li><a href="index.php?page=logout">Log out</a></li>

                    </ul>
                <?php
            }
            ?>
        </div>
    </div>
</nav>
