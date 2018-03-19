<?php

function get_posts(){

    global $db;

    $req = $db->query("SELECT * FROM posts ORDER BY date DESC");

    $results = array();
    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }

    return $results;


}