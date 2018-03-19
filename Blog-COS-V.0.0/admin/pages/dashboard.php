<?php

if(hasnt_password() == 1){
    header("Location:index.php?page=password");
}

?>

<h4>Dashboard</h4>
<div class="row">

    <?php

        $tables = array(
            "Publications"      =>  "posts",
            "comments"      =>  "comments",
            "Admins"   =>  "admins"
        );

        $colors =array(
            "posts"     =>  "green",
            "comments"  =>  "black",
            "admins"    =>  "blue"
        );

    ?>


    <?php

        foreach($tables as $table_name => $table){
            ?>
                <div class="col l4 m6 s12">
                    <div class="card">
                        <div class="card-content <?php echo getColor($table,$colors); ?> white-text">
                            <span class="card-title"><?php echo $table_name; ?></span>
                            <?php $nbrInTable = inTable($table); ?>
                            <h4><?php echo $nbrInTable[0]; ?></h4>
                        </div>
                    </div>
                </div>
            <?php
        }

    ?>


</div>

<h4>Comment panel</h4>
<?php
    $comments = get_comments();
?>
<table >
    <thead>
        <tr>
            <th>Article</th>
            <th>Comment</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody class="black white-text">
        <?php
        if(!empty($comments)) {
            foreach ($comments as $comment) {
                ?>
                <tr id="commentaire_<?php echo $comment->id ; ?>">
                    <td><?php echo $comment->title; ?></td>
                    <td><?php echo substr($comment->comment, 0, 100); ?>...</td>
                    <td>
                        <a href="#" id="<?php echo $comment->id; ?>"
                           class="btn-floating btn-small waves-effect waves-light green see_comment"><i class="material-icons">done</i></a>
                        <a href="#" id="<?php echo $comment->id ;?>"
                           class="btn-floating btn-small waves-effect waves-light red delete_comment"><i class="material-icons">delete</i></a>
                        <a href="#comment_<?php echo $comment->id; ?>"
                           class="btn-floating btn-small waves-effect waves-light blue modal-trigger"><i class="material-icons">add</i></a>

                        <div class="modal" id="comment_<?php echo $comment->id;  ?>">
                            <div class="modal-content black-text">
                                <h4><?php echo $comment->title ; ?></h4>

                                <p>commented by 
                                    <strong><?php echo $comment->name . " (" . $comment->email . ")</strong><br/>on " . date("d/m/Y - H:i", strtotime($comment->date)); ?>
                                </p>
                                <hr/>
                                <p><?php echo nl2br($comment->comment); ?></p>

                            </div>
                            <div class="modal-footer black-text">
                                <a href="#" id="<?php echo  $comment->id ; ?>"
                                   class="modal-action modal-close waves-effect waves-red btn-flat delete_comment"><i class="material-icons">delete</i></a>
                                <a href="#" id="<?php echo $comment->id ; ?>"
                                   class="modal-action modal-close waves-effect waves-green btn-flat see_comment"><i class="material-icons">done_all</i></a>
                            </div>


                        </div>


                    </td>
                </tr>

            <?php
            }
        }else{
            ?>
                <tr>
                    <td></td>
                    <td><center class="red-text">There is no comment to validate </center></td>
                </tr>
            <?php
        }
        ?>
    </tbody>
</table>

<pre>
    <?php
    //var_dump($_SESSION);
    ?>
</pre>