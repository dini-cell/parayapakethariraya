document.addEventListener('DOMContentLoaded', function() {
    const cart = [];
    const cartBtn = document.getElementById('cartBtn');
    const cartPanel = document.getElementById('cartPanel');
    const cartItems = document.getElementById('cartItems');
    const cartCount = document.getElementById('cartCount');
    const cartTotal = document.getElementById('cartTotal');
    const clearCartBtn = document.getElementById('clearCart');
    const checkoutBtn = document.getElementById('checkout');
    
    // Countdown timer
    function updateCountdown() {
        const now = new Date();
        const endOfDay = new Date();
        endOfDay.setHours(23, 59, 59, 0);
        
        const diff = endOfDay - now;
        
        const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((diff % (1000 * 60)) / 1000);
        
        document.getElementById('countdown').textContent = 
            `${Math.floor(hours).toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
    }
    
    setInterval(updateCountdown, 1000);
    updateCountdown();
    
    // Cart functionality
    cartBtn.addEventListener('click', function() {
        cartPanel.classList.toggle('show');
    });
    
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('add-btn')) {
            const button = e.target;
            const name = button.getAttribute('data-name');
            const price = parseInt(button.getAttribute('data-price'));
            const quantity = parseInt(button.parentElement.querySelector('.quantity').value);
            
            addToCart(name, price, quantity);
            
            // Visual feedback
            button.innerHTML = '<i class="fas fa-check"></i> Ditambahkan';
            button.style.backgroundColor = '#27ae60';
            setTimeout(() => {
                button.innerHTML = '+ Keranjang';
                button.style.backgroundColor = '#2ecc71';
            }, 1500);
        }
    });
    
    function addToCart(name, price, quantity) {
        const existingItem = cart.find(item => item.name === name);
        
        if (existingItem) {
            existingItem.quantity += quantity;
        } else {
            cart.push({ name, price, quantity });
        }
        
        updateCart();
        cartPanel.classList.add('show');
        
        // Animate cart button
        cartBtn.style.transform = 'scale(1.2)';
        setTimeout(() => {
            cartBtn.style.transform = 'scale(1)';
        }, 300);
    }
    
    function updateCart() {
        cartItems.innerHTML = '';
        let total = 0;
        let itemCount = 0;
        
        cart.forEach(item => {
            const itemTotal = item.price * item.quantity;
            total += itemTotal;
            itemCount += item.quantity;
            
            const itemElement = document.createElement('div');
            itemElement.className = 'cart-item';
            itemElement.innerHTML = `
                <div class="cart-item-name">${item.name}</div>
                <div class="cart-item-qty">
                    <button class="qty-btn minus" data-name="${item.name}">-</button>
                    ${item.quantity}
                    <button class="qty-btn plus" data-name="${item.name}">+</button>
                </div>
                <div class="cart-item-price">Rp${itemTotal.toLocaleString('id-ID')}</div>
                <button class="remove-btn" data-name="${item.name}"><i class="fas fa-times"></i></button>
            `;
            
            cartItems.appendChild(itemElement);
        });
        
        cartCount.textContent = itemCount;
        cartTotal.textContent = `Total: Rp${total.toLocaleString('id-ID')}`;
        
        // Add event listeners to new buttons
        document.querySelectorAll('.qty-btn.minus').forEach(btn => {
            btn.addEventListener('click', function() {
                const itemName = this.getAttribute('data-name');
                const item = cart.find(item => item.name === itemName);
                if (item.quantity > 1) {
                    item.quantity--;
                    updateCart();
                }
            });
        });
        
        document.querySelectorAll('.qty-btn.plus').forEach(btn => {
            btn.addEventListener('click', function() {
                const itemName = this.getAttribute('data-name');
                const item = cart.find(item => item.name === itemName);
                item.quantity++;
                updateCart();
            });
        });
        
        document.querySelectorAll('.remove-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const itemName = this.getAttribute('data-name');
                const itemIndex = cart.findIndex(item => item.name === itemName);
                if (itemIndex !== -1) {
                    cart.splice(itemIndex, 1);
                    updateCart();
                }
            });
        });
    }
    
    clearCartBtn.addEventListener('click', function() {
        if (cart.length > 0 && confirm('Apakah Anda yakin ingin mengosongkan keranjang?')) {
            cart.length = 0;
            updateCart();
        }
    });
    
    checkoutBtn.addEventListener('click', function() {
        if (cart.length === 0) {
            alert('Keranjang belanja kosong. Silahkan tambahkan produk terlebih dahulu.');
            return;
        }
        
        let message = 'Halo PARAYA, saya ingin memesan paket Lebaran berikut:\n\n';
        
        cart.forEach(item => {
            message += `✔ *${item.name}* (${item.quantity}x) - Rp${(item.price * item.quantity).toLocaleString('id-ID')}\n`;
        });
        
        message += `\n💰 *Total: Rp${cart.reduce((sum, item) => sum + (item.price * item.quantity), 0).toLocaleString('id-ID')}*\n\n`;
        message += 'Saya ingin informasi lebih lanjut mengenai:\n';
        message += '- Cara pembayaran cicilan\n';
        message += '- Jadwal pengiriman\n';
        message += '- Bonus yang akan didapat\n\n';
        message += 'Terima kasih.';
        
        const whatsappUrl = `https://wa.me/6282113665914?text=${encodeURIComponent(message)}`;
        window.open(whatsappUrl, '_blank');
    });
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
});