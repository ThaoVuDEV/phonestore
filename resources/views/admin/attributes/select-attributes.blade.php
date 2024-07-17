
@php
    function renderAttributes($attributes, $indent = 0) {
        foreach ($attributes as $attribute) {
            echo '<option value="' . $attribute->id . '">' . str_repeat('-', $indent * 4) . ' ' . e($attribute->name) . '</option>';
            if ($attribute->children->isNotEmpty()) {
                renderAttributes($attribute->children, $indent + 1);
            }
        }
    }
@endphp

<select name="variants[0][attributes][]" id="variant_attributes" multiple class="mt-1 p-2 border border-gray-300 rounded-md w-full">
    @foreach ($attributes as $attribute)
        <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
        @if ($attribute->children->isNotEmpty())
            @php renderAttributes($attribute->children, 1) @endphp
        @endif
    @endforeach
</select>
