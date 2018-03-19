<?php
if(admin()!=1){
    header("Location:index.php?page=dashboard");
}

?>

<h4>New Article</h4>

<?php

    if(isset($_POST['post'])){
        $title = htmlspecialchars(trim($_POST['title']));
        $content = htmlspecialchars(trim($_POST['content']));
        $posted = isset($_POST['public']) ? "1" : "0";

        $errors = array();

        if(empty($title) || empty($content)){
            $errors['empty'] = "Fill all fields";
        }

        if(!empty($_FILES['image']['name'])){
            $file = $_FILES['image']['name'];
            $extensions = array('.png','.jpg','.jpeg','.gif','.PNG','.JPG','.JPEG','.GIF');
            $extension = strrchr($file,'.');

            if(!in_array($extension,$extensions)){
                $errors['image'] = "Image not Valid";
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
            post($title,$content,$posted);
            if(!empty($_FILES['image']['name'])){
                post_img($_FILES['image']['tmp_name'], $extension);
            }else{
                $id = $db->lastInsertId();
                header("Location:index.php?page=post&id=".$id);
            }
        }
    }


?>


<form method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="input-field col s12">
            <input type="text" name="title" id="title"/>
            <label for="title">Title of the article</label>
        </div>

        <div class="input-field col s12">
            <textarea name="content" id="content" class="materialize-textarea"></textarea>
            <label for="content">Content of the article</label>
        </div>
        <div class="col s12">
           
               
                    <input type="file" name="image" class="col s12"/>
               
           
        </div>

        <div class="col s6">
            <p>Public</p>
            <div class="switch">
                <label>
                    No
                    <input type="checkbox" name="public"/>
                    <span class="lever"></span>
                    Yes
                </label>
            </div>
        </div>

        <div class="col s6 right-align">
            <br/><br/>
            <button class="btn black" type="submit" name="post">Publish</button>
        </div>

    </div>



</form>