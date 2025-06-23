<?php
// Fungsi untuk mendapatkan produk
function getProducts($limit = null) {
    global $pdo;
    
    $sql = "SELECT * FROM products WHERE status = 'active'";
    if ($limit) {
        $sql .= " LIMIT " . (int)$limit;
    }
    
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fungsi untuk mendapatkan testimoni
function getTestimonials() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM testimonials WHERE approved = 1 ORDER BY RAND() LIMIT 5");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fungsi untuk format harga
function formatPrice($price) {
    return 'Rp ' . number_format($price, 0, ',', '.');
}

// Fungsi untuk menambahkan produk ke keranjang
function addToCart($productId, $quantity = 1) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] += $quantity;
    } else {
        $_SESSION['cart'][$productId] = $quantity;
    }
}

// Fungsi untuk mendapatkan jumlah item di keranjang
function getCartItemCount() {
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        return 0;
    }
    
    return array_sum($_SESSION['cart']);
}
?>