<x-layout>
    @php
        // Always check if auth user exists to avoid trying to get ID on null
        $referralLink = auth()->check() 
            ? route('auth.register', ['ref' => auth()->id()]) 
            : 'Please log in to see your link';
    @endphp
<h2>if refer; write have been refered by username if not nothing should show</h2>
    <h2 class="text-lg font-semibold mb-2">Invite a friend</h2>

    <div class="flex flex-col gap-2 max-w-xl">
        <div class="flex items-center gap-2">
            <input
                id="referralLink"
                type="text"
                readonly
                value="{{ $referralLink }}"
                class="w-full px-3 py-2 border rounded-md text-sm bg-gray-50 focus:outline-none focus:ring-2 focus:ring-sky-500"
            />

            <button
                id="copyBtn"
                onclick="copyReferral()"
                class="px-4 py-2 bg-sky-600 text-white rounded-md text-sm font-medium hover:bg-sky-700 transition-colors shrink-0"
            >
                Copy
            </button>
        </div>

        <!-- Custom success message instead of browser alert -->
        <p id="copyFeedback" class="text-xs text-green-600 font-medium hidden">
            ✓ Link copied to clipboard!
        </p>
    </div>

    <p class="text-sm text-gray-500 mt-2">
        Share this link to invite friends.
    </p>

    <script>
    function copyReferral() {
        const input = document.getElementById('referralLink');
        const feedback = document.getElementById('copyFeedback');
        const btn = document.getElementById('copyBtn');

        // Select the text
        input.select();
        input.setSelectionRange(0, 99999);

        // Robust Copying
        try {
            // Modern Clipboard API
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(input.value);
            } else {
                // Fallback for non-HTTPS or older browsers
                document.execCommand('copy');
            }

            // Show UI Feedback (instead of annoying alerts)
            feedback.classList.remove('hidden');
            btn.innerText = 'Copied!';
            btn.classList.replace('bg-sky-600', 'bg-green-600');

            // Reset UI after 2 seconds
            setTimeout(() => {
                feedback.classList.add('hidden');
                btn.innerText = 'Copy';
                btn.classList.replace('bg-green-600', 'bg-sky-600');
            }, 2000);

        } catch (err) {
            console.error('Failed to copy', err);
        }
    }
    </script>
</x-layout>