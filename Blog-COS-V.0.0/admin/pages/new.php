<?php
if(isset($_SESSION['admin'])){
    header("Location:index.php?page=dashboard");
}

?>

<div class="row">
    <div class="col l6 m6 s12 offset-l3 offset-m3">
        <div class="card-panel">
            <div class="row">
                <div class="col s6 offset-s3">
                    <img src="../img/modo.png" alt="Modérateur" width="100%" height="150px" />
                </div>
            </div>
            <h4 class="center-align">First Log In</h4>

            <?php

                if(isset($_POST['submit'])){
                    $email = htmlspecialchars(trim($_POST['email']));
                    $token = htmlspecialchars(trim($_POST['token']));

                    $errors = array();

                    if(empty($email) || empty($token)){
                        $errors['empty'] = "Fill all fields";
                    }else if(is_modo($email,$token) == 0){
                        $errors['exist'] = "This moderator does not exist";
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
                        $_SESSION['admin'] = $email;
                        header("Location:index.php?page=password");
                    }

                }


            ?>

            <form method="post">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="email" id="email" name="email"/>
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="text" id="token" name="token"/>
                        <label for="token">Unique Code</label>
                    </div>
                    <center>
                        <button type="submit" name="submit" class="btn waves-effect waves-light black">
                            login
                        </button>
                        <br/><br/>
                        <a href="index.php?page=login">Already moderator</a>
                    </center>
                </div>

            </form>
        </div>

    </div>
</div>