<x-layout>
    <x-slot:title>{{ $product->name }} | Stitch & Fiber</x-slot>

    <div class="max-w-[1200px] mx-auto py-16 px-6">
        <!-- Breadcrumbs -->
        <nav class="flex gap-2 items-center text-xs text-zinc-400 font-semibold tracking-wider uppercase mb-12">
            <a href="/" class="hover:text-primary transition-colors">Home</a>
            <span>/</span>
            <a href="/shop" class="hover:text-primary transition-colors">Shop</a>
            <span>/</span>
            <a href="/shop?category={{ $product->category }}" class="hover:text-primary transition-colors">{{ $product->category }}</a>
            <span>/</span>
            <span class="text-zinc-700">{{ $product->name }}</span>
        </nav>

        <!-- Product Core Details -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-start mb-24">
            <!-- Left: Image Section -->
            <div class="relative rounded-artisanal overflow-hidden bg-zinc-50 shadow-ambient">
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full object-cover aspect-[4/5] hover:scale-105 transition-transform duration-700">
                @if($product->difficulty_level)
                <span class="absolute top-6 left-6 bg-secondary/15 text-secondary text-xs font-extrabold tracking-widest uppercase px-4 py-1.5 rounded-full border border-secondary/20 shadow-sm backdrop-blur-sm">
                    {{ $product->difficulty_level }}
                </span>
                @endif
            </div>

            <!-- Right: Text details and Purchase block -->
            <div class="space-y-8">
                <div>
                    <span class="text-xs uppercase font-extrabold tracking-widest text-primary mb-3 block">{{ $product->category }}</span>
                    <h1 class="font-display text-4xl md:text-5xl text-zinc-900 font-extrabold leading-tight mb-4">{{ $product->name }}</h1>
                    <p class="text-3xl font-bold text-zinc-900">${{ number_format($product->price, 2) }}</p>
                </div>

                <div class="border-t border-b border-zinc-200 py-6 space-y-4">
                    @if($product->material)
                    <div class="flex text-sm">
                        <span class="w-28 text-zinc-400 font-bold uppercase tracking-wider text-xs">Fiber / Blend</span>
                        <span class="text-zinc-700 font-semibold">{{ $product->material }}</span>
                    </div>
                    @endif
                    @if($product->dimensions)
                    <div class="flex text-sm">
                        <span class="w-28 text-zinc-400 font-bold uppercase tracking-wider text-xs">Dimensions</span>
                        <span class="text-zinc-700 font-semibold">{{ $product->dimensions }}</span>
                    </div>
                    @endif
                    <div class="flex text-sm">
                        <span class="w-28 text-zinc-400 font-bold uppercase tracking-wider text-xs">Availability</span>
                        <span class="font-semibold {{ $product->in_stock ? 'text-primary' : 'text-red-500' }}">
                            {{ $product->in_stock ? 'In Stock (Handcrafted to order)' : 'Out of Stock' }}
                        </span>
                    </div>
                </div>

                <div class="space-y-6">
                    <h3 class="text-xs uppercase font-extrabold tracking-wider text-zinc-400">Story & Details</h3>
                    <p class="text-zinc-600 text-base leading-relaxed whitespace-pre-line">{{ $product->description }}</p>
                </div>

                <!-- Add to Bag Form -->
                @if($product->in_stock)
                <div class="pt-4">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <div class="flex items-center border border-zinc-300 rounded-artisanal h-14 bg-white">
                            <button onclick="decrementQty()" class="w-12 h-full flex items-center justify-center text-zinc-500 hover:text-zinc-900 transition-colors font-bold text-lg">-</button>
                            <input type="number" id="purchase-qty" value="1" min="1" class="w-10 text-center font-bold text-sm bg-transparent outline-none border-none [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none">
                            <button onclick="incrementQty()" class="w-12 h-full flex items-center justify-center text-zinc-500 hover:text-zinc-900 transition-colors font-bold text-lg">+</button>
                        </div>
                        <button onclick="triggerAdd()" class="flex-grow bg-primary text-white h-14 rounded-artisanal font-bold hover:bg-primary-dark transition-all shadow-lg hover:shadow-primary/20 flex items-center justify-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                            Add to Shopping Bag
                        </button>
                    </div>
                    <p class="mt-4 text-xs text-zinc-400 flex items-center gap-2">
                        <svg class="h-4 w-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                        Free carbon-neutral shipping on orders over $150.
                    </p>
                </div>
                @endif
            </div>
        </div>

        <!-- Related products section -->
        @if(!$related->isEmpty())
        <div class="border-t border-zinc-200 pt-20">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <span class="text-primary font-bold tracking-widest text-sm uppercase">Complete the Space</span>
                    <h2 class="font-display text-3xl md:text-4xl mt-2 font-extrabold text-zinc-900">Related Masterpieces</h2>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($related as $rel)
                <div class="group">
                    <div class="relative aspect-[3/4] overflow-hidden rounded-artisanal mb-4 bg-zinc-50 shadow-ambient transition-all duration-500 group-hover:shadow-ambient-hover group-hover:-translate-y-1">
                        <a href="/shop/{{ $rel->slug }}">
                            <img src="{{ asset($rel->image) }}" alt="{{ $rel->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        </a>
                        <div class="absolute inset-x-0 bottom-0 p-4 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <button onclick="addToCart({{ $rel->id }})" class="w-full bg-white text-zinc-900 py-2.5 rounded-artisanal font-bold hover:bg-primary hover:text-white transition-colors text-xs shadow-md">Add to Bag</button>
                        </div>
                    </div>
                    <div class="flex justify-between items-start gap-4">
                        <a href="/shop/{{ $rel->slug }}">
                            <h3 class="font-display text-base text-zinc-900 font-bold group-hover:text-primary transition-colors">{{ $rel->name }}</h3>
                        </a>
                        <span class="font-semibold text-zinc-800 text-sm">${{ number_format($rel->price, 2) }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>

    <!-- Product Detail Script Helpers -->
    <script>
        function incrementQty() {
            const input = document.getElementById('purchase-qty');
            if (input) input.value = parseInt(input.value) + 1;
        }

        function decrementQty() {
            const input = document.getElementById('purchase-qty');
            if (input && parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
            }
        }

        function triggerAdd() {
            const qtyInput = document.getElementById('purchase-qty');
            const qty = qtyInput ? parseInt(qtyInput.value) : 1;
            addToCart({{ $product->id }}, qty);
        }
    </script>
</x-layout>
