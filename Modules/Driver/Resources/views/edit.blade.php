@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">{{ __('Drivers Management') }}</h5>
                    <div class="float-right">
                        <a href="{{ route('driver.index') }}" class="btn  btn-danger">
                            <i class="bx bx-arrow-back"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- account setting page start -->
            <section id="page-account-settings">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <!-- left menu section -->
                            <div class="col-md-3 mb-2 mb-md-0 pills-stacked">
                                <ul class="nav nav-pills flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center active" id="account-pill-general"
                                            data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                            <i class="bx bx-cog"></i>
                                            <span>Update Info</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center" id="account-pill-info"
                                            data-toggle="pill" href="#account-vertical-info" aria-expanded="false">
                                            <i class="bx bx-info-circle"></i>
                                            <span>Info</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center" id="account-pill-vehicles"
                                            data-toggle="pill" href="#account-vehicles" aria-expanded="false">
                                            <i class="bx bx-car"></i>
                                            <span>{{ __('Vehicles') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- right content section -->
                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                                aria-labelledby="account-pill-general" aria-expanded="true">
                                                <form class="form" action="{{ route('driver.update', $model->id) }}" method="POST">
                                                    @method('PUT')
                                                    @include('driver::form')
                                                </form>
                                            </div>

                                            <div class="tab-pane fade" id="account-vertical-info" role="tabpanel"
                                                aria-labelledby="account-pill-info" aria-expanded="false">

                                            </div>

                                            <div class="tab-pane fade" id="account-vehicles" role="tabpanel"
                                                aria-labelledby="account-pill-vehicles" aria-expanded="false">
                                                @include('vehicle::vehicle.index', ['result' => $vehicles, 'driver_id' => $model->id])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- account setting page ends -->

        </div>
    </div>
@endsection

@push('styles')
@endpush

@push('scripts')
    <script src="{{ asset('xlstart-assets/') }}/app-assets/js/scripts/pages/page-account-settings.min.js"></script>
@endpush
