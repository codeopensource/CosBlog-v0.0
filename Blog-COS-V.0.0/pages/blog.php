
<?php

$posts = get_posts();
foreach($posts as $post){
    ?>
    <div class="row">
        <div class="col s12 m12 l12">
            <h4><?php echo $post->title ; ?></h4>

            <div class="row">
                <div class="col s12 m6 l8">
                    <?php echo substr(nl2br($post->content),0,1200) ; ?>...
                </div>
                <div class="col s12 m6 l4">
                    <img src="img/posts/<?php echo $post->image; ?>" class="materialboxed responsive-img" alt="<?php echo $post->title; ?>"/>
                    <br/><br/>
                    <a class="btn light-blue waves-effect waves-light" href="index.php?page=post&id=<?php echo $post->id; ?>">View in full</a>
                </div>
            </div>
        </div>
    </div>

    <?php
}
