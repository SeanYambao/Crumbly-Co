<?php include 'includes/header.php'; ?>

<?php
$cookies = array(
    array('Chocolate Chip', 120, 'Classic cookies with chocolate chips'),
    array('Oreo', 140, 'Cookies with crushed Oreo pieces'),
    array('Matcha', 160, 'Green tea flavored cookies'),
    array('Peanut Butter', 130, 'Rich peanut butter cookies'),
    array('Sugar', 100, 'Simple sugar cookies'),
    array('Red Velvet', 150, 'Red velvet flavored cookies')
);

$cookie_count = count($cookies);
?>

<div class="header">
    <h1>Our Products</h1>
    <p>Check out all our cookie varieties</p>
</div>

<div class="container">
    <div class="welcome">
        <h2>All Products</h2>
        <p>We have <?= $cookie_count ?> different types of cookies.</p>
    </div>

    <div class="cookies">
        <h2>Cookie List</h2>
        <table class="cookie-table">
            <tr>
                <th>Cookie</th>
                <th>Price</th>
                <th>Description</th>
            </tr>
            <?php for ($i = 0; $i < $cookie_count; $i++) { ?>
            <tr>
                <td><?= $cookies[$i][0] ?></td>
                <td>₱<?= $cookies[$i][1] ?></td>
                <td><?= $cookies[$i][2] ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>

    <div class="special">
        <h2>Special Box</h2>
        <p>Get all 6 types in one box!</p>
        <p>Only ₱200 for 12 pieces</p>
        <p><a href="index.php">View Special Offer</a></p>
    </div>

    <div class="about">
        <h2>Freshly Baked</h2>
        <p>All our cookies are baked fresh daily.</p>
        <p>Visit our store to try them!</p>
    </div>
</div>

<?php include 'includes/footer.php'; ?>