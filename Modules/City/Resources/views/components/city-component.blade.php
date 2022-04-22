<select parentId="{{$parentId}}" id="{{$id}}" name="{{ $name }}" class="form-control">
    <option value=''>-- {{ __(' Select City') }} --</option>

    @foreach ($result as $item)
        <option {!! selected($item->id, $selectedCity) !!} value="{{ $item->id}}">{{ $item->city_name }}</option>
    @endforeach
</select>
@push('scripts')
    
<script>
    $(function (){
       $('#{{$parentId}}').on('change',function () {
           var countryId= $(this).val();
           $.ajax({
               type:'GET',
               url: "{{route('country.show','')}}"+"/"+countryId,
               success:function(data) {
                   $('#{{$id}}').empty();
                   $('#{{$id}}').append($('<option>',{
                       value:'',
                       text:'-- {{ __(' Select City') }} --'
                   }))
                   $.each(data.model.cities,function(i,city){
                       $('#{{$id}}').append($('<option>',{
                            value:city.id,
                            text:city.city_name.{{app()->getLocale()}}
                       }));

                   });
               }
           });
       });
    });
</script>


@endpush