@extends('front.layouts.app')

@section('main')
    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Schedule Tution</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    @Include('front.account.sidebar')
                </div>
                <div class="col-lg-9">
                    @include('front.message')
                    <form action="{{ route('tution.store') }}" method ="Post" id="createJobForm" name="createJobForm">
                        @csrf
                        <div class="card border-0 shadow mb-4 ">
                            <div class="card-body card-form p-4">
                                <h3 class="fs-4 mb-1">Schedule Tution</h3>
                                <div class="row">
                                    <input type="hidden" name="tutor_id" value="{{ $tutor_id ?? '' }}"
                                        class="form-control">

                                    {{-- Title --}}
                                    <div class="mb-4 col-md-12">
                                        <label for="title" class="mb-2">Title<span class="text-danger">*</span></label>
                                        <input type="text" placeholder="Write any title for your tution" name="title"
                                            class="form-control">
                                    </div>

                                    {{-- Week Days --}}
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="week_days" class="mb-2">Select Week Days<span
                                                    class="text-danger">*</span></label>
                                            <div class="weekDays-selector">
                                                <input type="checkbox" id="weekday-mon" name="week_days[]" value="Monday"
                                                    class="weekday" />
                                                <label for="weekday-mon">M</label>
                                                <input type="checkbox" id="weekday-tue" name="week_days[]" value="Tuesday"
                                                    class="weekday" />
                                                <label for="weekday-tue">T</label>
                                                <input type="checkbox" id="weekday-wed" name="week_days[]" value="Wednesday"
                                                    class="weekday" />
                                                <label for="weekday-wed">W</label>
                                                <input type="checkbox" id="weekday-thu" name="week_days[]" value="Thursday"
                                                    class="weekday" />
                                                <label for="weekday-thu">T</label>
                                                <input type="checkbox" id="weekday-fri" name="week_days[]" value="Friday"
                                                    class="weekday" />
                                                <label for="weekday-fri">F</label>
                                                <input type="checkbox" id="weekday-sat" name="week_days[]" value="Saturday"
                                                    class="weekday" />
                                                <label for="weekday-sat">S</label>
                                                <input type="checkbox" id="weekday-sun" name="week_days[]" value="Sunday"
                                                    class="weekday" />
                                                <label for="weekday-sun">S</label>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Time --}}
                                    {{-- <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="mb-2">Select Class Time<span
                                                    class="text-danger">*</span></label>
                                            <div id="datetimepickerDate" class="input-group timerange">
                                                <input class="form-control" name="time" type="text">
                                            </div>
                                        </div>
                                    </div> --}}

                                    {{-- From Time --}}
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="start_time" class="mb-2">Start Time<span class="text-danger">*</span></label>
                                            <select class="form-select" name="start_time" id="start_time">
                                                <option value="default" disabled selected>Select Start Time</option>
                                                <option value="01:00 AM" >01:00 AM</option>
                                                <option value="02:00 AM" >02:00 AM</option>
                                                <option value="03:00 AM" >03:00 AM</option>
                                                <option value="04:00 AM" >04:00 AM</option>
                                                <option value="05:00 AM" >05:00 AM</option>
                                                <option value="06:00 AM" >06:00 AM</option>
                                                <option value="07:00 AM" >07:00 AM</option>
                                                <option value="08:00 AM" >08:00 AM</option>
                                                <option value="09:00 AM" >09:00 AM</option>
                                                <option value="10:00 AM" >10:00 AM</option>
                                                <option value="11:00 AM" >11:00 AM</option>
                                                <option value="12:00 PM" >12:00 PM</option>
                                                <option value="01:00 PM" >01:00 PM</option>
                                                <option value="02:00 PM" >02:00 PM</option>
                                                <option value="03:00 PM" >03:00 PM</option>
                                                <option value="04:00 PM" >04:00 PM</option>
                                                <option value="05:00 PM" >05:00 PM</option>
                                                <option value="06:00 PM" >06:00 PM</option>
                                                <option value="07:00 PM" >07:00 PM</option>
                                                <option value="08:00 PM" >08:00 PM</option>
                                                <option value="09:00 PM" >09:00 PM</option>
                                                <option value="10:00 PM" >10:00 PM</option>
                                                <option value="11:00 PM" >11:00 PM</option>
                                                <option value="12:00 AM" >12:00 AM</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- End Time --}}
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="end_time" class="mb-2">End Time<span class="text-danger">*</span></label>
                                            <select class="form-select" name="end_time" id="end_time">
                                                <option value="default" disabled selected>Select End Time</option>
                                                <option value="01:00 AM" >01:00 AM</option>
                                                <option value="02:00 AM" >02:00 AM</option>
                                                <option value="03:00 AM" >03:00 AM</option>
                                                <option value="04:00 AM" >04:00 AM</option>
                                                <option value="05:00 AM" >05:00 AM</option>
                                                <option value="06:00 AM" >06:00 AM</option>
                                                <option value="07:00 AM" >07:00 AM</option>
                                                <option value="08:00 AM" >08:00 AM</option>
                                                <option value="09:00 AM" >09:00 AM</option>
                                                <option value="10:00 AM" >10:00 AM</option>
                                                <option value="11:00 AM" >11:00 AM</option>
                                                <option value="12:00 PM" >12:00 PM</option>
                                                <option value="01:00 PM" >01:00 PM</option>
                                                <option value="02:00 PM" >02:00 PM</option>
                                                <option value="03:00 PM" >03:00 PM</option>
                                                <option value="04:00 PM" >04:00 PM</option>
                                                <option value="05:00 PM" >05:00 PM</option>
                                                <option value="06:00 PM" >06:00 PM</option>
                                                <option value="07:00 PM" >07:00 PM</option>
                                                <option value="08:00 PM" >08:00 PM</option>
                                                <option value="09:00 PM" >09:00 PM</option>
                                                <option value="10:00 PM" >10:00 PM</option>
                                                <option value="11:00 PM" >11:00 PM</option>
                                                <option value="12:00 AM" >12:00 AM</option>
                                            </select>
                                        </div>
                                    </div>

                                    {{-- Subject --}}
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="subject" class="mb-2">Subject<span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select" name="subject" id="subject">
                                                <option value="default" disabled selected
                                                    {{ old('subject') == 'default' ? 'selected' : '' }}>
                                                    Select
                                                    Subject</option>
                                                @foreach ($tutor_subjects as $tutor_subject)
                                                    <option value="{{ $tutor_subject->subject->id ?? '' }}">
                                                        {{ $tutor_subject->subject->name ?? '' }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('subject')
                                            <span class="error-message">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Duration --}}
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="duration" class="mb-2">Duration<span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select" name="duration" id="duration">
                                                <option value="default" disabled selected
                                                    {{ old('duration') == 'default' ? 'selected' : '' }}>
                                                    Select
                                                    Tution Duration</option>
                                                <option value="1" {{ old('duration') == '1' ? 'selected' : '' }}>
                                                    1 Week
                                                </option>
                                                <option value="2" {{ old('duration') == '2' ? 'selected' : '' }}>
                                                    2 Weeks
                                                </option>
                                                <option value="3" {{ old('duration') == '3' ? 'selected' : '' }}>
                                                    3 Weeks
                                                </option>
                                                <option value="4" {{ old('duration') == '4' ? 'selected' : '' }}>
                                                    1 Month
                                                </option>
                                            </select>
                                        </div>
                                        @error('duration')
                                            <span class="error-message">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer  p-4">
                                <button type="Submit" class="btn btn-primary">Proceed To Checkout</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJs')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var timeInput = document.getElementById('fromTime');
        
            timeInput.addEventListener('input', function (e) {
                var value = e.target.value;
                // Remove non-numeric characters and ensure length does not exceed 2
                e.target.value = value.replace(/\D/g, '').slice(0, 2);
            });
        });
        </script>

    <script type="text/javascript">
        $('.timerange').on('click', function(e) {
            e.stopPropagation();
            var input = $(this).find('input');

            var now = new Date();
            var hours = now.getHours();
            var period = "PM";
            if (hours < 12) {
                period = "AM";
            } else {
                hours = hours - 11;
            }
            var minutes = now.getMinutes();

            var range = {
                from: {
                    hour: hours,
                    minute: minutes,
                    period: period
                },
                to: {
                    hour: hours,
                    minute: minutes,
                    period: period
                }
            };

            if (input.val() !== "") {
                var timerange = input.val();
                var matches = timerange.match(
                    /([0-9]{2}):([0-9]{2}) (\bAM\b|\bPM\b)-([0-9]{2}):([0-9]{2}) (\bAM\b|\bPM\b)/);
                if (matches.length === 7) {
                    range = {
                        from: {
                            hour: matches[1],
                            minute: matches[2],
                            period: matches[3]
                        },
                        to: {
                            hour: matches[4],
                            minute: matches[5],
                            period: matches[6]
                        }
                    }
                }
            };
            console.log(range);

            var html = '<div class="timerangepicker-container">' +
                '<div class="timerangepicker-from">' +
                '<label class="timerangepicker-label">From:</label>' +
                '<div class="timerangepicker-display hour">' +
                '<span class="increment fa fa-angle-up"></span>' +
                '<span class="value">' + ('0' + range.from.hour).substr(-2) + '</span>' +
                '<span class="decrement fa fa-angle-down"></span>' +
                '</div>' +
                ':' +
                '<div class="timerangepicker-display minute">' +
                '<span class="increment fa fa-angle-up"></span>' +
                '<span class="value">' + ('0' + range.from.minute).substr(-2) + '</span>' +
                '<span class="decrement fa fa-angle-down"></span>' +
                '</div>' +
                ':' +
                '<div class="timerangepicker-display period">' +
                '<span class="increment fa fa-angle-up"></span>' +
                '<span class="value">PM</span>' +
                '<span class="decrement fa fa-angle-down"></span>' +
                '</div>' +
                '</div>' +
                '<div class="timerangepicker-to">' +
                '<label class="timerangepicker-label">To:</label>' +
                '<div class="timerangepicker-display hour">' +
                '<span class="increment fa fa-angle-up"></span>' +
                '<span class="value">' + ('0' + range.to.hour).substr(-2) + '</span>' +
                '<span class="decrement fa fa-angle-down"></span>' +
                '</div>' +
                ':' +
                '<div class="timerangepicker-display minute">' +
                '<span class="increment fa fa-angle-up"></span>' +
                '<span class="value">' + ('0' + range.to.minute).substr(-2) + '</span>' +
                '<span class="decrement fa fa-angle-down"></span>' +
                '</div>' +
                ':' +
                '<div class="timerangepicker-display period">' +
                '<span class="increment fa fa-angle-up"></span>' +
                '<span class="value">PM</span>' +
                '<span class="decrement fa fa-angle-down"></span>' +
                '</div>' +
                '</div>' +
                '</div>';

            $(html).insertAfter(this);
            $('.timerangepicker-container').on(
                'click',
                '.timerangepicker-display.hour .increment',
                function() {
                    var value = $(this).siblings('.value');
                    value.text(
                        increment(value.text(), 12, 1, 2)
                    );
                }
            );

            $('.timerangepicker-container').on(
                'click',
                '.timerangepicker-display.hour .decrement',
                function() {
                    var value = $(this).siblings('.value');
                    value.text(
                        decrement(value.text(), 12, 1, 2)
                    );
                }
            );

            $('.timerangepicker-container').on(
                'click',
                '.timerangepicker-display.minute .increment',
                function() {
                    var value = $(this).siblings('.value');
                    value.text(
                        increment(value.text(), 59, 0, 2)
                    );
                }
            );

            $('.timerangepicker-container').on(
                'click',
                '.timerangepicker-display.minute .decrement',
                function() {
                    var value = $(this).siblings('.value');
                    value.text(
                        decrement(value.text(), 12, 1, 2)
                    );
                }
            );

            $('.timerangepicker-container').on(
                'click',
                '.timerangepicker-display.period .increment, .timerangepicker-display.period .decrement',
                function() {
                    var value = $(this).siblings('.value');
                    var next = value.text() == "PM" ? "AM" : "PM";
                    value.text(next);
                }
            );

        });

        $(document).on('click', e => {

            if (!$(e.target).closest('.timerangepicker-container').length) {
                if ($('.timerangepicker-container').is(":visible")) {
                    var timerangeContainer = $('.timerangepicker-container');
                    if (timerangeContainer.length > 0) {
                        var timeRange = {
                            from: {
                                hour: timerangeContainer.find('.value')[0].innerText,
                                minute: timerangeContainer.find('.value')[1].innerText,
                                period: timerangeContainer.find('.value')[2].innerText
                            },
                            to: {
                                hour: timerangeContainer.find('.value')[3].innerText,
                                minute: timerangeContainer.find('.value')[4].innerText,
                                period: timerangeContainer.find('.value')[5].innerText
                            },
                        };

                        timerangeContainer.parent().find('input').val(
                            timeRange.from.hour + ":" +
                            timeRange.from.minute + " " +
                            timeRange.from.period + "-" +
                            timeRange.to.hour + ":" +
                            timeRange.to.minute + " " +
                            timeRange.to.period
                        );
                        timerangeContainer.remove();
                    }
                }
            }

        });

        function increment(value, max, min, size) {
            var intValue = parseInt(value);
            if (intValue == max) {
                return ('0' + min).substr(-size);
            } else {
                var next = intValue + 1;
                return ('0' + next).substr(-size);
            }
        }

        function decrement(value, max, min, size) {
            var intValue = parseInt(value);
            if (intValue == min) {
                return ('0' + max).substr(-size);
            } else {
                var next = intValue - 1;
                return ('0' + next).substr(-size);
            }
        }
    </script>
@endsection
