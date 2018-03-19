<?php

function email_taken($email){
    global $db;
    $e = array('email'   =>  $email);
    $sql = "SELECT * FROM admins WHERE email = :email";
    $req = $db->prepare($sql);
    $req->execute($e);
    $free = $req->rowCount($sql);

    return $free;
}

function token($length){
    $chars = "azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN0123456789";
    return substr(str_shuffle(str_repeat($chars,$length)),0,$length);
}

function add_modo($name,$email,$role,$token){
    global $db;

    $m= array(
        'name'      =>  $name,
        'email'     =>  $email,
        'token'     =>  $token,
        'role'      =>  $role
    );

    $sql = "INSERT INTO admins(name,email,token,role) VALUES(:name,:email,:token,:role)";
    $req = $db->prepare($sql);
    $req->execute($m);
   
    $subject = "Moderator";
    $message = '
        <html lang="en" style="font-family: sans-serif;">
            <head>
                <meta charset="UTF-8">
            </head>
            <body>
                Here your informations :
                <br/>Email : '.$email.'
                <br/>Unique Code: '.$token.'
                <br/>Role: '.$role.'
                <br/>
                <a href="http://127.0.0.1:8080/Code@open Source/admin/index.php?page=new">First login</a>:
                <br/><br/>use the link above for the first login  with your details and create a password.
                Thanks for joining us , Code@opensource
            </body>
        </html>
    ';

    $header = "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html; charset=UTF-8\r\n";
    $header .= 'From: no-reply@nicwalle.com' . "\r\n" . 'Reply-To: Code@opensource.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

    mail($email,$subject,$message,$header);



}

function get_modos(){
    global $db;
    $req = $db->query("
        SELECT * FROM admins
    ");

    $results = array();
    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }
    return $results;
}