<select id="{{$id}}" name="{{ $name }}" class="form-control">
    <option value=''>-- {{ __(' Select Currency code') }} --</option>

    @foreach ($result as $item)
  
        <option {!! selected($item, $selectedCurrency) !!} value="{{ $item}}">{{ $item }}</option>
    @endforeach
</select>
