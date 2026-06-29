<x-layout>
    <x-slot:title>Gallery | Stitch & Fiber</x-slot>

    <div class="max-w-[1200px] mx-auto py-24 px-6">
        <h1 class="font-display text-5xl mb-12">Visual Journal</h1>
        <div class="columns-1 md:columns-2 lg:columns-3 gap-8 space-y-8">
            <div class="break-inside-avoid shadow-sm hover:shadow-xl transition-shadow duration-500 rounded-artisanal overflow-hidden">
                <img src="{{ asset('images/hero.png') }}" class="w-full">
            </div>
            <div class="break-inside-avoid shadow-sm hover:shadow-xl transition-shadow duration-500 rounded-artisanal overflow-hidden">
                <img src="{{ asset('images/process.png') }}" class="w-full">
            </div>
            <div class="break-inside-avoid shadow-sm hover:shadow-xl transition-shadow duration-500 rounded-artisanal overflow-hidden">
                <img src="{{ asset('images/product-1.png') }}" class="w-full">
            </div>
            <div class="break-inside-avoid shadow-sm hover:shadow-xl transition-shadow duration-500 rounded-artisanal overflow-hidden">
                <img src="{{ asset('images/product-2.png') }}" class="w-full">
            </div>
            <div class="break-inside-avoid shadow-sm hover:shadow-xl transition-shadow duration-500 rounded-artisanal overflow-hidden">
                <img src="{{ asset('images/product-3.png') }}" class="w-full">
            </div>
        </div>
    </div>
</x-layout>
