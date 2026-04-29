<x-app-layout>
    <div class="min-h-screen bg-gray-950 py-12 px-4">
        <div class="max-w-2xl mx-auto">

            {{-- Header --}}
            <div class="mb-10 text-center">
                <div class="inline-flex items-center gap-2 bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 text-xs font-semibold uppercase tracking-widest px-4 py-2 rounded-full mb-4">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 8 8"><circle cx="4" cy="4" r="4"/></svg>
                    AI-Powered
                </div>
                <h1 class="text-4xl font-bold text-white tracking-tight">Sales Page Generator</h1>
                <p class="mt-2 text-gray-400 text-sm">Fill in your product details and let AI craft a compelling sales page.</p>
            </div>

            {{-- Form Card --}}
            <div class="bg-gray-900 border border-gray-800 rounded-2xl shadow-2xl p-8">
                <form method="POST" action="/generate" class="space-y-6" id="generate-form" onsubmit="showLoading()">
                    @csrf

                    {{-- Product Name --}}
                    <div>
                        <label class="block text-xs font-semibold text-gray-400 uppercase tracking-widest mb-2">Product Name</label>
                        <input
                            type="text"
                            name="product_name"
                            placeholder="e.g. iPhone 15 Pro Max"
                            required
                            class="w-full bg-gray-800 border border-gray-700 text-white placeholder-gray-600 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                        >
                    </div>

                    {{-- Description --}}
                    <div>
                        <label class="block text-xs font-semibold text-gray-400 uppercase tracking-widest mb-2">Product Description</label>
                        <textarea
                            name="description"
                            placeholder="Describe your product in detail..."
                            rows="4"
                            required
                            class="w-full bg-gray-800 border border-gray-700 text-white placeholder-gray-600 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition resize-none"
                        ></textarea>
                    </div>

                    {{-- Features --}}
                    <div>
                        <label class="block text-xs font-semibold text-gray-400 uppercase tracking-widest mb-2">Key Features</label>
                        <input
                            type="text"
                            name="features"
                            placeholder="e.g. Fast, Durable, Lightweight"
                            class="w-full bg-gray-800 border border-gray-700 text-white placeholder-gray-600 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                        >
                    </div>

                    {{-- Two Columns --}}
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-400 uppercase tracking-widest mb-2">Target Audience</label>
                            <input
                                type="text"
                                name="target_audience"
                                placeholder="e.g. Entrepreneurs"
                                class="w-full bg-gray-800 border border-gray-700 text-white placeholder-gray-600 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-400 uppercase tracking-widest mb-2">Price</label>
                            <input
                                type="text"
                                name="price"
                                placeholder="e.g. $99"
                                class="w-full bg-gray-800 border border-gray-700 text-white placeholder-gray-600 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                            >
                        </div>
                    </div>

                    {{-- Submit --}}
                    <button
                        type="submit"
                        id="submit-btn"
                        class="w-full bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-700 text-white font-semibold rounded-xl py-3 px-6 text-sm tracking-wide transition-all duration-150 flex items-center justify-center gap-2 shadow-lg shadow-indigo-500/20"
                    >
                        <svg id="btn-icon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        <span id="btn-text">Generate Sales Page</span>
                    </button>
                </form>
            </div>

            {{-- Footer link --}}
            <p class="text-center text-gray-600 text-xs mt-6">
                View past generations →
                <a href="/history" class="text-indigo-400 hover:text-indigo-300 transition">History</a>
            </p>
        </div>
    </div>

    {{-- Loading Overlay --}}
    <div id="loading-overlay" class="fixed inset-0 bg-gray-950/90 backdrop-blur-sm z-50 hidden flex items-center justify-center">
        <div class="text-center">
            {{-- Spinner --}}
            <div class="relative w-16 h-16 mx-auto mb-6">
                <div class="absolute inset-0 rounded-full border-4 border-gray-800"></div>
                <div class="absolute inset-0 rounded-full border-4 border-transparent border-t-indigo-500 animate-spin"></div>
                <div class="absolute inset-2 rounded-full bg-indigo-500/10 flex items-center justify-center">
                    <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
            </div>
            <p class="text-white font-semibold text-lg">Generating your sales page...</p>
            <p class="text-gray-400 text-sm mt-1">AI is crafting your content, please wait.</p>

            {{-- Animated dots --}}
            <div class="flex items-center justify-center gap-1.5 mt-4">
                <div class="w-2 h-2 bg-indigo-500 rounded-full animate-bounce" style="animation-delay: 0ms"></div>
                <div class="w-2 h-2 bg-indigo-500 rounded-full animate-bounce" style="animation-delay: 150ms"></div>
                <div class="w-2 h-2 bg-indigo-500 rounded-full animate-bounce" style="animation-delay: 300ms"></div>
            </div>
        </div>
    </div>

    <script>
        function showLoading() {
            // Show overlay
            const overlay = document.getElementById('loading-overlay');
            overlay.classList.remove('hidden');
            overlay.classList.add('flex');

            // Disable button
            const btn = document.getElementById('submit-btn');
            btn.disabled = true;
            btn.classList.add('opacity-75', 'cursor-not-allowed');

            // Change button text
            document.getElementById('btn-text').textContent = 'Generating...';
            document.getElementById('btn-icon').innerHTML = `
                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" class="opacity-25"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
            `;
        }
    </script>
</x-app-layout>