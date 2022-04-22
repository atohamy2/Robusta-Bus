@section('content')
    {{ $datatable->table() }}
@endsection

@push('scripts')
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    {{ $datatable->scripts() }}
@endpush
