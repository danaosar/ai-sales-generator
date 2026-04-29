<x-app-layout>
    <div class="min-h-screen bg-gray-950 py-12 px-4">
        <div class="max-w-3xl mx-auto">

            {{-- Header --}}
            <div class="mb-8 flex items-center justify-between">
                <div>
                    <div class="inline-flex items-center gap-2 bg-green-500/10 border border-green-500/20 text-green-400 text-xs font-semibold uppercase tracking-widest px-4 py-2 rounded-full mb-3">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 8 8"><circle cx="4" cy="4" r="4"/></svg>
                        Generated
                    </div>
                    <h1 class="text-3xl font-bold text-white tracking-tight">Your Sales Page</h1>
                    <p class="text-gray-400 text-sm mt-1">AI-generated content ready to use.</p>
                </div>
                <div class="flex gap-3">
                    <button
                        onclick="copyResult(this)"
                        class="flex items-center gap-2 bg-gray-800 hover:bg-gray-700 border border-gray-700 text-gray-300 text-sm font-medium px-4 py-2 rounded-xl transition"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                        </svg>
                        <span id="copy-btn-text">Copy</span>
                    </button>
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
            </div>

            {{-- Result Card --}}
            <div class="bg-gray-900 border border-gray-800 rounded-2xl shadow-2xl overflow-hidden">
                <div class="flex items-center gap-2 px-6 py-4 border-b border-gray-800 bg-gray-900/80">
                    <div class="w-3 h-3 rounded-full bg-red-500/70"></div>
                    <div class="w-3 h-3 rounded-full bg-yellow-500/70"></div>
                    <div class="w-3 h-3 rounded-full bg-green-500/70"></div>
                    <span class="ml-3 text-xs text-gray-500 font-mono">sales-page-result.md</span>
                </div>
                <div id="result-content" class="p-8 text-gray-300 text-sm leading-relaxed whitespace-pre-line font-mono">{{ $result }}</div>
            </div>

            {{-- Footer --}}
            <div class="mt-6 flex items-center justify-between text-xs text-gray-600">
                <a href="/history" class="text-indigo-400 hover:text-indigo-300 transition flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    View History
                </a>
                <span id="copy-toast" class="text-green-400 opacity-0 transition-opacity duration-300">✓ Copied to clipboard!</span>
            </div>
        </div>
    </div>

    <script>
        function copyResult(btn) {
            const text = document.getElementById('result-content').innerText;
            const btnText = document.getElementById('copy-btn-text');
            const toast = document.getElementById('copy-toast');

            function onSuccess() {
                btnText.textContent = 'Copied!';
                toast.style.opacity = '1';
                setTimeout(() => {
                    btnText.textContent = 'Copy';
                    toast.style.opacity = '0';
                }, 2000);
            }

            // Modern clipboard API (perlu HTTPS atau localhost)
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(text).then(onSuccess).catch(() => fallbackCopy(text, onSuccess));
            } else {
                fallbackCopy(text, onSuccess);
            }
        }

        function fallbackCopy(text, callback) {
            const textarea = document.createElement('textarea');
            textarea.value = text;
            textarea.style.position = 'fixed';
            textarea.style.opacity = '0';
            document.body.appendChild(textarea);
            textarea.focus();
            textarea.select();
            try {
                document.execCommand('copy');
                callback();
            } catch (e) {
                alert('Copy gagal, silakan select teks dan Ctrl+C manual.');
            }
            document.body.removeChild(textarea);
        }
    </script>
</x-app-layout>