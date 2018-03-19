<?php

if(hasnt_password() == 0){
    header("Location:index.php?page=dashboard");
}

?>

<div class="row">
    <div class="col l4 m6 s12 offset-l4 offset-m3">
        <div class="card-panel">
            <div class="row">
                <div class="col s6 offset-s3">
                    <img src="../img/modo.png" alt="Modérateur" width="100%"/>
                </div>
            </div>

            <h4 class="center-align">Choose a password</h4>
            <?php
                if(isset($_POST['submit'])){
                    $password = htmlspecialchars(trim($_POST['password']));
                    $password_again = htmlspecialchars(trim($_POST['password_again']));

                    $errors = array();
                    if(empty($password) || empty($password_again)){
                        $errors['empty'] = "Fill all fields";
                    }

                    if($password != $password_again){
                        $errors['different'] = "Passcode doesnot match";
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
                        update_password($password);
                        header("Location:index.php?page=dashboard");
                    }
                }

            ?>

            <form method="post">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="password" id="password" name="password"/>
                        <label for="password">Pass code</label>
                    </div>

                    <div class="input-field col s12">
                        <input type="password" name="password_again" id="password_again"/>
                        <label for="password_again">Repeat Pass code</label>
                    </div>
                </div>
                <center>
                    <button type="submit" name="submit" class="btn black waves-effect waves-light">
                      login
                    </button>
                </center>



            </form>

        </div>
    </div>
</div>