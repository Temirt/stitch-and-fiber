<x-layout>
    <x-slot:title>Artistry in Every Stitch | Stitch & Fiber</x-slot>

    <!-- Hero Section -->
    <section class="relative h-[85vh] flex items-center justify-center overflow-hidden">
        <img src="{{ asset('images/hero.png') }}" class="absolute inset-0 w-full h-full object-cover" alt="Close up of high quality natural yarn and crochet texture">
        <div class="absolute inset-0 bg-zinc-900/40"></div>
        <div class="relative z-10 bg-white/95 backdrop-blur-md p-10 md:p-16 max-w-2xl mx-6 rounded-artisanal text-center shadow-2xl transform hover:scale-[1.01] transition-transform duration-500">
            <span class="text-primary font-bold tracking-[0.2em] text-sm uppercase mb-4 block">Modern Maker's Studio</span>
            <h1 class="font-display text-5xl md:text-7xl mb-8 leading-tight text-zinc-900">Artistry in Every <span class="text-primary">Stitch</span>.</h1>
            <p class="text-lg text-zinc-600 mb-10 leading-relaxed">Discover handcrafted textile pieces designed with intention, using only the finest natural fibers for a lifetime of warmth and style.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/shop" class="inline-block bg-secondary text-white px-10 py-4 rounded-artisanal font-bold hover:bg-secondary/90 transition-all shadow-lg hover:shadow-secondary/20">
                    Explore the Collection
                </a>
                <a href="/story" class="inline-block bg-white text-zinc-900 border border-zinc-200 px-10 py-4 rounded-artisanal font-bold hover:bg-zinc-50 transition-all shadow-sm">
                    Our Story
                </a>
            </div>
        </div>
    </section>

    <!-- Featured Section -->
    <section class="max-w-[1200px] mx-auto py-32 px-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-16 gap-6">
            <div class="max-w-md">
                <span class="text-primary font-bold tracking-widest text-sm uppercase">Curated Selection</span>
                <h2 class="font-display text-4xl md:text-5xl mt-4 leading-tight">Seasonal Masterpieces</h2>
            </div>
            <div class="flex items-center gap-4 group cursor-pointer">
                <span class="font-bold text-zinc-900 border-b-2 border-primary pb-1 group-hover:pr-2 transition-all">View All Products</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            @foreach($featured as $product)
            <div class="group">
                <div class="relative aspect-[3/4] overflow-hidden rounded-artisanal mb-6 bg-zinc-100 shadow-ambient transition-all duration-500 group-hover:shadow-ambient-hover group-hover:-translate-y-1">
                    <a href="/shop/{{ $product->slug }}">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    </a>
                    <div class="absolute inset-x-0 bottom-0 p-6 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <button onclick="addToCart({{ $product->id }})" class="w-full bg-white text-zinc-900 py-3 rounded-artisanal font-bold hover:bg-primary hover:text-white transition-colors">Quick Add</button>
                    </div>
                </div>
                <div class="flex justify-between items-start">
                    <div>
                        <a href="/shop/{{ $product->slug }}">
                            <h3 class="font-display text-2xl mb-2 text-zinc-900 group-hover:text-primary transition-colors">{{ $product->name }}</h3>
                        </a>
                        <p class="text-zinc-500 font-medium tracking-wide uppercase text-xs">{{ $product->category }}</p>
                    </div>
                    <p class="text-zinc-900 font-bold text-lg">${{ number_format($product->price, 2) }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Content Section -->
    <section class="bg-surface-container py-32 px-6">
        <div class="max-w-[1200px] mx-auto grid grid-cols-1 md:grid-cols-2 gap-20 items-center">
            <div class="relative">
                <div class="absolute -top-4 -left-4 w-64 h-64 bg-primary/10 rounded-full blur-3xl"></div>
                <img src="{{ asset('images/process.png') }}" alt="Our Process" class="relative rounded-artisanal shadow-2xl border-8 border-white">
            </div>
            <div>
                <span class="text-secondary font-bold tracking-widest text-sm uppercase">Our Philosophy</span>
                <h2 class="font-display text-4xl md:text-5xl mt-4 mb-8 leading-tight">Grown by Nature,<br>Made by Hand.</h2>
                <p class="text-lg text-zinc-600 mb-8 leading-relaxed">We believe in slow fashion. Every Stitch & Fiber creation begins with responsibly sourced natural fibers—organic cotton, ethically harvested wool, and sustainable hemp.</p>
                <ul class="space-y-4 mb-10">
                    <li class="flex items-center gap-3 text-zinc-700">
                        <svg class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                        100% Biodegradable Materials
                    </li>
                    <li class="flex items-center gap-3 text-zinc-700">
                        <svg class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                        Zero-Waste Production Model
                    </li>
                    <li class="flex items-center gap-3 text-zinc-700">
                        <svg class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                        Lifetime Repair Guarantee
                    </li>
                </ul>
                <a href="/story" class="text-zinc-900 font-extrabold border-b-2 border-primary pb-1 hover:border-secondary transition-colors">Learn more about our process</a>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="max-w-[1200px] mx-auto py-32 px-6 text-center">
        <div class="max-w-2xl mx-auto">
            <h2 class="font-display text-4xl md:text-5xl mb-6">Join the Inner Circle</h2>
            <p class="text-lg text-zinc-600 mb-10">Receive early access to seasonal collections and insights into our creative process.</p>
            <form id="newsletter-form-home" class="flex flex-col sm:flex-row gap-4">
                @csrf
                <input type="email" name="email" required placeholder="Enter your email address" class="flex-grow bg-white border border-zinc-200 px-6 py-4 rounded-artisanal outline-none focus:border-primary transition-colors text-lg">
                <button type="submit" class="bg-zinc-900 text-white px-10 py-4 rounded-artisanal font-bold hover:bg-zinc-800 transition-all shadow-lg">Subscribe</button>
            </form>
            <div id="newsletter-message-home" class="mt-6 text-sm font-bold text-primary hidden"></div>
            <p class="mt-6 text-sm text-zinc-400 italic">No spam, just inspiration. Unsubscribe anytime.</p>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('newsletter-form-home');
            const messageDiv = document.getElementById('newsletter-message-home');
            if (form && messageDiv) {
                form.addEventListener('submit', async (e) => {
                    e.preventDefault();
                    messageDiv.classList.add('hidden');
                    messageDiv.textContent = '';
                    try {
                        const response = await fetch('/newsletter', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({ email: form.email.value })
                        });
                        const data = await response.json();
                        if (response.ok) {
                            messageDiv.textContent = data.message;
                            messageDiv.classList.remove('text-red-600');
                            messageDiv.classList.add('text-primary');
                            messageDiv.classList.remove('hidden');
                            form.reset();
                        } else {
                            messageDiv.textContent = data.message || 'This email is already subscribed.';
                            messageDiv.classList.remove('text-primary');
                            messageDiv.classList.add('text-red-600');
                            messageDiv.classList.remove('hidden');
                        }
                    } catch (err) {
                        console.error(err);
                        messageDiv.textContent = 'Unable to subscribe. Please try again later.';
                        messageDiv.classList.remove('text-primary');
                        messageDiv.classList.add('text-red-600');
                        messageDiv.classList.remove('hidden');
                    }
                });
            }
        });
    </script>
</x-layout>
