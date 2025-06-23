<?php
// Data produk bisa diambil dari database
$products = [
    [
        'id' => 1,
        'name' => 'Paket Humaira',
        'price' => 16.500,
        'discount' => 16.500,
        'image' => 'paket1.jpg',
        'features' => ['Parcel eksklusif', 'Kue kering premium', 'Kurma ajwa', 'Kartu ucapan', 'Kemasan mewah']
    ],
    [
        'id' => 2,
        'name' => 'Paket Sembako Lengkap',
        'price' => 650000,
        'discount' => 550000,
        'image' => 'paket2.jpg',
        'features' => ['Beras 5kg', 'Minyak goreng 2L', 'Gula 2kg', 'Teh & kopi', 'Bumbu dapur lengkap']
    ],
    [
        'id' => 3,
        'name' => 'Paket Kue Lebaran',
        'price' => 450000,
        'discount' => 399000,
        'image' => 'paket3.jpg',
        'features' => ['10 jenis kue kering', 'Kemasan cantik', 'Tahan hingga 2 minggu', 'Rasa premium', 'Tanpa pengawet']
    ],
    [
        'id' => 4,
        'name' => 'Paket Parcel Ekonomis',
        'price' => 350000,
        'discount' => 299000,
        'image' => 'paket4.jpg',
        'features' => ['5 jenis kue kering', 'Kurma', 'Sirup', 'Kemasan menarik', 'Harga terjangkau']
    ]
];

foreach ($products as $product) {
    echo '
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="badge bg-danger position-absolute" style="top: 0.5rem; right: 0.5rem">HOT</div>
            <img src="assets/images/' . $product['image'] . '" class="card-img-top" alt="' . $product['name'] . '">
            <div class="card-body">
                <h5 class="card-title">' . $product['name'] . '</h5>
                <div class="mb-3">
                    <span class="text-danger fw-bold fs-4">Rp ' . number_format($product['discount'], 0, ',', '.') . '</span>
                    <span class="text-decoration-line-through text-muted ms-2">Rp ' . number_format($product['price'], 0, ',', '.') . '</span>
                </div>
                <ul class="list-unstyled mb-4">';
                
    foreach ($product['features'] as $feature) {
        echo '<li class="mb-2 d-flex">
                <i class="bi bi-check-circle-fill text-primary me-2 mt-1"></i>
                <span>' . $feature . '</span>
              </li>';
    }
    
    echo '</ul>
            </div>
            <div class="card-footer bg-transparent border-0 pb-3">
                <button class="btn btn-primary w-100 add-to-cart" data-id="' . $product['id'] . '">Pesan Sekarang</button>
            </div>
        </div>
    </div>';
}
?>