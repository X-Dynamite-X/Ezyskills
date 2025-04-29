<x-mail::message>
{{-- Logo and Header --}}
<div style="text-align: center; margin-bottom: 30px;">
    <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}" style="max-width: 200px;">
</div>

{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
<div style="color: #dc2626;">
# Important Notice!
</div>
@else
<div style="color: #2563eb;">
# Welcome to {{ config('app.name') }}
</div>
@endif
@endif

{{-- Intro Lines --}}
<div style="margin: 25px 0; line-height: 1.6; color: #374151;">
@foreach ($introLines as $line)
{{ $line }}

@endforeach
</div>

{{-- Action Button --}}
@isset($actionText)
<?php
    $color = match ($level) {
        'success' => 'green',
        'error' => 'red',
        default => 'blue',
    };
?>
<div style="margin: 35px 0;">
    <x-mail::button :url="$actionUrl" :color="$color">
    {{ $actionText }}
    </x-mail::button>
</div>
@endisset

{{-- Outro Lines --}}
<div style="margin: 25px 0; line-height: 1.6; color: #374151;">
@foreach ($outroLines as $line)
{{ $line }}

@endforeach
</div>

{{-- Salutation --}}
<div style="margin-top: 35px; padding-top: 20px; border-top: 1px solid #e5e7eb;">
@if (! empty($salutation))
{{ $salutation }}
@else
<div style="color: #374151;">
Best regards,<br>
<span style="color: #2563eb; font-weight: 600;">The {{ config('app.name') }} Team</span>
</div>
@endif
</div>

{{-- Footer --}}
<div style="margin-top: 35px; padding-top: 20px; border-top: 1px solid #e5e7eb; font-size: 0.875rem; color: #6b7280;">
    <p style="margin-bottom: 10px;">Connect with us:</p>
    <div style="display: flex; gap: 15px; justify-content: center;">
        <a href="#" style="color: #2563eb;">Twitter</a> |
        <a href="#" style="color: #2563eb;">LinkedIn</a> |
        <a href="#" style="color: #2563eb;">Facebook</a>
    </div>
</div>

{{-- Subcopy --}}
@isset($actionText)
<x-slot:subcopy>
<div style="margin-top: 25px; padding-top: 15px; border-top: 1px solid #e5e7eb; font-size: 0.875rem; color: #6b7280;">
    <p>If you're having trouble clicking the "{{ $actionText }}" button, copy and paste the URL below into your web browser:</p>
    <span class="break-all" style="color: #2563eb;">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
</div>
</x-slot:subcopy>
@endisset

{{-- Additional Info --}}
<div style="margin-top: 25px; font-size: 0.75rem; color: #6b7280; text-align: center;">
    <p>This email was sent from {{ config('app.name') }}. Please do not reply to this email.</p>
    <p>© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
</div>
</x-mail::message>


