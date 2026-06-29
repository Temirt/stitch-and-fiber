<x-layout>
    <x-slot:title>Order Confirmed | Stitch & Fiber</x-slot>

    <div class="max-w-[700px] mx-auto py-24 px-6 text-center">
        <!-- Success Icon -->
        <div class="w-20 h-20 bg-primary/10 rounded-full flex items-center justify-center text-primary mx-auto mb-8 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-10 h-10"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
        </div>

        <span class="text-primary font-bold tracking-widest text-sm uppercase block mb-4">Thank You</span>
        <h1 class="font-display text-4xl md:text-5xl text-zinc-900 font-extrabold mb-6">Order Placed Successfully!</h1>
        <p class="text-zinc-600 text-lg mb-12 max-w-md mx-auto">We've received your order, <strong>{{ $order['first_name'] }} {{ $order['last_name'] }}</strong>. A confirmation email has been sent to <strong>{{ $order['email'] }}</strong>.</p>

        <!-- Order details card -->
        <div class="bg-white border border-zinc-100 shadow-ambient rounded-2xl p-8 mb-12 text-left">
            <div class="flex justify-between items-center mb-6 pb-4 border-b border-zinc-100">
                <span class="text-zinc-400 font-bold uppercase text-[10px] tracking-wider">Order ID</span>
                <span class="font-mono text-zinc-950 font-bold text-sm bg-zinc-100 px-3 py-1 rounded-md">{{ $order['order_id'] }}</span>
            </div>

            <!-- Items summary list -->
            <h3 class="text-xs uppercase font-extrabold tracking-wider text-zinc-400 mb-4">Items Ordered</h3>
            <div class="divide-y divide-zinc-100">
                @foreach($order['items'] as $id => $item)
                <div class="flex justify-between py-4 {{ $loop->first ? 'pt-0' : '' }} {{ $loop->last ? 'pb-0' : '' }}">
                    <div class="flex gap-4">
                        <img src="{{ $item['image'] ? asset($item['image']) : asset('images/product-1.png') }}" alt="{{ $item['name'] }}" class="w-10 h-14 object-cover rounded bg-zinc-50 border border-zinc-100">
                        <div>
                            <h4 class="text-sm font-bold text-zinc-900">{{ $item['name'] }}</h4>
                            <p class="text-xs text-zinc-500 mt-0.5">Quantity: {{ $item['quantity'] }}</p>
                        </div>
                    </div>
                    <span class="text-sm font-bold text-zinc-900">${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/shop" class="inline-block bg-zinc-900 text-white px-10 py-4 rounded-artisanal font-bold hover:bg-zinc-800 transition-all shadow-md">
                Continue Shopping
            </a>
            <a href="/maker-portal" class="inline-block bg-white text-zinc-900 border border-zinc-200 px-10 py-4 rounded-artisanal font-bold hover:bg-zinc-50 transition-all shadow-sm">
                Go to Maker's Portal
            </a>
        </div>
    </div>
</x-layout>
