@php
    $balance = 3456
@endphp
<div>
    <b>Balance:</b>
    <span class="price">${{$user->roleInfo->first()->account}}</span>
    <button id="addToBalance" class="btn btn-info">Add to Balance</button>
</div>