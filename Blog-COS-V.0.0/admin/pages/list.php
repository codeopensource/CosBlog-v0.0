<?php
if(admin()!=1){
    header("Location:index.php?page=dashboard");
}

?>
<h4>Listing of posts</h4>
<hr/>

<?php

$posts = get_posts();
foreach($posts as $post){
    ?>
    <div class="row">
        <div class="col s12">
            <h4><?php echo $post->title ; ?><?php echo ($post->posted == "0") ? "<i class='material-icons'>lock</i>" : "" ?></h4>

            <div class="row">
                <div class="col s12 m6 l8">
                    <?php echo substr(nl2br($post->content),0,1200);?>...
                </div>
                <div class="col s12 m6 l4">
                    <img src="../img/posts/<?php echo $post->image; ?>" class="materialboxed responsive-img" alt="<?php echo $post->title ;?>"/>
                    <br/><br/>
                    <a class="btn black waves-effect waves-light" href="index.php?page=post&id=<?php echo $post->id ;?>">View in full</a>
                </div>
            </div>
        </div>
    </div>

    <?php
}