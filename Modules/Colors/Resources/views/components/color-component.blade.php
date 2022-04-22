<select name="{{ $name }}" class="form-control">
    <option value=''>-- {{ __(' Select Color') }} --</option>

    @foreach ($result as $item)

        <option {!! selected($item->id, $selectedColor) !!} value="{{ $item->id}}">{{ $item->color_name }}</option>
    @endforeach
</select>
