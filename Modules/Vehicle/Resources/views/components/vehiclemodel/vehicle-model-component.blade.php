<select parentId="{{$parentId}}" id="{{$id}}" name="{{ $name }}" class="form-control">
    <option value=''>-- {{ __(' Select Vehicle Model ') }} --</option>

    @foreach ($result as $item)

        <option {!! selected($item->id, $selectedVehicleModel) !!} value="{{ $item->id}}">{{ $item->vehicle_model_name }}</option>
    @endforeach
</select>

@push('scripts')
<script>
    $(function (){
       $('#{{$parentId}}').on('change',function () {
           var brandId= $(this).val();
           $.ajax({
               type:'GET',
               url: "{{route('vehiclebrand.show','')}}"+"/"+brandId,
               success:function(data) {
                   $('#{{$id}}').empty();
                   $('#{{$id}}').append($('<option>',{
                       value:'',
                       text:'-- {{ __(' Select Vehicle Model') }} --'
                   }))
                   $.each(data.model.models,function(i,model){
                       $('#{{$id}}').append($('<option>',{
                            value:model.id,
                            text:model.vehicle_model_name.{{app()->getLocale()}}
                       }));

                   });
               }
           });
       });
    });
</script>
@endpush