@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">{{ __('Drivers Management') }}</h5>
                    <div class="float-right">
                        <a href="{{ route('driver.create') }}" class="btn  btn-primary"> <i class="bx bx-plus-circle"></i>
                            {{ __('New') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('Driver') }}</h4>
                            </div>
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>{{ __('ID') }}</th>
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('Phone') }}</th>
                                                <th>{{ __('Country') }}</th>
                                                <th>{{ __('City') }}</th>
                                                <th>{{ __('Birth Date') }}</th>
                                                <th>{{ __('Gender') }}</th>
                                                <th>{{ __('National ID Number') }}</th>
                                                <th>{{ __('National ID Expiration Date') }}</th>
                                                <th>{{ __('Personal License Number') }}</th>
                                                <th>{{ __('License Expiration Date') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                <th>{{ __('Actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($result as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->driver_name }}</td>
                                                    <td>{{ $item->phone_number }}</td>
                                                    <td>{{ $item->country->country_name }}</td>
                                                    <td>{{ $item->city->city_name }}</td>
                                                    <td>{{ $item->birth_date }}</td>
                                                    <td>{{ $item->gender }}</td>
                                                    <td>{{ $item->national_id_number }}</td>
                                                    <td>{{ $item->national_id_expiration_date }}</td>
                                                    <td>{{ $item->personal_license_number }}</td>
                                                    <td>{{ $item->license_expirtation_date }}</td>
                                                    <td>{{ $item->status }}</td>

                                                    <td>
                                                        <div class="dropdown">
                                                            <span
                                                                class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false" role="menu"></span>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <x-edit-component
                                                                    :href="route('driver.edit', [$item->id])"
                                                                    permission="driver.edit" />
                                                                <x-delete-component
                                                                    :href="route('driver.destroy', [$item->id])"
                                                                    permission="driver.destroy" :id="$item->id" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                              <td>
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
