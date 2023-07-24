@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
@else
<img src="https://i.postimg.cc/GtJMcSLD/LOGO-1024x601.png" width=25% alt="Unitropico Logo" class="mx-auto">
<br>
{{ $slot }}
@endif
</a>
</td>
</tr>
