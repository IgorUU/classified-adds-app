@if(session($type))
<div
    class="px-4 py-2 rounded mb-4 {{ $type === 'error' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
    {{ session($type) }}
</div>
@endif
