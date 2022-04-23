@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">{{ __('Book Trip') }}</h5>
                    <div class="float-right">
                        <a href="{{ route('trips.index') }}" class="btn  btn-danger">
                            <i class="bx bx-arrow-back"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('Book Trip') }}</h4>

                            </div>

                            <div class="card-body">
                                <div class="row mb-5">
                                    <div class="col-md-6">Trip : {{ $trip->name }}</div>
                                    <div class="col-md-6">Bus Number : {{ $trip->bus_number }}</div>
                                    <div class="col-md-6">Start City : {{ $trip->linedata->startCity->city_name }}</div>
                                    <div class="col-md-6">Start City : {{ $trip->linedata->startCity->city_name }}</div>
                                    <div class="col-md-6">Trip DateTime : {{ $trip->datetime }}</div>
                                    <div class="col-md-6">Stop Points :
                                        @foreach($trip->linedata->stoppoints as $point)
                                            <label class="btn btn-warning btn-sm"> {{ $point->city->city_name }}</label>
                                        @endforeach
                                    </div>
                                </div>

                                <form class="form" action="{{ route('trips.book', $trip->id) }}" method="POST">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-lg-2 col-3">
                                                        <label for="field-bus-number">{{ __('From') }}</label>
                                                    </div>
                                                    <div class="col-lg-10 col-9">
                                                        <select name="from" id="" class="form-control">
                                                            @foreach($trip->linedata->stoppoints as $point)
                                                                <option
                                                                    value="{{$point->city->id}}" {{($request->from==$point->city->id) ? 'selected' : ''}}>{{$point->city->city_name}}</option>
                                                            @endforeach
                                                        </select>
                                                        {!! $errors->first('from', '<p class="text-danger">:message</p>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-lg-2 col-3">
                                                        <label for="field-bus-number">{{ __('To') }}</label>
                                                    </div>
                                                    <div class="col-lg-10 col-9">
                                                        <select name="to" id="" onchange="this.form.submit()"
                                                                class="form-control">
                                                            @foreach($trip->linedata->stoppoints as $point)
                                                                <option
                                                                    value="{{$point->city->id}}" {{($request->to==$point->city->id) ? 'selected' : ''}}>{{$point->city->city_name}}</option>
                                                            @endforeach
                                                        </select>
                                                        {!! $errors->first('to', '<p class="text-danger">:message</p>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            @if(isset($seats))
                                                <div class="col-6">
                                                    <div class="form-group row align-items-center">
                                                        <div class="col-lg-2 col-3">
                                                            <label for="field-bus-number">{{ __('Bus Seats') }}</label>
                                                        </div>
                                                        <div class="col-lg-10 col-9">
                                                            <div class="row">
                                                                @foreach($seats as $seat)
                                                                    @if(!in_array($seat,$unavaliable))
                                                                        <div class="col-md-3">
                                                                            <input id="bookedseat" type="checkbox"
                                                                                   name="bookedseats[]"
                                                                                   value="{{$seat}}">
                                                                            <label for="bookedseat">{{$seat}}</label>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary mr-1">{{ __('Save') }}</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('Booked Seats') }}</h4>
                            </div>
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>{{ __('ID') }}</th>
                                            <th>{{ __('Trip Name') }}</th>
                                            <th>{{ __('From') }}</th>
                                            <th>{{ __('To ') }}</th>
                                            <th>{{ __('Seat') }}</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($bookedseats as $bokkedseat)
                                            <tr>
                                                <td>{{ $bokkedseat->id }}</td>
                                                <td>{{ $bokkedseat->trip->name }}</td>
                                                <td>{{ $bokkedseat->fromcity->city_name }}</td>
                                                <td>{{ $bokkedseat->tocity->city_name }}</td>
                                                <td>{{ $bokkedseat->seat }}</td>


                                            </tr>
                                        @endforeach
                                        </tbody>

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
