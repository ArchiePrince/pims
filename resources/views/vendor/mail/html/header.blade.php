<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="http://pims-reach.net/images/eugap.png" class="logo" alt="PIMS-REACH Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
