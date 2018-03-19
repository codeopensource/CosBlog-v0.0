<?php

function get_posts(){

    global $db;

    $req = $db->query(" SELECT  posts.id,
                posts.title,
                posts.image,
                posts.date,
                posts.content,
                admins.name
        FROM posts
        JOIN admins
        ON posts.writer=admins.email
        WHERE posted='1'
        ORDER BY id DESC
        LIMIT 0,8

    ");

    $results = array();

    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }

    return $results;

}