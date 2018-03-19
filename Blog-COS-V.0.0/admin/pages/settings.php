<?php
if(admin()!=1){
    header("Location:index.php?page=dashboard");
}

?>

<h4>CTRL</h4>
<div class="row">
    <div class="col m6 s12">
        <h4>Moderators</h4>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Valid</th>
                </tr>
            </thead>
            <tbody class="black white-text">
            <?php
                $modos = get_modos();
                foreach($modos as $modo){
                    ?>
                        <tr>
                            <td><?php echo $modo->name ;?></td>
                            <td><?php echo $modo->email ; ?></td>
                            <td><?php echo $modo->role  ;?></td>
                            <td><?php echo (!empty($modo->password)) ? "active" : "not act" ?></td>
                        </tr>
                    <?php
                }
            ?>
            </tbody>
        </table>


    </div>
    <div class="col m6 s12">
        <h4>Add moderator</h4>

        <?php
            if(isset($_POST['submit'])){

                $name = htmlspecialchars(trim($_POST['name']));
                $email = htmlspecialchars(trim($_POST['email']));
                $email_again = htmlspecialchars(trim($_POST['email_again']));
                $role = htmlspecialchars(trim($_POST['role']));
                $token = token(30);

                $errors = array();

                if(empty($name) || empty($email) || empty($email_again)){
                    $errors['empty'] = "Fill all fields";
                }

                if($email != $email_again){
                    $errors['different'] = "Email invalid";
                }

                if(email_taken($email)){
                    $errors['taken'] = "Email already assign to another moderator";
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
                    add_modo($name,$email,$role,$token);
                }
            }


        ?>

        <form method="post">
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="name" id="name"/>
                    <label for="name">Name</label>
                </div>
                <div class="input-field col s12">
                    <input type="email" name="email" id="email"/>
                    <label for="email">Email</label>
                </div>
                <div class="input-field col s12">
                    <input type="email" name="email_again" id="email_again"/>
                    <label for="email_again">Repeat Email</label>
                </div>
                <div class="input-field col s12">
                    <select name="role" id="role">
                        <option value="modo">Moderator</option>
                        <option value="admin">Administrator</option>
                    </select>
                    <label for="role">Role</label>
                </div>

                <div class="col s12">
                    <button type="submit" name="submit" class="btn black">add</button>
                </div>

            </div>
        </form>

    </div>
</div>