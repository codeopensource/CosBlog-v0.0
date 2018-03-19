<nav class="black">
    <div class="container">
        <div class="nav-wrapper">
            <a href="index.php?page=home" class="brand-logo">Cos-Blog 0.0</a>

            <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>

            <ul class="right hide-on-med-and-down">
                <li class="<?php echo ($page=="home")?"active" : ""; ?>"><a href="index.php?page=home">Home</a></li>
                <li class="<?php echo ($page=="blog")?"active" : ""; ?>"><a href="index.php?page=blog">Blog</a></li>
            </ul>

            <ul class="side-nav" id="mobile-menu">
                <li class="<?php echo ($page=="home")?"active" : ""; ?>"><a href="index.php?page=home">Home</a></li>
                <li class="<?php echo ($page=="blog")?"active" : ""; ?>"><a href="index.php?page=blog">Blog</a></li>
            </ul>

        </div>
    </div>
</nav>