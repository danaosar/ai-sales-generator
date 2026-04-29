<x-app-layout>
    <div class="min-h-screen bg-gray-950 py-12 px-4">
        <div class="max-w-4xl mx-auto">

            {{-- Welcome Header --}}
            <div class="mb-10">
                <div class="inline-flex items-center gap-2 bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 text-xs font-semibold uppercase tracking-widest px-4 py-2 rounded-full mb-4">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 8 8"><circle cx="4" cy="4" r="4"/></svg>
                    Dashboard
                </div>
                <h1 class="text-4xl font-bold text-white tracking-tight">
                    Welcome back, {{ Auth::user()->name }} 👋
                </h1>
                <p class="mt-2 text-gray-400 text-sm">Here's what you can do with AI Sales Generator.</p>
            </div>

            {{-- Quick Actions --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">

                {{-- Generate Card --}}
                <a href="/generate" class="group bg-gray-900 border border-gray-800 hover:border-indigo-500/50 rounded-2xl p-6 transition-all duration-200 hover:shadow-lg hover:shadow-indigo-500/10">
                    <div class="w-12 h-12 bg-indigo-500/10 border border-indigo-500/20 rounded-xl flex items-center justify-center mb-4 group-hover:bg-indigo-500/20 transition">
                        <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-white font-semibold text-lg mb-1">Generate Sales Page</h3>
                    <p class="text-gray-500 text-sm">Create a new AI-powered sales page for your product.</p>
                    <div class="mt-4 flex items-center text-indigo-400 text-sm font-medium gap-1 group-hover:gap-2 transition-all">
                        Get started
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                </a>

                {{-- History Card --}}
                <a href="/history" class="group bg-gray-900 border border-gray-800 hover:border-purple-500/50 rounded-2xl p-6 transition-all duration-200 hover:shadow-lg hover:shadow-purple-500/10">
                    <div class="w-12 h-12 bg-purple-500/10 border border-purple-500/20 rounded-xl flex items-center justify-center mb-4 group-hover:bg-purple-500/20 transition">
                        <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-white font-semibold text-lg mb-1">View History</h3>
                    <p class="text-gray-500 text-sm">Browse and manage your previously generated pages.</p>
                    <div class="mt-4 flex items-center text-purple-400 text-sm font-medium gap-1 group-hover:gap-2 transition-all">
                        View all
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                </a>
            </div>

            {{-- Info Banner --}}
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-6 flex items-start gap-4">
                <div class="w-10 h-10 bg-green-500/10 border border-green-500/20 rounded-xl flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <h4 class="text-white font-semibold text-sm">You're all set!</h4>
                    <p class="text-gray-500 text-sm mt-0.5">Your account is active and ready to generate high-converting sales pages powered by AI.</p>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>