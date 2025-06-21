<?php require('./php/functions.php')?>
<?php 

    if(isset($_GET['title'])){
        $title = urldecode($_GET['title']);
        $product = getProductByTitle($title);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $product[0]['meta_description']?>">
    <meta name="keywords" content="<?= $product[0]['meta_keywords']?>">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    footer {
        position: fixed;
        bottom: 0;
    }
</style>
<body>
    <?php include('includes/nav.php')?>
    <?php include('includes/header.php') ?>

    <main>
        <div class="left">
            <div class="section-title">Products Categories</div>

            <?php $categories = getCategories(); ?>

            <?php foreach($categories as $category): ?>
                <a href="category.php?category=<?= urlencode($category['category'])?>">
                    <?= ucfirst($category['category'])?>
                </a>
            <?php endforeach; ?>
        </div>

        <div class="right">
            <div class="section-title">Product Details</div>
                <div class="product">
                    <div class="product-left">
                        <img src="<?= $product[0]['image']?>" alt="<?= $product[0]['title']?>">
                    </div>
                    <div class="product-right">
                        <p class="title">
                            <?= $product[0]['title']?>
                        </p>

                        <p class="description">
                            <?= $product[0]['description']?>
                        </p>

                        <p class="price">
                            <?= $product[0]['price']?> &euro;
                        </p>

                    </div>
                </div>
        </div>
    </main>
    <?php include('includes/footer.php')?>
    <script src="js/script.js"></script>
</body>
</html>