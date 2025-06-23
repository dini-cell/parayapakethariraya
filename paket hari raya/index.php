<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paket Lebaran Spesial - PARAYA</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Header Section -->
    <div id="header-placeholder"></div>
    
    <!-- Opening Section -->
    <section class="opening-section">
        <div class="container">
            <h2>Selamatkan Lebaran Anda dengan Hemat Hingga 40%</h2>
            <p>Tahun ini, rayakan Lebaran tanpa khawatir budget membengkak. PARAYA menghadirkan paket spesial dengan sistem cicilan mingguan yang ringan dan bonus menarik!</p>
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/example" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </section>
    
    <!-- Benefits Section -->
    <div id="benefits-placeholder"></div>
    
    <!-- Reasons Section -->
    <div id="reasons-placeholder"></div>
    
    <!-- Testimonials Section -->
    <div id="testimonials-placeholder"></div>
    
    <!-- Urgency Section -->
    <div id="urgency-placeholder"></div>
    
    <!-- Bonus Section -->
    <div id="bonus-placeholder"></div>
    
    <!-- Packages Section -->
    <div id="packages-placeholder"></div>
    
    <!-- Guarantee Section -->
    <div id="guarantee-placeholder"></div>
    
    <!-- Note Section -->
    <div id="note-placeholder"></div>
    
    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2>Jangan Lewatkan Kesempatan Ini!</h2>
            <p>Pesan sekarang sebelum kehabisan stok. Kuota terbatas hanya untuk 100 pembeli pertama.</p>
            <button class="cta-button" id="mainCta">
                <i class="fab fa-whatsapp"></i> Pesan Sekarang
            </button>
            <p class="small-text">Klik tombol di atas akan langsung terhubung ke WhatsApp kami</p>
        </div>
    </section>
    
    <!-- Footer Section -->
    <div id="footer-placeholder"></div>
    
    <!-- Cart Section -->
    <div class="cart-section">
        <div class="cart-panel" id="cartPanel">
            <h3 class="cart-title"><i class="fas fa-shopping-cart"></i> Keranjang Belanja</h3>
            <div class="cart-items" id="cartItems"></div>
            <div class="cart-total" id="cartTotal">Total: Rp0</div>
            <div class="cart-actions">
                <button class="clear-btn" id="clearCart">Kosongkan</button>
                <button class="checkout-btn" id="checkout">Pesan via WhatsApp</button>
            </div>
        </div>
        <button class="cart-btn" id="cartBtn">
            <i class="fas fa-shopping-cart"></i>
            <span class="cart-count" id="cartCount">0</span>
        </button>
    </div>
    
    <script src="js/script.js"></script>
    <script>
        // Load components
        const components = [
            'header', 'benefits', 'reasons', 'testimonials', 
            'urgency', 'bonus', 'packages', 'guarantee', 'note', 'footer'
        ];
        
        components.forEach(component => {
            fetch(`components/${component}.html`)
                .then(response => response.text())
                .then(data => document.getElementById(`${component}-placeholder`).innerHTML = data);
        });
        
        // Main CTA button
        document.getElementById('mainCta')?.addEventListener('click', function() {
            window.open('https://wa.me/6282113665914?text=Saya%20ingin%20memesan%20paket%20Lebaran%20PARAYA', '_blank');
        });
    </script>
</body>
</html>