@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">{{ __('Users Management') }}</h5>
                    <div class="float-right">
                        <a href="{{ route('users.index') }}" class="btn  btn-danger">
                            <i class="bx bx-arrow-back"></i></a>
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
                                <h4 class="card-title">{{ __('Add New User') }}</h4>
                            </div>
                            <div class="card-body">
                                <form class="form" action="{{ route('users.store') }}" method="POST">
                                    @include('users::form')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
