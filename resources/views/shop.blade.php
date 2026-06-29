<x-layout>
    <x-slot:title>Shop the Collection | Stitch & Fiber</x-slot>

    <div class="max-w-[1200px] mx-auto py-24 px-6">
        <!-- Header -->
        <div class="mb-16 border-b border-zinc-200 pb-10">
            <span class="text-primary font-bold tracking-widest text-sm uppercase block mb-4">Artisanal Catalog</span>
            <h1 class="font-display text-5xl md:text-6xl text-zinc-900 font-extrabold">The Collection</h1>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">
            <!-- Sidebar Filters -->
            <div class="space-y-10 lg:sticky lg:top-28 lg:h-fit">
                <!-- Search -->
                <div>
                    <h3 class="text-xs uppercase font-extrabold tracking-wider text-zinc-400 mb-4">Search</h3>
                    <form method="GET" action="/shop" class="relative">
                        @if(request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        @if(request('sort'))
                            <input type="hidden" name="sort" value="{{ request('sort') }}">
                        @endif
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search collection..." class="w-full bg-white border border-zinc-200 px-4 py-3 rounded-artisanal text-sm outline-none focus:border-primary transition-colors pr-10">
                        <button type="submit" class="absolute right-3 top-3.5 text-zinc-400 hover:text-zinc-900 transition-colors">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                        </button>
                    </form>
                </div>

                <!-- Categories -->
                <div>
                    <h3 class="text-xs uppercase font-extrabold tracking-wider text-zinc-400 mb-4">Categories</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="/shop?{{ http_build_query(array_merge(request()->query(), ['category' => 'All'])) }}" class="flex items-center justify-between text-sm transition-colors hover:text-primary font-medium {{ (!request('category') || request('category') === 'All') ? 'text-primary font-bold' : 'text-zinc-600' }}">
                                <span>All Products</span>
                            </a>
                        </li>
                        @foreach($categories as $category)
                        <li>
                            <a href="/shop?{{ http_build_query(array_merge(request()->query(), ['category' => $category])) }}" class="flex items-center justify-between text-sm transition-colors hover:text-primary font-medium {{ request('category') === $category ? 'text-primary font-bold' : 'text-zinc-600' }}">
                                <span>{{ $category }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Sort -->
                <div>
                    <h3 class="text-xs uppercase font-extrabold tracking-wider text-zinc-400 mb-4">Sort By</h3>
                    <select onchange="window.location.href=this.value" class="w-full bg-white border border-zinc-200 px-4 py-3 rounded-artisanal text-sm outline-none focus:border-primary transition-colors text-zinc-700">
                        <option value="/shop?{{ http_build_query(array_merge(request()->query(), ['sort' => 'default'])) }}" {{ request('sort') == 'default' ? 'selected' : '' }}>Featured</option>
                        <option value="/shop?{{ http_build_query(array_merge(request()->query(), ['sort' => 'price_low'])) }}" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                        <option value="/shop?{{ http_build_query(array_merge(request()->query(), ['sort' => 'price_high'])) }}" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                        <option value="/shop?{{ http_build_query(array_merge(request()->query(), ['sort' => 'name_asc'])) }}" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name: A to Z</option>
                    </select>
                </div>

                <!-- Reset Filters -->
                @if(request()->anyFilled(['search', 'category', 'sort']))
                <div>
                    <a href="/shop" class="inline-flex items-center gap-2 text-xs font-bold text-secondary hover:text-secondary-dark border-b border-secondary transition-colors pb-0.5">
                        Clear all filters
                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                    </a>
                </div>
                @endif
            </div>

            <!-- Product Grid -->
            <div class="lg:col-span-3">
                @if($products->isEmpty())
                <div class="text-center py-24 border-2 border-dashed border-zinc-200 rounded-artisanal">
                    <svg class="h-12 w-12 text-zinc-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <h3 class="font-display text-xl text-zinc-900 mb-2">No products found</h3>
                    <p class="text-sm text-zinc-500 max-w-[280px] mx-auto">Try adjusting your filters, searching for something else, or viewing another category.</p>
                </div>
                @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                    @foreach($products as $product)
                    <div class="group">
                        <!-- Image Container with Hover Effects -->
                        <div class="relative aspect-[3/4] overflow-hidden rounded-artisanal mb-4 bg-zinc-100 shadow-ambient transition-all duration-500 group-hover:shadow-ambient-hover group-hover:-translate-y-1">
                            <a href="/shop/{{ $product->slug }}">
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            </a>
                            <!-- Difficulty / Label Chip -->
                            @if($product->difficulty_level)
                            <span class="absolute top-4 left-4 bg-secondary/15 text-secondary text-[10px] font-extrabold tracking-widest uppercase px-3 py-1 rounded-full border border-secondary/20 shadow-sm backdrop-blur-sm">
                                {{ $product->difficulty_level }}
                            </span>
                            @endif
                            <!-- Quick Add Hover Overlay -->
                            <div class="absolute inset-x-0 bottom-0 p-4 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <button onclick="addToCart({{ $product->id }})" class="w-full bg-white text-zinc-900 py-2.5 rounded-artisanal font-bold hover:bg-primary hover:text-white transition-colors text-xs shadow-md">Add to Bag</button>
                            </div>
                        </div>
                        
                        <!-- Product Text Details -->
                        <div class="space-y-1">
                            <div class="flex justify-between items-start gap-4">
                                <a href="/shop/{{ $product->slug }}">
                                    <h3 class="font-display text-lg text-zinc-900 font-bold group-hover:text-primary transition-colors leading-snug">{{ $product->name }}</h3>
                                </a>
                                <span class="font-bold text-zinc-900 text-sm whitespace-nowrap">${{ number_format($product->price, 2) }}</span>
                            </div>
                            <p class="text-[10px] text-zinc-400 font-medium tracking-wide uppercase">{{ $product->category }}</p>
                            @if($product->material)
                            <p class="text-xs text-zinc-500 font-normal line-clamp-1 italic">{{ $product->material }}</p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>
