<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Stitch & Fiber Studio' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
</head>
<body class="bg-background text-zinc-900 font-body">
    <!-- Top Navigation -->
    <nav class="fixed top-0 w-full z-40 bg-background/80 backdrop-blur-md shadow-sm">
        <div class="max-w-[1200px] mx-auto px-6 flex justify-between items-center h-20">
            <a href="/" class="font-display text-3xl text-primary font-extrabold tracking-tight">Stitch & Fiber</a>
            <div class="hidden md:flex space-x-8 items-center">
                <a href="/" class="hover:text-primary transition-colors font-medium {{ Request::is('/') ? 'text-primary border-b border-primary pb-1' : '' }}">Home</a>
                <a href="/shop" class="hover:text-primary transition-colors font-medium {{ Request::is('shop*') ? 'text-primary border-b border-primary pb-1' : '' }}">Shop</a>
                <a href="/maker-portal" class="hover:text-primary transition-colors font-medium {{ Request::is('maker-portal*') ? 'text-primary border-b border-primary pb-1' : '' }}">Maker's Portal</a>
                <a href="/story" class="hover:text-primary transition-colors font-medium {{ Request::is('story*') ? 'text-primary border-b border-primary pb-1' : '' }}">Story</a>
                <a href="/gallery" class="hover:text-primary transition-colors font-medium {{ Request::is('gallery*') ? 'text-primary border-b border-primary pb-1' : '' }}">Gallery</a>
                <button id="cart-toggle-btn" class="relative p-2 hover:scale-110 transition-transform focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-zinc-700 hover:text-primary transition-colors"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                    <span id="cart-count-badge" class="absolute -top-1 -right-1 bg-secondary text-white text-[10px] font-bold w-5 h-5 rounded-full flex items-center justify-center border-2 border-white scale-0 transition-transform duration-300">0</span>
                </button>
            </div>
            <!-- Mobile Menu Toggle -->
            <div class="flex md:hidden items-center gap-4">
                <button id="mobile-cart-toggle-btn" class="relative p-2 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-zinc-700 hover:text-primary transition-colors"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                    <span id="mobile-cart-count-badge" class="absolute -top-1 -right-1 bg-secondary text-white text-[10px] font-bold w-5 h-5 rounded-full flex items-center justify-center border-2 border-white scale-0 transition-transform duration-300">0</span>
                </button>
                <button id="mobile-menu-btn" class="p-2 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                </button>
            </div>
        </div>
        <!-- Mobile Dropdown Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-background border-b border-zinc-200 px-6 py-4 space-y-4 shadow-lg absolute w-full left-0 transition-all duration-300">
            <a href="/" class="block hover:text-primary font-medium py-1">Home</a>
            <a href="/shop" class="block hover:text-primary font-medium py-1">Shop</a>
            <a href="/maker-portal" class="block hover:text-primary font-medium py-1">Maker's Portal</a>
            <a href="/story" class="block hover:text-primary font-medium py-1">Story</a>
            <a href="/gallery" class="block hover:text-primary font-medium py-1">Gallery</a>
        </div>
    </nav>

    <main class="pt-20 min-h-[70vh]">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-surface-container py-24 px-6 border-t border-zinc-200">
        <div class="max-w-[1200px] mx-auto grid grid-cols-1 md:grid-cols-4 gap-12">
            <div class="md:col-span-2">
                <h3 class="font-display text-2xl text-primary mb-6">Stitch & Fiber</h3>
                <p class="text-zinc-600 max-w-xs leading-relaxed">Elevating the art of crochet through sustainable luxury and timeless design. Each piece is handcrafted with intention in our studio.</p>
            </div>
            <div>
                <h4 class="font-bold mb-6 text-zinc-900 uppercase tracking-wider text-sm">Studio</h4>
                <ul class="space-y-3 text-zinc-600">
                    <li><a href="/story" class="hover:text-primary transition-colors">Our Story</a></li>
                    <li><a href="/gallery" class="hover:text-primary transition-colors">Visual Journal</a></li>
                    <li><a href="/maker-portal" class="hover:text-primary transition-colors">Maker's Portal</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-6 text-zinc-900 uppercase tracking-wider text-sm">Follow Us</h4>
                <ul class="space-y-3 text-zinc-600">
                    <li><a href="#" class="hover:text-primary transition-colors">Instagram</a></li>
                    <li><a href="#" class="hover:text-primary transition-colors">Pinterest</a></li>
                </ul>
            </div>
        </div>
        <div class="max-w-[1200px] mx-auto mt-20 pt-8 border-t border-zinc-200">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <p class="text-sm text-zinc-500">© 2024 Stitch & Fiber Studio. Handcrafted with intention.</p>
                <div class="flex gap-8 text-sm text-zinc-500">
                    <a href="#" class="hover:text-primary">Privacy Policy</a>
                    <a href="#" class="hover:text-primary">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Cart Slide-over Drawer -->
    <x-cart-drawer />

    <!-- Core Interactive Client Logic -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Cart toggles
            const cartToggle = document.getElementById('cart-toggle-btn');
            const mobileCartToggle = document.getElementById('mobile-cart-toggle-btn');
            const cartDrawer = document.getElementById('cart-drawer');
            const cartClose = document.getElementById('cart-close-btn');
            const cartOverlay = document.getElementById('cart-overlay');
            
            // Badge elements
            const cartCountBadge = document.getElementById('cart-count-badge');
            const mobileCartCountBadge = document.getElementById('mobile-cart-count-badge');
            
            // Drawer contents
            const cartItemsContainer = document.getElementById('cart-items-container');
            const cartSubtotal = document.getElementById('cart-subtotal');
            const cartFooter = document.getElementById('cart-footer');
            const cartEmptyState = document.getElementById('cart-empty-state');

            // Mobile menu toggle
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                });
            }

            function toggleCart(show) {
                if (show) {
                    cartDrawer.classList.remove('translate-x-full');
                    cartOverlay.classList.remove('opacity-0', 'pointer-events-none');
                    cartOverlay.classList.add('opacity-100');
                } else {
                    cartDrawer.classList.add('translate-x-full');
                    cartOverlay.classList.add('opacity-0', 'pointer-events-none');
                    cartOverlay.classList.remove('opacity-100');
                }
            }

            if (cartToggle) cartToggle.addEventListener('click', () => toggleCart(true));
            if (mobileCartToggle) mobileCartToggle.addEventListener('click', () => toggleCart(true));
            if (cartClose) cartClose.addEventListener('click', () => toggleCart(false));
            if (cartOverlay) cartOverlay.addEventListener('click', () => toggleCart(false));

            window.refreshCart = async function() {
                try {
                    const response = await fetch('/cart');
                    const data = await response.json();
                    updateCartUI(data);
                } catch (e) {
                    console.error('Error fetching cart:', e);
                }
            }

            window.addToCart = async function(productId, quantity = 1) {
                try {
                    const response = await fetch('/cart/add', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ product_id: productId, quantity: parseInt(quantity) })
                    });
                    const data = await response.json();
                    updateCartUI(data);
                    toggleCart(true);
                } catch (e) {
                    console.error('Error adding to cart:', e);
                }
            }

            window.updateCartQty = async function(productId, qty) {
                if (qty <= 0) {
                    await removeFromCart(productId);
                    return;
                }
                try {
                    const response = await fetch('/cart/update', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ product_id: productId, quantity: parseInt(qty) })
                    });
                    const data = await response.json();
                    updateCartUI(data);
                } catch (e) {
                    console.error('Error updating cart:', e);
                }
            }

            window.removeFromCart = async function(productId) {
                try {
                    const response = await fetch('/cart/remove', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ product_id: productId })
                    });
                    const data = await response.json();
                    updateCartUI(data);
                } catch (e) {
                    console.error('Error removing from cart:', e);
                }
            }

            function updateCartUI(cart) {
                const count = Object.values(cart).reduce((sum, item) => sum + item.quantity, 0);
                
                // Update Desktop badge
                if (cartCountBadge) {
                    if (count > 0) {
                        cartCountBadge.textContent = count;
                        cartCountBadge.classList.remove('scale-0');
                        cartCountBadge.classList.add('scale-100');
                    } else {
                        cartCountBadge.classList.remove('scale-100');
                        cartCountBadge.classList.add('scale-0');
                    }
                }

                // Update Mobile badge
                if (mobileCartCountBadge) {
                    if (count > 0) {
                        mobileCartCountBadge.textContent = count;
                        mobileCartCountBadge.classList.remove('scale-0');
                        mobileCartCountBadge.classList.add('scale-100');
                    } else {
                        mobileCartCountBadge.classList.remove('scale-100');
                        mobileCartCountBadge.classList.add('scale-0');
                    }
                }

                if (Object.keys(cart).length === 0) {
                    if (cartEmptyState) cartEmptyState.classList.remove('hidden');
                    if (cartFooter) cartFooter.classList.add('hidden');
                    if (cartItemsContainer) cartItemsContainer.innerHTML = '';
                    return;
                }

                if (cartEmptyState) cartEmptyState.classList.add('hidden');
                if (cartFooter) cartFooter.classList.remove('hidden');

                let html = '';
                let subtotal = 0;

                for (const [id, item] of Object.entries(cart)) {
                    const price = parseFloat(item.price);
                    const total = price * item.quantity;
                    subtotal += total;

                    html += `
                        <div class="flex items-center gap-4 py-4 border-b border-zinc-200">
                            <img src="${item.image ? '/' + item.image : '/images/product-1.png'}" alt="${item.name}" class="w-16 h-20 object-cover rounded-artisanal bg-zinc-100">
                            <div class="flex-grow">
                                <h4 class="font-display text-sm font-bold text-zinc-900">${item.name}</h4>
                                <p class="text-[10px] tracking-wider text-primary uppercase font-bold mt-0.5">${item.category}</p>
                                <div class="flex items-center gap-2 mt-2">
                                    <button onclick="updateCartQty(${id}, ${item.quantity - 1})" class="w-6 h-6 border border-zinc-300 rounded flex items-center justify-center hover:bg-zinc-100 text-zinc-600 transition-colors font-bold text-xs">-</button>
                                    <span class="text-xs font-semibold w-4 text-center">${item.quantity}</span>
                                    <button onclick="updateCartQty(${id}, ${item.quantity + 1})" class="w-6 h-6 border border-zinc-300 rounded flex items-center justify-center hover:bg-zinc-100 text-zinc-600 transition-colors font-bold text-xs">+</button>
                                </div>
                            </div>
                            <div class="text-right flex flex-col justify-between h-20 py-1">
                                <p class="font-bold text-sm text-zinc-900">$${total.toFixed(2)}</p>
                                <button onclick="removeFromCart(${id})" class="text-xs text-secondary hover:text-secondary-dark font-semibold transition-colors mt-2">Remove</button>
                            </div>
                        </div>
                    `;
                }

                if (cartItemsContainer) cartItemsContainer.innerHTML = html;
                if (cartSubtotal) cartSubtotal.textContent = '$' + subtotal.toFixed(2);
            }

            refreshCart();
        });
    </script>
</body>
</html>

