<?php

function databaseConnection(){
    $mysqli = new mysqli('localhost', 'root', '4444', 'tutorials_world');

    if($mysqli->connect_error != 0){
        die("Error connection database ". $mysqli->connect_error);
    }

    return $mysqli;
}

function getCountries(){
    $mysqli = databaseConnection();
    if(!$mysqli){
        return false;
    }

    $res = $mysqli->query("SELECT * FROM countries");
    while($row = $res->fetch_assoc()){
        $data[] = $row;
    }

    return $data;
}

if(isset($_GET['country_code'])){
    echo getCities($_GET['country_code']);
}

function getCities($country_code){
    $mysqli = databaseConnection();
    if(!$mysqli){
        return false;
    }

    $country_code = htmlspecialchars($country_code);

    $res = $mysqli->query("SELECT * FROM cities WHERE country_code = '$country_code'");
    while($row = $res-> fetch_assoc()){
        $data[] = $row;
    }

    return json_encode($data);
}