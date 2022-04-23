@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">{{ __('Trips Management') }}</h5>
                    @can('trips.create')
                    <div class="float-right">
                        <a href="{{ route('trips.create') }}" class="btn  btn-primary"> <i
                                class="bx bx-plus-circle"></i> {{ __('New') }}</a>
                    </div>
                    @endcan
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('Trips') }}</h4>
                            </div>
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>{{ __('ID') }}</th>
                                                <th>{{ __('Trip Name') }}</th>
                                                <th>{{ __('Line Name') }}</th>
                                                <th>{{ __('Bus Number') }}</th>
                                                <th>{{ __('Date Time') }}</th>
                                                <th>{{ __('Start City') }}</th>
                                                <th>{{ __('End City') }}</th>
                                                <th>{{ __('Actions') }}</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($result as $item)
                                                <tr>

                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->linedata->name }}</td>
                                                    <td>{{ $item->bus_number }}</td>
                                                    <td>{{ $item->datetime }}</td>
                                                    <td>{{ $item->linedata->startCity->city_name }}</td>
                                                    <td>{{ $item->linedata->endCity->city_name }}</td>

                                                    <td>
                                                        <div class="dropdown">
                                                            <span
                                                                class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false" role="menu"></span>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <x-edit-component :href="route('trips.edit', [$item->id])" permission="trips.edit" />
                                                                <x-delete-component :href="route('trips.destroy', [$item->id])" permission="trips.destroy" :id="$item->id" />
                                                                <a  class="dropdown-item" href="{{route('trips.book',['id'=>$item->id])}}" ><i class="bx bx-add-to-queue mr-1"></i> Book</a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="9">
                                                    {{$result->links()}}
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>



@endsection

@push('styles')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('xlstart-assets/') }}/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('xlstart-assets/') }}/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('xlstart-assets/') }}/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
@endpush

@push('scripts')
    <script src="{{ asset('xlstart-assets/') }}/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js">
    </script>
    <script src="{{ asset('xlstart-assets/') }}/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js">
    </script>
    <script src="{{ asset('xlstart-assets/') }}/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js">
    </script>
    <script src="{{ asset('xlstart-assets/') }}/app-assets/js/scripts/datatables/datatable.min.js"></script>
@endpush
