<?php include 'includes/header.php'; ?>

<?php
// Variables
$shop = 'Crumbly Co.';
$name = 'Sean Yambao';
$desc = 'Fresh homemade cookies';

// Arrays
$cookies = array(
    array('Chocolate Chip', 120, 45),
    array('Oreo', 140, 30),
    array('Matcha', 160, 25),
    array('Peanut Butter', 130, 40),
    array('Sugar', 100, 60),
    array('Red Velvet', 150, 35)
);

// Expressions & Operators
$box = 250;
$off = 50;
$now = $box - $off;
$per_cookie = $now / 12;
$tax = $now * 0.12;
$total_with_tax = $now + $tax;
$is_cheap = $now < 200;
$same_price = $box == 250;

// Type Juggling
$string_num = "100";
$real_num = 50;
$result = $string_num + $real_num;
$text = $string_num . $real_num;

// if else
$stock = 45;
if ($stock > 50) {
    $stock_status = "High stock";
} else if ($stock > 20) {
    $stock_status = "Good stock";
} else {
    $stock_status = "Low stock";
}

// switch
$day = "Monday";
switch ($day) {
    case "Monday":
        $day_special = "10% off all cookies";
        break;
    case "Friday":
        $day_special = "Free delivery";
        break;
    default:
        $day_special = "Regular prices";
}

// match
$cookie_type = "Matcha";
$price_level = match($cookie_type) {
    "Chocolate Chip", "Sugar" => "Budget",
    "Oreo", "Peanut Butter" => "Standard", 
    "Matcha", "Red Velvet" => "Premium",
    default => "Regular"
};

// while loop
$counter = 3;
$discount_days = "";
while ($counter > 0) {
    $discount_days .= $counter . " ";
    $counter--;
}

// do while loop
$cookies_left = 5;
$low_stock = "";
do {
    $low_stock .= $cookies_left . " ";
    $cookies_left--;
} while ($cookies_left > 0);

// for loop
$total_cookies = 0;
$cookie_count = count($cookies);
for ($i = 0; $i < $cookie_count; $i++) {
    $total_cookies += $cookies[$i][2];
}

// foreach loop
$all_cookies = "";
foreach ($cookies as $cookie) {
    $all_cookies .= $cookie[0] . " ";
}
?>

<div class="header">
    <h1><?= $shop ?></h1>
    <p><?= $desc ?></p>
</div>

<div class="container">
    <div class="welcome">
        <h2>Welcome</h2>
        <p>Hi! I'm <?= $name ?>. We bake fresh cookies every day.</p>
        <p>Today: <?= $day_special ?></p>
        <p>Matcha cookies are <?= $price_level ?> quality.</p>
    </div>

    <div class="special">
        <h2>Special</h2>
        <p>Cookie Box (6 types)</p>
        <div class="price">
            <span class="old">₱<?= $box ?></span>
            <span class="new">₱<?= $now ?></span>
        </div>
        <p>Save ₱<?= $off ?></p>
    </div>

    <div class="cookies">
        <h2>Our Cookies</h2>
        <table class="cookie-table">
            <tr>
                <th>Cookie</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Status</th>
            </tr>
            <?php for ($i = 0; $i < $cookie_count; $i++) { ?>
            <tr>
                <td><?= $cookies[$i][0] ?></td>
                <td>₱<?= $cookies[$i][1] ?></td>
                <td><?= $cookies[$i][2] ?></td>
                <td>
                    <?php 
                    if ($cookies[$i][2] > 50) {
                        echo "High";
                    } else if ($cookies[$i][2] > 20) {
                        echo "Good";
                    } else {
                        echo "Low";
                    }
                    ?>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>

    <div class="numbers">
        <div class="num-box">
            <h3><?= $cookie_count ?></h3>
            <p>Types</p>
        </div>
        <div class="num-box">
            <h3><?= $total_cookies ?></h3>
            <p>Total</p>
        </div>
    </div>

    <div class="about">
        <h2>About</h2>
        <p>We make good cookies with fresh ingredients.</p>
        <p>Come try our cookies!</p>
    </div>
</div>

<?php include 'includes/footer.php'; ?>