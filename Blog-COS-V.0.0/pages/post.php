<?php

$post = get_post();
if($post == false){
    header("Location:index.php?page=error");
}else{
    ?>
        </div>
    <div class="parallax-container">
        <div class="parallax">
            <img src="img/posts/<?php echo $post->image;?>" alt="<?php echo $post->title;  ?>"/>
        </div>
    </div>
        <div class="container">

            <h2><?php echo $post->title; ?></h2>
            <h6>Par <?php echo $post->name; ?> le <?php echo date("d/m/Y à H:i", strtotime($post->date)); ?></h6>
            <p><?php echo nl2br($post->content); ?></p>
    <?php
}
?>

            <hr>
            <h4>comments:</h4>
            <?php
                $responses = get_comments();
                if($responses != false){
                    foreach($responses as $response){
                        ?>
                            <blockquote>
                                <strong><?php echo $response->name; ?> (<?php echo date("d/m/Y", strtotime($response->date)) ; ?>)</strong>
                                <p><?php echo nl2br($response->comment); ?></p>
                            </blockquote>
                        <?php
                    }
                }else echo "Be the first to comment!";
            ?>

            <?php
                if(isset($_POST['submit'])){
                    $name = htmlspecialchars(trim($_POST['name']));
                    $email = htmlspecialchars(trim($_POST['email']));
                    $comment = htmlspecialchars(trim($_POST['comment']));
                    $errors = array();

                    if(empty($name) || empty($email) || empty($comment)){
                        $errors['empty'] = "Fill all fields";
                    }else{
                        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                            $errors['email'] = "Email is not valid ";
                        }
                    }


                    if(!empty($errors)){
                        ?>
                            <div class="card red">
                                <div class="card-content white-text">
                                    <?php
                                        foreach($errors as $error){
                                            echo $error."<br/>";
                                        }
                                    ?>
                                </div>
                            </div>
                        <?php
                    }else{
                        comment($name,$email,$comment);
                        ?>
                            <script>
                                window.location.replace("index.php?page=post&id=<?php echo$_GET['id'] ; ?>");
                            </script>
                        <?php
                    }

                }

            ?>

            <form method="post">
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input type="text" name="name" id="name"/>
                        <label for="name">Nom</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input type="email" name="email" id="email"/>
                        <label for="email">Adresse email</label>
                    </div>
                    <div class="input-field col s12">
                        <textarea name="comment" id="comment" class="materialize-textarea"></textarea>
                        <label for="comment">Commentaire</label>
                    </div>

                    <div class="col s12">
                        <button type="submit" name="submit" class="btn black white-text waves-effect">
                            Comment
                        </button>
                    </div>
                </div>
            </form>