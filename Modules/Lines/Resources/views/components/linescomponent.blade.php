<select  id="{{$id}}" name="{{ $name }}" class="form-control ">
    <option value=''>-- {{ __(' Select Line') }} --</option>
    @foreach ($result as $item)
        <option {!! selected($item->id, $selectedLine) !!} value="{{ $item->id}}">{{ $item->name }}</option>
    @endforeach
</select>
