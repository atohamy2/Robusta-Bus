<select id="{{$id}}" name="{{ $name }}" class="form-control">
    <option value=''>-- {{ __(' Select Country') }} --</option>

    @foreach ($result as $item)

        <option {!! selected($item->id, $selectedCountry) !!} value="{{ $item->id}}">{{ $item->country_name }}</option>
    @endforeach
</select>
