<select id="{{$id}}" name="{{ $name }}" class="form-control">
    <option value=''>-- {{ __(' Select Vehicle Brand') }} --</option>

    @foreach ($result as $item)

        <option {!! selected($item->id, $selectedVehicleBrand) !!} value="{{ $item->id}}">{{ $item->vehicle_brand_name }}</option>
    @endforeach
</select>
