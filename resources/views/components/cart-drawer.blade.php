<!-- cart-drawer.blade.php -->
<div class="relative z-50">
    <!-- Backdrop Overlay -->
    <div id="cart-overlay" class="fixed inset-0 bg-zinc-900/50 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300"></div>

    <!-- Slide-over panel -->
    <div id="cart-drawer" class="fixed inset-y-0 right-0 max-w-md w-full bg-background shadow-2xl border-l border-zinc-200 translate-x-full transition-transform duration-300 ease-in-out flex flex-col">
        <!-- Header -->
        <div class="px-6 py-6 border-b border-zinc-200 flex justify-between items-center bg-white">
            <h2 class="font-display text-2xl text-zinc-900 font-bold">Shopping Bag</h2>
            <button id="cart-close-btn" class="p-2 -mr-2 text-zinc-500 hover:text-zinc-900 focus:outline-none transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>

        <!-- Contents -->
        <div class="flex-grow overflow-y-auto px-6 py-4">
            <!-- Empty state -->
            <div id="cart-empty-state" class="hidden flex flex-col items-center justify-center h-full text-center py-20">
                <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center text-primary mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                </div>
                <h3 class="font-display text-xl text-zinc-900 mb-2">Your bag is empty</h3>
                <p class="text-sm text-zinc-500 max-w-[250px] mb-8">Add beautiful handcrafted items from our collection to get started.</p>
                <a href="/shop" class="bg-primary text-white px-8 py-3 rounded-artisanal hover:bg-primary-dark transition-all text-sm font-bold shadow-md shadow-primary/10">Shop the Catalog</a>
            </div>

            <!-- Item List -->
            <div id="cart-items-container" class="divide-y divide-zinc-200">
                <!-- Dynamically populated -->
            </div>
        </div>

        <!-- Footer -->
        <div id="cart-footer" class="hidden border-t border-zinc-200 p-6 bg-white shadow-[0_-10px_20px_rgba(0,0,0,0.02)]">
            <div class="flex justify-between items-center mb-6">
                <span class="text-zinc-600 font-medium">Estimated Subtotal</span>
                <span id="cart-subtotal" class="font-display text-2xl font-bold text-zinc-900">$0.00</span>
            </div>
            <p class="text-xs text-zinc-500 mb-6">Taxes and shipping calculated at checkout.</p>
            <a href="/checkout" class="block w-full bg-secondary text-white text-center py-4 rounded-artisanal font-bold hover:bg-secondary-dark transition-colors shadow-lg hover:shadow-secondary/20">
                Proceed to Checkout
            </a>
        </div>
    </div>
</div>
