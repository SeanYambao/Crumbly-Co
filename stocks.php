<?php
declare(strict_types=1);
include 'includes/header.php';

$cookie_stock = [
    "Chocolate Chip" => ["price" => 120, "stock" => 45],
    "Oreo" => ["price" => 140, "stock" => 30],
    "Matcha" => ["price" => 160, "stock" => 25],
    "Peanut Butter" => ["price" => 130, "stock" => 40],
    "Sugar" => ["price" => 100, "stock" => 60],
    "Red Velvet" => ["price" => 150, "stock" => 35]
];

$taxRate = 12;

function get_reorder_message(int $stock): string {
    return ($stock < 30) ? "Yes" : "No";
} 

function get_total_value(float $price, int $qty): float {
    return $price * $qty;
}

function get_tax_due(float $price, int $qty, int $taxRate = 12): float {
    return ($price * $qty) * ($taxRate / 100);
}
?>

<div class="header">
    <h1>Cookie Stock Control</h1>
    <p>Current cookie stocks</p>
</div>

<div class="container">
    <div class="welcome">
        <h2>Stock Status</h2>
        <p>Last updated: <?= date('Y-m-d') ?></p>
    </div>

    <div class="cookies">
        <h2>Cookie Inventory</h2>
        <table class="cookie-table">
            <tr>
                <th>Cookie</th>
                <th>Stock</th>
                <th>Re-Order</th>
                <th>Total Value (₱)</th>
                <th>Tax Due (₱)</th>
            </tr>

            <?php 
            $total_cookies = 0;
            $total_value = 0;
            $total_tax = 0;
            $low_stock_count = 0;
            
            foreach ($cookie_stock as $cookie_name => $data):
                $price = $data["price"];
                $stock = $data["stock"];
                $total_val = get_total_value($price, $stock);
                $tax_due = get_tax_due($price, $stock, $taxRate);
                
                $total_cookies += $stock;
                $total_value += $total_val;
                $total_tax += $tax_due;
                
                if ($stock < 30) {
                    $low_stock_count++;
                }
            ?>
            <tr>
                <td><?= $cookie_name ?></td>
                <td><?= $stock ?></td>
                <td><?= get_reorder_message($stock) ?></td>
                <td>₱<?= number_format($total_val, 2) ?></td>
                <td>₱<?= number_format($tax_due, 2) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div class="numbers">
        <div class="num-box">
            <h3><?= count($cookie_stock) ?></h3>
            <p>Cookie Types</p>
        </div>
        <div class="num-box">
            <h3><?= $total_cookies ?></h3>
            <p>Total Cookies</p>
        </div>
        <div class="num-box">
            <h3>₱<?= number_format($total_value, 2) ?></h3>
            <p>Total Value</p>
        </div>
        <div class="num-box">
            <h3><?= $low_stock_count ?></h3>
            <p>Need Re-order</p>
        </div>
    </div>

    <div class="about">
        <h2>Stock Summary</h2>
        <p><strong>Total Tax Due:</strong> ₱<?= number_format($total_tax, 2) ?></p>
        <p><strong>Tax Rate:</strong> <?= $taxRate ?>%</p>
        <p><strong>Re-order Policy:</strong> Order when stock < 30 pieces</p>
    </div>
</div>

<?php include 'includes/footer.php'; ?>