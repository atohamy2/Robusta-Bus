    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">{{ __('Vehicle Management') }}</h5>
                    <div class="float-right">
                        <a href="{{ route('vehicle.create', ['driver_id' => $driver_id]) }}" class="btn  btn-primary"> <i
                                class="bx bx-plus-circle"></i>
                            {{ __('New') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="basic-datatable">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Vehicle') }}</h4>
                    </div>
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ __('ID') }}</th>
                                        <th>{{ __('Vehicle Brand Name') }}</th>
                                        <th>{{ __('Vehicle Brand Type') }}</th>
                                        <th>{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($result as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ optional($item->vehicleBrand)->vehicle_brand_name }}</td>
                                            <td>{{ optional($item->vehicleModel)->vehicle_model_name }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <span
                                                        class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" role="menu"></span>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <x-edit-component
                                                            :href="route('vehicle.edit', [$item->id])"
                                                            permission="vehicle.edit" />
                                                        <x-delete-component
                                                            :href="route('vehicle.destroy', [$item->id])"
                                                            permission="vehicle.destroy" :id="$item->id" />
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
