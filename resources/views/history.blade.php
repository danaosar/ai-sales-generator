<x-app-layout>
    <div class="min-h-screen bg-gray-950 py-12 px-4">
        <div class="max-w-3xl mx-auto">

            {{-- Header --}}
            <div class="mb-8 flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-white tracking-tight">History</h1>
                    <p class="text-gray-400 text-sm mt-1">All your previously generated sales pages.</p>
                </div>
                <a
                    href="/generate"
                    class="flex items-center gap-2 bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-medium px-4 py-2 rounded-xl transition"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    New
                </a>
            </div>

            {{-- Empty State --}}
            @if($pages->isEmpty())
                <div class="bg-gray-900 border border-gray-800 rounded-2xl p-16 text-center">
                    <div class="w-16 h-16 bg-gray-800 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <p class="text-gray-400 font-medium">No generations yet</p>
                    <p class="text-gray-600 text-sm mt-1">Generate your first sales page to see it here.</p>
                    <a href="/generate" class="inline-block mt-6 bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-medium px-6 py-2.5 rounded-xl transition">
                        Get Started
                    </a>
                </div>

            {{-- List --}}
            @else
                <div class="space-y-4">
                    @foreach ($pages as $page)
                    <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden hover:border-indigo-500/40 transition group">

                        {{-- Card Header --}}
                        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-800">
                            <a href="/history/{{ $page->id }}" class="flex items-center gap-3 flex-1 min-w-0">
                                <div class="w-9 h-9 bg-indigo-500/10 border border-indigo-500/20 rounded-xl flex items-center justify-center shrink-0 group-hover:bg-indigo-500/20 transition">
                                    <svg class="w-4 h-4 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                </div>
                                <div class="min-w-0">
                                    <h3 class="text-white font-semibold text-sm truncate">{{ $page->product_name }}</h3>
                                    <p class="text-gray-500 text-xs">{{ $page->created_at->format('d M Y, H:i') }}</p>
                                </div>
                            </a>
                            <div class="flex items-center gap-2 ml-4 shrink-0">
                                <a href="/history/{{ $page->id }}" class="text-gray-600 hover:text-indigo-400 transition p-2 rounded-lg hover:bg-indigo-500/10">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </a>
                                <form method="POST" action="/history/{{ $page->id }}" onsubmit="return confirm('Delete this entry?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-600 hover:text-red-400 transition p-2 rounded-lg hover:bg-red-500/10">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>

                        {{-- Preview (clickable) --}}
                        <a href="/history/{{ $page->id }}" class="block px-6 py-4 hover:bg-gray-800/50 transition">
                            <p class="text-gray-500 text-xs leading-relaxed line-clamp-3 font-mono">{{ $page->result }}</p>
                            <p class="text-indigo-400 text-xs mt-2 font-medium">View full result →</p>
                        </a>
                    </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</x-app-layout>