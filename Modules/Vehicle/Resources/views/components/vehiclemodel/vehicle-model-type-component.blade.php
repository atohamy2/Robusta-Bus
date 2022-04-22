<select id={{$id}} name="{{ $name }}" class="form-control">
    <option value=''>-- {{ __(' Select Vehicle Model Type') }} --</option>

    @foreach ($result as $item)

        <option {!! selected($item, $selectedVehicleModelType) !!} value="{{ $item}}">{{ __($item)}}</option>
    @endforeach
</select>
