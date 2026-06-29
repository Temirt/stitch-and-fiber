# Laravel UI Implementation Guide - Stitch & Fiber

This document provides the source code and implementation instructions for the **Stitch & Fiber** modern maker's studio UI, optimized for a Laravel project using **Tailwind CSS**.

## Prerequisites
Ensure your Laravel project has Tailwind CSS installed. If not, follow the [Laravel Tailwind Installation Guide](https://tailwindcss.com/docs/guides/laravel).

## 1. Tailwind Configuration
Add your design system tokens to your `tailwind.config.js` to maintain consistency across your application.

```javascript
/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: '#87a96b', // Sage Green
        secondary: '#a65d47', // Terracotta
        background: '#fbf9f8', // Oatmeal
        surface: {
          DEFAULT: '#fbf9f8',
          dim: '#dcd9d9',
          container: '#f6f3f2',
        }
      },
      fontFamily: {
        display: ['Playfair Display', 'serif'],
        body: ['Inter', 'sans-serif'],
      },
      borderRadius: {
        'artisanal': '8px',
      }
    },
  },
  plugins: [],
}
```

## 2. Layout Component (`resources/views/components/layout.blade.php`)
Create a base layout that includes the shared navigation and footer.

```html
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Stitch & Fiber Studio' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
</head>
<body class="bg-background text-zinc-900 font-body">
    <!-- Top Navigation -->
    <nav class="fixed top-0 w-full z-50 bg-background/80 backdrop-blur-md shadow-sm">
        <div class="max-w-[1200px] mx-auto px-6 flex justify-between items-center h-20">
            <a href="/" class="font-display text-3xl text-primary font-bold">Stitch & Fiber</a>
            <div class="hidden md:flex space-x-8 items-center">
                <a href="/" class="hover:text-primary transition-colors font-medium">Home</a>
                <a href="/shop" class="hover:text-primary transition-colors font-medium">Shop</a>
                <a href="/story" class="hover:text-primary transition-colors font-medium">Story</a>
                <a href="/gallery" class="hover:text-primary transition-colors font-medium">Gallery</a>
                <button class="p-2 hover:scale-110 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                </button>
            </div>
        </div>
    </nav>

    <main class="pt-20">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-surface-container py-20 px-6 border-t border-zinc-200">
        <div class="max-w-[1200px] mx-auto grid grid-cols-1 md:grid-cols-3 gap-12">
            <div>
                <h3 class="font-display text-2xl text-primary mb-4">Stitch & Fiber</h3>
                <p class="text-zinc-600 max-w-xs">Elevating the art of crochet through sustainable luxury and timeless design.</p>
            </div>
            <div class="grid grid-cols-2 gap-8">
                <div>
                    <h4 class="font-bold mb-4">Studio</h4>
                    <ul class="space-y-2 text-zinc-600">
                        <li><a href="#" class="hover:text-primary">Our Story</a></li>
                        <li><a href="#" class="hover:text-primary">Process</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Social</h4>
                    <ul class="space-y-2 text-zinc-600">
                        <li><a href="#" class="hover:text-primary">Instagram</a></li>
                        <li><a href="#" class="hover:text-primary">Pinterest</a></li>
                    </ul>
                </div>
            </div>
            <div>
                <h4 class="font-bold mb-4">Newsletter</h4>
                <form class="flex gap-2">
                    <input type="email" placeholder="Email address" class="bg-white border border-zinc-300 px-4 py-2 rounded-artisanal flex-grow outline-none focus:border-primary">
                    <button class="bg-primary text-white px-6 py-2 rounded-artisanal hover:opacity-90 transition-opacity">Join</button>
                </form>
            </div>
        </div>
        <div class="max-w-[1200px] mx-auto mt-16 pt-8 border-t border-zinc-200 text-sm text-zinc-500">
            © 2024 Stitch & Fiber Studio. Handcrafted with intention.
        </div>
    </footer>
</body>
</html>
```

## 3. Blade View Example (`resources/views/home.blade.php`)
This demonstrates how to structure a page using the layout component.

```html
<x-layout>
    <x-slot:title>Artistry in Every Stitch | Stitch & Fiber</x-slot>

    <!-- Hero Section -->
    <section class="relative h-[80vh] flex items-center justify-center overflow-hidden">
        <img src="{{ asset('images/hero.jpg') }}" class="absolute inset-0 w-full h-full object-cover" alt="Crochet texture">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative z-10 bg-white/90 backdrop-blur-sm p-12 max-w-2xl mx-6 rounded-artisanal text-center shadow-2xl">
            <h1 class="font-display text-5xl md:text-6xl mb-6">Artistry in Every Stitch.</h1>
            <p class="text-lg text-zinc-600 mb-8">Discover handcrafted textile pieces designed with intention, using only the finest natural fibers for a lifetime of warmth.</p>
            <a href="/shop" class="inline-block bg-secondary text-white px-10 py-4 rounded-artisanal font-bold hover:scale-105 transition-transform">
                Explore the Collection
            </a>
        </div>
    </section>

    <!-- Featured Section -->
    <section class="max-w-[1200px] mx-auto py-24 px-6">
        <div class="flex justify-between items-end mb-12">
            <div>
                <span class="text-primary font-bold tracking-widest text-sm uppercase">The New Arrivals</span>
                <h2 class="font-display text-4xl mt-2">Seasonal Masterpieces</h2>
            </div>
            <div class="hidden md:block h-[1px] bg-zinc-200 flex-grow mx-12"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Product Card -->
            @foreach($featured as $product)
            <div class="group cursor-pointer">
                <div class="aspect-[3/4] overflow-hidden rounded-artisanal mb-4 bg-zinc-100">
                    <img src="{{ $product->image }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                </div>
                <h3 class="font-display text-xl mb-1">{{ $product->name }}</h3>
                <p class="text-zinc-500">${{ number_format($product->price, 2) }}</p>
            </div>
            @endforeach
        </div>
    </section>
</x-layout>
```

## 4. Assets
Export images from the canvas and place them in your `public/images` directory. Ensure you use high-resolution photography to maintain the "Modern Maker" aesthetic.
