<x-layout>
@php
    $user = auth()->user();
    $referralLink = route('auth.register', ['ref' => $user->id]);
@endphp

<h2 class="text-xl font-semibold mb-4">Your Referral Info</h2>

{{-- Who referred you --}}
<div class="mb-4">
    @if($user->referrer)
        <p class="text-gray-700">✅ <strong>{{ $user->referrer->name }}</strong> referred you.</p>
    @else
        <p class="text-gray-500">You have not been referred by anyone.</p>
    @endif
</div>

{{-- Referral Link --}}
<div class="mb-6">
    <h3 class="font-medium mb-2">Invite a Friend</h3>
    <div class="flex items-center gap-2 max-w-xl">
        <input id="referralLink" type="text" readonly value="{{ $referralLink }}"
            class="w-full px-3 py-2 border rounded-md text-sm bg-gray-50 focus:outline-none focus:ring-2 focus:ring-sky-500">
        <button id="copyBtn" onclick="copyReferral()"
            class="px-4 py-2 bg-sky-600 text-white rounded-md text-sm font-medium hover:bg-sky-700 transition-colors shrink-0">
            Copy
        </button>
    </div>
    <p id="copyFeedback" class="text-xs text-green-600 font-medium hidden mt-1">✓ Link copied!</p>
</div>

<script>
function copyReferral() {
    const input = document.getElementById('referralLink');
    const feedback = document.getElementById('copyFeedback');
    const btn = document.getElementById('copyBtn');

    input.select();
    input.setSelectionRange(0, 99999);

    try {
        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(input.value);
        } else {
            document.execCommand('copy');
        }

        feedback.classList.remove('hidden');
        btn.innerText = 'Copied!';
        btn.classList.replace('bg-sky-600', 'bg-green-600');

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

{{-- People you referred --}}
<div>
    @if($user->referrals->count() > 0)
        <p class="font-medium text-gray-800 mb-2">You have referred:</p>
        <ul class="list-disc list-inside text-gray-700">
            @foreach($user->referrals as $ref)
                <li>{{ $ref->name }} ({{ $ref->email }})</li>
            @endforeach
        </ul>
    @else
        <p class="text-gray-500">You have not referred anyone yet.</p>
    @endif
</div>

</x-layout>
