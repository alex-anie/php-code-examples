<?php require "functions.php"?>
<?php 
    $countries = getCountries();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic MySQL Select Menu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="page">
        <h3>Please select your country and city</h3>

        <form name="my-form" action="" method="post">
            <select name="countries" onclick="getCities(this.value)">
                <option value="">Choose a Country</option>
                <!-- Populated with PHP -->
                <?php foreach($countries as $country): ?>
                    <option value="<?= $country['country_code']?>"><?= $country['country_name'] ?></option>
                <?php endforeach; ?>
            </select>

            <select name="cities" disabled>
                <option value="">Choose a City</option>
                <!-- Populated with JavaScript -->
            </select>
            
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>