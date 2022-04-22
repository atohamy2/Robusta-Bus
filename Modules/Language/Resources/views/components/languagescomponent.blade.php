<select name="{{ $name }}" class="form-control">
@foreach ($result as $item)
    <option {!! selected($item->language_code, $selectedLanguage) !!} value="{{ $item->id }}">{{ $item->language_code }}</option>
@endforeach
</select>
