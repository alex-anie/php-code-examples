<?php 

    require 'Database.php';

    $db = new Database('localhost', 'pdo-vs-mysqli', 'root', '4444');

    // insert user
    $db->query("INSERT INTO users(username, email) VALUES (:username, :email, :password)", [
        ':username' => 'Alice',
        ':email' => 'alice@example.com',
        ':password' => password_hash('secret123', PASSWORD_DEFAULT)
    ]);


    // Fetch Single user
    $user = $db -> fetch("SELECT * FROM users WHERE email = :email", [
        ':email' => 'alice@example.com'
    ]);

    print_r($user);

    $users = $db->fetchAll("SELECT * FROM users");

    foreach($users as $user){
        echo $user['username'] . "<br />";
    }
