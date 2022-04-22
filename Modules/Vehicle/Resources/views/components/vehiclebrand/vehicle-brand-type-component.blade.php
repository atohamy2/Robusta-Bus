<select id="{{$id}}" name="{{ $name }}" class="form-control">
    <option value=''>-- {{ __(' Select Vehicle Brand Type') }} --</option>

    @foreach ($result as $item)

        <option {!! selected($item, $selectedVehicleBrandType) !!} value="{{ $item}}">{{ __($item) }}</option>
    @endforeach
</select>
