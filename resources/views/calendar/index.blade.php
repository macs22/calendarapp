@extends('layouts.master')

@section('title')
    {{ __('Calendar') }}
@endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('assets/modules/fullcalendar/lib/main.css')}}"/>
    <style>
        .day {
            border-top: ridge;
            padding: 12px;
        }
    </style>
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <form action="" id="createEvent" method="POST">
                                                <div class="form-group">
                                                    <label for="">Event</label>
                                                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter event name" required value="{{ ($event ? $event->title : null) }}">
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label for="">From</label>
                                                            <input type="text" class="form-control datetimepicker" id="startDate" name="start" required value="{{ ($event ? $event->start : null) }}">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="">To</label>
                                                            <input type="text" class="form-control datetimepicker" id="endDate" name="end" required value="{{ ($event ? $event->end : null) }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                {{-- 
                                                    * Check if event exists    
                                                --}}
                                                @php
                                                    $days = [
                                                        'No Event'
                                                    ];
                                                    
                                                    if ($event) {
                                                        if (!is_null(json_decode($event->days))) {
                                                            $days = json_decode($event->days);
                                                        }
                                                    }
                                                @endphp
                                                
                                                <div class="checkbox-group">
                                                    <input type="checkbox" name="days[]" tabindex="1" value="Monday" {{ (in_array('Monday', $days) ? 'checked' : '') }}>
                                                    <label for="mon">{{ __('Mon') }} </label>

                                                    <input type="checkbox" name="days[]" tabindex="1" value="Tuesday" {{ (in_array('Tuesday', $days) ? 'checked' : '') }}>
                                                    <label for="tue">{{ __('Tues') }} </label>

                                                    <input type="checkbox" name="days[]" tabindex="1" value="Wednesday" {{ (in_array('Wednesday', $days) ? 'checked' : '') }}>
                                                    <label for="wed">{{ __('Wed') }} </label>

                                                    <input type="checkbox" name="days[]" tabindex="1" value="Thursday" {{ (in_array('Thursday', $days) ? 'checked' : '') }}>
                                                    <label for="thu">{{ __('Thurs') }} </label>

                                                    <input type="checkbox" name="days[]" tabindex="1" value="Friday" {{ (in_array('Friday', $days) ? 'checked' : '') }}>
                                                    <label for="fri">{{ __('Fri') }} </label>

                                                    <input type="checkbox" name="days[]" tabindex="1" value="Saturday" {{ (in_array('Saturday', $days) ? 'checked' : '') }}>
                                                    <label for="sat">{{ __('Sat') }} </label>

                                                    <input type="checkbox" name="days[]" tabindex="1" value="Sunday" {{ (in_array('Sunday', $days) ? 'checked' : '') }}>
                                                    <label for="sun">{{ __('Sun') }} </label>
                                                </div>

                                                <button type="button" id="saveEvent" class="btn btn-info">Submit</button>
                                            </form>
                                        </div>

                                        <div class="col-md-8">
                                            <div><h1>{{ $month }} 2021</h1></div>
                                                
                                            <div class="col-lg-12" id="dates">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src='{{asset('assets/modules/fullcalendar/lib/main.js')}}'></script>
    <script src="{{ asset('assets/modules/sweetalert/dist/sweetalert.min.js') }}"></script>
    @include('calendar.script.calendar')
@endpush
