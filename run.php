<?php

    require 'Database.php';

    /*
    $sql = "INSERT INTO test1(name, age) VALUES(:name, :age)";
    $params = [
        ':name' => 'Samson',
        ':age' => '10'
    ];

    */

    $db = new Database();

    // $db->query($sql, $params);

    /*
    $persons = $db->fetch("SELECT * FROM test1 WHERE name = :name", [
        ':name' => 'Alex',
    ]);
    */

    $persons = $db->fetchAll("SELECT * FROM test1");

   foreach($persons as $person){
        echo "My name is : " . $person['name']. "and am :" . $person['age'] . "years old <br />";
   }