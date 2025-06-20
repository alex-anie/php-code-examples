<?php
    function connect(){
        $mysqli = new mysqli('localhost', 'root', '4444', "'tutorials_2");

        if($mysqli->connect_errno != 0){
            exit($mysqli->connect_error);
        }

        return $mysqli;
    }

    function insertImage($files){
        $mysqli = connect();

        $image_name = $files["image"]["name"];
        $image_temp = $files["image"]["tmp_name"];

        // Image validation code. Important!!

        $mysqli->begin_transaction();


        $mysqli->query("INSERT INTO images(image) VALUES('$image_name')");
        if($mysqli->affected_rows != 1){
            $mysqli->rollback();
            return "Error inserting image in the database";
        }

        if(!move_uploaded_file($image_temp, "uploads/" . $image_name)){
            $mysqli->rollback();
            return "Err saving the file";
        }

        $mysqli->commit();
        $mysqli->close();

        return "success";
    }


    function getImages(){
        $mysqli = connect();
        $res = $mysqli->query("SELECT id, image FROM images");
        $data = array();
        while($row = $res->fetch_assoc()){
            array_push($data, $row);
        }

        return $data;
    }

    function deleteImage($id){
        $mysqli = connect();

        $res = $mysqli->query("SELECT id, image FROM images WHERE id = $id");
        $image_name = $res->fetch_assoc()['image'];

        if($image_name == NULL){
            return "image not found in the database. Please try again";
        }

        $mysqli->begin_transaction();
        $mysqli->query("DELETE FROM images WHERE id = $id");

        if($mysqli->affected_rows != 1){
            $mysqli->rollback();
            return "Error deleting image from the database. Please try again";
        }

        $mysqli->commit();
        $mysqli->close();

        return header("Location: index.php");
    }