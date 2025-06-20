<?php require 'functions.php' ?>

<?php

$response = null;
$delete_function_response = null;

if(isset($_POST["upload"])){
    if(isset($_FILES['image']) && $_FILES["image"]["name"] != ""){
        $response = insertImage($_FILES);
    }else {
        $response = "Please Select an image file";
    }
}

if(isset($_GET["delete-image"])){
    $delete_function_response = deleteImage($_GET["id"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload and display image from database</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <?php if($delete_function_response): ?>
        <div class="delete-image-error">
        <span>
            <?= $delete_function_response ?>
        </span>

        <span>
            <a href="index.php">Dismiss</a>
        </span>
    </div>

    <?php endif; ?>

    <?php $images = getImages(); ?>

    <div class="info">
        Upload images <strong><?= count($images)?></strong>
    </div>

    <div class="preview">

        <?php foreach($images as $image): ?>

        <div class="image-wrapper">
            <img src="uploads/<?= $image['image']?>" alt="">
            <a href="?delete-image&id=<?= $image['id']?>">Delete Image</a>
        </div>

        <?php endforeach; ?>
    </div>

    <div class="upload-box">
        <form action="" method="post" enctype="multipart/form-data">
        <label>Select image to Upload</label>

        <input type="file" name="image">

        <button type="submit" name="upload">Upload</button>

        <?php if($response == "success"): ?>
            <p class="success">File Uploaded successfully</p>
            <?php else: ?>
                <p class="error"><?php echo $response ?></p>
        <?php endif; ?>
    </form>
    </div>
</body>
</html>