 </div>
 <div class="slider">
    <ul class="slides">
      <li>
        <img src="img/code.jpg"> <!-- random image -->
        <div class="caption center-align custom_cos_2">
          <h3 class="light black-text ">Cos-Blog v0.0</h3>
          <h5 class="light black-text ">It's an open source project developed by Code@OpenSource team </h5>
        </div>
      </li>
      <li>
        <img src="img/eyesnet.jpg"> <!-- random image -->
        <div class="caption right-align custom_cos">
          <h3>Facebook : Code@opensource</h3>
          <h5 class="light white-text ">Join us at https://web.facebook.com/groups/code.opensource/ </h5>
        </div>
      </li>
      <li>
        <img src="img/site.jpg"> <!-- random image -->
        <div class="caption center-align custom_cos">
          <h3 class="" >Do not worry !</h3>
          <h5 class="light  white-text text-lighten-3">Your blog is responsive + the admin panel</h5>
        </div>
      </li>

      <li style="background-color:white; display:flex; align-items:center;justify-content:center">
          <div class="" style="background-image:url(img/img0.png);
          width:100%; height:200px; margin:0 auto;background-repeat:no-repeat;
          background-size:contain; background-position:center; line-height:50%;">
                <!-- <img src="" style="" > -->
          </div>
              <div class="caption center-align custom_cos">
              <h3 class="" >We made our first game</h3>
              <h5 class="light  white-text text-lighten-3">create an account and dowbload the game : www.wesofia.com</h5>
          </div>

        <div class="caption right-align">

        </div>
      </li>

    </ul>
  </div>
      
<div class="container">

<div class="row">
<?php

$posts = get_posts();
foreach($posts as $post){
    ?>
        <div class="col l6 m8 s12">
            <div class="card">
                <div class="card-content">
                    <h5 class="grey-text text-darken-2"><?php echo $post->title ; ?></h5>
                    <h6 class="grey-text">On <?php echo date("d/m/Y - H:i ",strtotime($post->date)); ?> by <?php echo $post->name; ?></h6>
                </div>
                <div class="card-image waves-effect waves-block waves-light">
                    <img src="img/posts/<?php echo $post->image;  ?>" class="activator" alt="<?php echo $post->title;  ?>"/>
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4"><i class="material-icons">more vert</i></span>
                    <p><a href="index.php?page=post&id=<?php echo $post->id; ?>">View in full</a></p>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4"><?php echo $post->title ;?><i class="material-icons">close</i></span>
                    <p><?php echo  substr(nl2br($post->content),0,1000); ?>...</p>
                </div>
            </div>
        </div>
    <?php
}

?>
</div>