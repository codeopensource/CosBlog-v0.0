<?php
    if(isset($_SESSION['admin'])){
        header("Location:index.php?page=dashboard");
    }
?>

<div class="row">
    <div class="col l6 m12 s12 offset-l3 offset-m3">
        <div class="card-panel">
            <div class="row">
                <div class="col s6 offset-s3">
                    <img src="../img/admin.png" alt="Administrateur" width="100%" height="150px" />
                </div>
            </div>

            <h4 class="center-align">Log In</h4>

            <?php
                if(isset($_POST['submit'])){
                    $email = htmlspecialchars(trim($_POST['email']));
                    $password = htmlspecialchars(trim($_POST['password']));

                    $errors =array();

                    if(empty($email) || empty($password)){
                        $errors['empty'] = "Fill all fields";
                    }else if(is_admin($email,$password) == 0){
                        $errors['exist']  = "Moderator does not exist";
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
                        header("Location:index.php?page=dashboard");
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
                        <input type="password" id="password" name="password"/>
                        <label for="password">Pass Code</label>
                    </div>
                </div>

                <center>
                    <button type="submit" name="submit" class="waves-effect waves-light btn black">
                        login
                    </button>
                    <br/><br/>
                    <a href="index.php?page=new">New Moderator</a>
                </center>




            </form>

        </div>
    </div>
</div>