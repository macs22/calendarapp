@extends('layouts.master')

@section('title')
    {{ __('Calendar') }}
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{asset('assets/modules/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}" />
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Calendar') }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">{{ __('Calendar') }}</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>{{ __('Calendar Events') }}</h4>
                        </div>
                        <div class="table-responsive card-body">

                            <table id="orderDataTable" class="table table-bordered table-striped dt-responsive width-100">
                                <thead>
                                    <tr>
                                        <th>{{ __('SL') }}</th>
                                        <th>{{ __('Company') }}</th>
                                        <th>{{ __('Email') }}</th>
                                        <th>{{ __('Plan') }}</th>
                                        <th>{{ __('Price') }}</th>
                                        <th>{{ __('Currency') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Date') }}</th>
                                        <th>{{ __('Receipt') }}</th>
                                        {{-- <th>{{ __('Action') }}</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('assets/modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/sweetalert/dist/sweetalert.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/orders/index.js') }}"></script> --}}
@endpush
