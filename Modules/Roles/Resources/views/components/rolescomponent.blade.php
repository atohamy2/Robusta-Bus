<select name="role_id" class="form-control">
    <option value="">{{ __('Please Choose') }}</option>
    @foreach ($roles as $item)
        <option {!! selected($item->id, $selectedRole) !!} value="{{ $item->id }}">{{ $item->name }}</option>
    @endforeach
</select>
