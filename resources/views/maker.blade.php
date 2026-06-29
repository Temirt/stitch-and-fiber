<x-layout>
    <x-slot:title>Maker's Portal | Stitch & Fiber</x-slot>

    <div class="max-w-[1200px] mx-auto py-24 px-6">
        <!-- Header -->
        <div class="mb-16 border-b border-zinc-200 pb-10">
            <span class="text-primary font-bold tracking-widest text-sm uppercase block mb-4">Maker's Hub</span>
            <h1 class="font-display text-5xl md:text-6xl text-zinc-900 font-extrabold">Active Projects</h1>
            <p class="text-zinc-500 mt-4 max-w-xl text-lg">Keep track of your stitch counts and progress on your handcrafted projects in real-time.</p>
        </div>

        @if(empty($patterns))
        <div class="text-center py-24 border-2 border-dashed border-zinc-200 rounded-artisanal bg-white">
            <h3 class="font-display text-xl text-zinc-900 mb-2">No active projects</h3>
            <p class="text-sm text-zinc-500 max-w-[280px] mx-auto mb-8">Start a project from our patterns collection to track it here.</p>
            <a href="/shop?category=Patterns" class="bg-primary text-white px-8 py-3 rounded-artisanal hover:bg-primary-dark transition-all text-sm font-bold shadow-md shadow-primary/10">Browse Patterns</a>
        </div>
        @else
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            @foreach($patterns as $id => $pattern)
            <div id="pattern-card-{{ $id }}" class="bg-white border border-zinc-100 rounded-2xl shadow-ambient p-8 flex flex-col md:flex-row gap-8 items-start group hover:shadow-ambient-hover transition-all duration-300">
                <!-- Image -->
                <div class="w-full md:w-40 aspect-[3/4] rounded-xl overflow-hidden bg-zinc-100 shrink-0 shadow-sm relative">
                    <img src="{{ asset($pattern['image']) }}" alt="{{ $pattern['name'] }}" class="w-full h-full object-cover">
                </div>

                <!-- Info and controls -->
                <div class="flex-grow w-full flex flex-col justify-between h-full min-h-[200px]">
                    <div>
                        <h2 class="font-display text-2xl font-bold text-zinc-900 mb-3 group-hover:text-primary transition-colors">{{ $pattern['name'] }}</h2>
                        
                        <!-- Metadata list -->
                        <div class="grid grid-cols-2 gap-y-4 gap-x-4 text-xs text-zinc-500 mb-6 font-medium">
                            <div>
                                <span class="text-zinc-400 block uppercase font-bold text-[10px] tracking-wider mb-0.5">Stitch Type</span>
                                <span class="text-zinc-800 text-sm font-semibold">{{ $pattern['stitch_type'] }}</span>
                            </div>
                            <div>
                                <span class="text-zinc-400 block uppercase font-bold text-[10px] tracking-wider mb-0.5">Hook Size</span>
                                <span class="text-zinc-800 text-sm font-semibold">{{ $pattern['hook_size'] }}</span>
                            </div>
                            <div class="col-span-2">
                                <span class="text-zinc-400 block uppercase font-bold text-[10px] tracking-wider mb-0.5">Yarn Fiber</span>
                                <span class="text-zinc-800 text-sm font-semibold">{{ $pattern['yarn_type'] }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Progress & Controls -->
                    <div class="mt-auto pt-4 border-t border-zinc-100">
                        <div class="flex justify-between items-end mb-3">
                            <span class="text-xs uppercase font-extrabold text-zinc-400 tracking-wider">Progress</span>
                            <span class="text-sm font-bold text-zinc-800">
                                Row <span id="current-row-val-{{ $id }}">{{ $pattern['current_row'] }}</span> of {{ $pattern['total_rows'] }}
                            </span>
                        </div>

                        <!-- Progress Bar -->
                        @php
                            $percent = min(100, max(0, ($pattern['current_row'] / $pattern['total_rows']) * 100));
                        @endphp
                        <div class="stitch-bar w-full">
                            <div id="progress-fill-{{ $id }}" class="stitch-fill" style="width: {{ $percent }}%"></div>
                        </div>

                        <!-- Controls -->
                        <div class="flex items-center gap-3 mt-6">
                            <button onclick="updateRow('{{ $id }}', 'decrement')" class="flex-grow md:flex-grow-0 w-12 h-12 border border-zinc-200 rounded-artisanal flex items-center justify-center hover:bg-zinc-50 hover:border-zinc-300 active:scale-95 transition-all text-zinc-600 focus:outline-none cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" /></svg>
                            </button>
                            <button onclick="updateRow('{{ $id }}', 'increment')" class="flex-grow md:flex-grow-0 w-12 h-12 border border-zinc-200 rounded-artisanal flex items-center justify-center hover:bg-zinc-50 hover:border-zinc-300 active:scale-95 transition-all text-zinc-600 focus:outline-none cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                            </button>
                            <button onclick="updateRow('{{ $id }}', 'reset')" class="text-xs font-bold text-zinc-400 hover:text-secondary hover:border-secondary transition-colors px-4 py-2 border border-transparent hover:border-zinc-200 rounded-artisanal ml-auto focus:outline-none cursor-pointer">
                                Reset
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>

    <!-- Script for Row Management -->
    <script>
        async function updateRow(id, action) {
            try {
                const response = await fetch(`/maker-portal/${action}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ id: id })
                });

                if (response.ok) {
                    const data = await response.json();
                    
                    // Update labels
                    const rowLabel = document.getElementById(`current-row-val-${id}`);
                    if (rowLabel) {
                        rowLabel.textContent = data.current_row;
                    }
                    
                    // Update progress bar
                    const progressBar = document.getElementById(`progress-fill-${id}`);
                    if (progressBar) {
                        const percent = (data.current_row / data.total_rows) * 100;
                        progressBar.style.width = `${percent}%`;
                    }
                } else {
                    console.error('Failed to update row counter:', response.statusText);
                }
            } catch (err) {
                console.error('Error updating row counter:', err);
            }
        }
    </script>
</x-layout>
