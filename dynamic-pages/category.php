<?php require('./php/functions.php')?>
<?php 

    if(isset($_GET['category'])){
        $cat = urldecode($_GET['category']);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Store</title>
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
            <div class="section-title">Products in the <?=ucfirst($cat)?> category</div>
            <?php $products = getProductsByCategory($cat); ?>
                <div class="product">
                    <?php foreach($products as $product): ?>
                        <div class="product-left">
                            <img src="<?= $product['image']?>" alt="<?= $product['title']?>">
                        </div>
                        <div class="product-right">
                            <p class="title">
                                <a href="product.php?title=<?= urlencode($product['title'])?>"><?= $product['title']?></a>
                            </p>

                            <p class="description">
                                <?= $product['description']?>
                            </p>

                            <p class="price">
                                <?= $product['price']?> &euro;
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
        </div>
    </main>
    <?php include('includes/footer.php')?>
    <script src="js/script.js"></script>
</body>
</html>