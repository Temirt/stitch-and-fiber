<x-layout>
    <x-slot:title>Checkout | Stitch & Fiber</x-slot>

    <div class="max-w-[1200px] mx-auto py-24 px-6">
        <!-- Header -->
        <div class="mb-16 border-b border-zinc-200 pb-10">
            <span class="text-primary font-bold tracking-widest text-sm uppercase block mb-4">Secure Checkout</span>
            <h1 class="font-display text-5xl text-zinc-900 font-extrabold">Finalize Your Order</h1>
        </div>

        <form action="/checkout" method="POST" class="grid grid-cols-1 lg:grid-cols-12 gap-16">
            @csrf

            <!-- Form Details -->
            <div class="lg:col-span-7 space-y-12">
                <!-- Customer Details -->
                <div>
                    <h2 class="font-display text-2xl font-bold text-zinc-900 mb-6 pb-2 border-b border-zinc-100">1. Contact Information</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="first_name" class="block text-xs uppercase font-extrabold tracking-wider text-zinc-500 mb-2">First Name</label>
                            <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required class="w-full bg-white border @error('first_name') border-red-500 @else border-zinc-200 @enderror px-4 py-3 rounded-artisanal text-sm outline-none focus:border-primary transition-colors">
                            @error('first_name')
                                <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="last_name" class="block text-xs uppercase font-extrabold tracking-wider text-zinc-500 mb-2">Last Name</label>
                            <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required class="w-full bg-white border @error('last_name') border-red-500 @else border-zinc-200 @enderror px-4 py-3 rounded-artisanal text-sm outline-none focus:border-primary transition-colors">
                            @error('last_name')
                                <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label for="email" class="block text-xs uppercase font-extrabold tracking-wider text-zinc-500 mb-2">Email Address</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required class="w-full bg-white border @error('email') border-red-500 @else border-zinc-200 @enderror px-4 py-3 rounded-artisanal text-sm outline-none focus:border-primary transition-colors">
                            @error('email')
                                <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Shipping Details -->
                <div>
                    <h2 class="font-display text-2xl font-bold text-zinc-900 mb-6 pb-2 border-b border-zinc-100">2. Shipping Address</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                        <div class="sm:col-span-3">
                            <label for="address" class="block text-xs uppercase font-extrabold tracking-wider text-zinc-500 mb-2">Street Address</label>
                            <input type="text" id="address" name="address" value="{{ old('address') }}" required class="w-full bg-white border @error('address') border-red-500 @else border-zinc-200 @enderror px-4 py-3 rounded-artisanal text-sm outline-none focus:border-primary transition-colors">
                            @error('address')
                                <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label for="city" class="block text-xs uppercase font-extrabold tracking-wider text-zinc-500 mb-2">City</label>
                            <input type="text" id="city" name="city" value="{{ old('city') }}" required class="w-full bg-white border @error('city') border-red-500 @else border-zinc-200 @enderror px-4 py-3 rounded-artisanal text-sm outline-none focus:border-primary transition-colors">
                            @error('city')
                                <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="zip" class="block text-xs uppercase font-extrabold tracking-wider text-zinc-500 mb-2">ZIP / Postal Code</label>
                            <input type="text" id="zip" name="zip" value="{{ old('zip') }}" required class="w-full bg-white border @error('zip') border-red-500 @else border-zinc-200 @enderror px-4 py-3 rounded-artisanal text-sm outline-none focus:border-primary transition-colors">
                            @error('zip')
                                <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Payment Details -->
                <div>
                    <h2 class="font-display text-2xl font-bold text-zinc-900 mb-6 pb-2 border-b border-zinc-100">3. Payment Information</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-4 gap-6">
                        <div class="sm:col-span-4">
                            <label for="card_name" class="block text-xs uppercase font-extrabold tracking-wider text-zinc-500 mb-2">Name on Card</label>
                            <input type="text" id="card_name" name="card_name" value="{{ old('card_name') }}" required class="w-full bg-white border @error('card_name') border-red-500 @else border-zinc-200 @enderror px-4 py-3 rounded-artisanal text-sm outline-none focus:border-primary transition-colors">
                            @error('card_name')
                                <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="sm:col-span-4">
                            <label for="card_number" class="block text-xs uppercase font-extrabold tracking-wider text-zinc-500 mb-2">Card Number</label>
                            <input type="text" id="card_number" name="card_number" value="{{ old('card_number') }}" required placeholder="•••• •••• •••• ••••" class="w-full bg-white border @error('card_number') border-red-500 @else border-zinc-200 @enderror px-4 py-3 rounded-artisanal text-sm outline-none focus:border-primary transition-colors">
                            @error('card_number')
                                <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label for="card_expiry" class="block text-xs uppercase font-extrabold tracking-wider text-zinc-500 mb-2">Expiration Date (MM/YY)</label>
                            <input type="text" id="card_expiry" name="card_expiry" value="{{ old('card_expiry') }}" required placeholder="MM/YY" maxlength="7" class="w-full bg-white border @error('card_expiry') border-red-500 @else border-zinc-200 @enderror px-4 py-3 rounded-artisanal text-sm outline-none focus:border-primary transition-colors">
                            @error('card_expiry')
                                <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label for="card_cvc" class="block text-xs uppercase font-extrabold tracking-wider text-zinc-500 mb-2">CVC</label>
                            <input type="text" id="card_cvc" name="card_cvc" value="{{ old('card_cvc') }}" required placeholder="•••" maxlength="4" class="w-full bg-white border @error('card_cvc') border-red-500 @else border-zinc-200 @enderror px-4 py-3 rounded-artisanal text-sm outline-none focus:border-primary transition-colors">
                            @error('card_cvc')
                                <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary Column -->
            <div class="lg:col-span-5">
                <div class="bg-surface-container rounded-2xl p-8 border border-zinc-100 shadow-ambient sticky top-28">
                    <h2 class="font-display text-2xl font-bold text-zinc-900 mb-6 pb-2 border-b border-zinc-200">Order Summary</h2>

                    <!-- Items List -->
                    <div class="divide-y divide-zinc-200 max-h-[300px] overflow-y-auto mb-6 pr-2">
                        @foreach($cart as $id => $item)
                        <div class="flex items-center gap-4 py-4 {{ $loop->first ? 'pt-0' : '' }}">
                            <img src="{{ $item['image'] ? asset($item['image']) : asset('images/product-1.png') }}" alt="{{ $item['name'] }}" class="w-12 h-16 object-cover rounded bg-white border border-zinc-200 shrink-0">
                            <div class="flex-grow min-w-0">
                                <h4 class="text-sm font-bold text-zinc-900 truncate">{{ $item['name'] }}</h4>
                                <p class="text-xs text-zinc-500 mt-0.5">Qty: {{ $item['quantity'] }}</p>
                            </div>
                            <span class="text-sm font-bold text-zinc-900 whitespace-nowrap">${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                        </div>
                        @endforeach
                    </div>

                    <!-- Pricing breakdown -->
                    <div class="space-y-3 text-sm border-t border-zinc-200 pt-6">
                        <div class="flex justify-between text-zinc-600">
                            <span>Subtotal</span>
                            <span class="font-semibold text-zinc-900">${{ number_format($subtotal, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-zinc-600">
                            <span>Shipping</span>
                            <span class="font-semibold text-zinc-900">${{ number_format($shipping, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-zinc-600">
                            <span>Tax (8%)</span>
                            <span class="font-semibold text-zinc-900">${{ number_format($tax, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-base font-bold text-zinc-900 border-t border-zinc-200 pt-4 mt-2">
                            <span>Total</span>
                            <span class="font-display text-xl">${{ number_format($total, 2) }}</span>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-secondary text-white text-center py-4 rounded-artisanal font-bold hover:bg-secondary-dark transition-colors shadow-lg hover:shadow-secondary/20 mt-8 cursor-pointer">
                        Place Order
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-layout>
