<select id="{{$id}}" name="{{ $name }}" class="form-control">
    <option value=''>-- {{ __(' Select Driver') }} --</option>

    @foreach ($result as $item)
        <option {!! selected($item->id, $selectedDriver) !!} value="{{ $item->id}}">{{ $item->driver_name }}</option>
    @endforeach
</select>
