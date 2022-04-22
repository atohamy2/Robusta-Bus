<select id="{{$id}}" name="{{ $name }}" class="form-control">
    <option value=''>-- {{ __(' Select UTC Offset') }} --</option>

    @foreach ($result as $item)
  
        <option {!! selected($item, $selectedUTC) !!} value="{{ $item}}">{{ $item }}</option>
    @endforeach
</select>