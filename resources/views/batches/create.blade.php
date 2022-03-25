@extends('layout')
@section('formStyle')
    <!-- bootstrap-wysiwyg -->
    <link href="{{ asset('vendors/google-code-prettify/bin/prettify.min.css') }}" rel="stylesheet">
    <!--JQuery UI-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <!--JQuery UI-->
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <!-- Select2 -->
    <link href="{{ asset('vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <!-- Switchery -->
    <link href="{{ asset('vendors/switchery/dist/switchery.min.css') }}" rel="stylesheet">
    <!-- starrr -->
    <link href="{{ asset('vendors/starrr/dist/starrr.css') }}" rel="stylesheet">
    <!-- FullCalendar -->
{{--    <link href="{{ asset('vendors/fullcalendar/dist/fullcalendar.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('vendors/fullcalendar/dist/fullcalendar.print.css') }}" rel="stylesheet" media="print">--}}

    <link href="{{ asset('build/css/fullcalendar.css') }}" rel="stylesheet">
    <style>
        #dialog{
            display: none;
        }
        #program{
            display: none;
        }
    </style>
@endsection
@section('content')

        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Calendar <small>Click to add/edit events</small></h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5   form-group pull-right top_search">

                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">

                    <div class="mb-5">
                    <div class="title_left">
                        <button class="col-md-1 col-sm-2 btn btn-danger" id="addProgram">Add Program</button>
                    </div>
                    <div class="title_right">
                        <button class="col-md-1 col-sm-2 btn btn-danger" id="addEvent">Add Event</button>
                    </div>
                    </div>
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Calendar Events <small>Sessions</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <div id='calendar'></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Day Click Dialog Start -->
    <div id="dayClick">
        <div id="dialog-body">
            <form id="dialog" method="POST" action="{{ route('batches.store') }}">
                @csrf
                <div class="form-group">
                    <label>Program</label>
                    <div>
                        <select id="eid" class="select2_single form-control" tabindex="-1" name="eid">


                            <option selected value="">Select Program</option>
                            @foreach($events as $event)
                                <option value="{{ $event->eid }}">{{ $event->e_title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Event Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="e.g. Batch 02">
                </div>
                <div class="form-group">
                    <label>Start Date</label>
                    <input type="text" class="form-control start-date" id="start" name="start" placeholder="Start date & time">
                </div>
                <div class="form-group">
                    <label>End Date</label>
                    <input type="text" class="form-control end-date" id="end" name="end" placeholder="End date & time">
                </div>
                <div class="form-group">
                    <label>Location</label>
                    <input type="text" id="location" class="form-control" name="location">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" style="height:55px;" id="description" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label>All Day</label> <br>
                    <input type="checkbox" value="1" id="allDay" name="allDay"> All Day
                    <input type="checkbox" value="0" id="allDay" name="allDay"> Partial
                </div>
                <div class="form-group">
                    <label>Background Color</label>
                    <input type="color" id="color" class="form-control" name="color">
                </div>
                <div class="form-group">
                    <label>Text Color</label>
                    <input type="color" id="textColor" class="form-control" name="textColor">
                </div>
                <input type="hidden" id="bid" name="bid">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="update"> Add Event </button>

                    <a onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger" id="deleteEvent" href=""><i class="fa fa-trash"></i> Delete </a>
                </div>
            </form>
        </div>
    </div>
    <!--Day Click Dialog End -->
    <!--Program Dialog Start-->
        <div class="dialog-body">
            <div class="alert alert-danger error-msg" style="display:none">
                <ul></ul>
            </div>
            <form id="program" action="{{ route('events.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Program Title:</label>
                            <input type="text" name="e_title" id="name" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <select class="select2_single form-control" tabindex="-1" name="tid">


                                <option selected value="">Select Program Type</option>
                                @foreach($eventType as $type)
                                    <option value="{{ $type->tid }} ">{{ $type->t_title }}</option>
                                @endforeach
{{--                                @foreach ($events as $event)--}}
{{--                                    <option value="{{ $event->eventType->tid }}">{{ $event->eventType->t_title }}</option>--}}
{{--                                @endforeach--}}
                            </select>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary mt-2" type="submit">Submit</button>
            </form>
        </div>

    <!--Program DIalog End-->
@endsection
@section('formJs')
    <!-- bootstrap-wysiwyg -->
    <script src="{{ asset('vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') }}"></script>
    <script src="{{ asset('vendors/jquery.hotkeys/jquery.hotkeys.js') }}"></script>
    <script src="{{ asset('vendors/google-code-prettify/src/prettify.js') }}"></script>
    <!-- jQuery Tags Input -->
    <script src="{{ asset('vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>
    <!-- Parsley -->
    <script src="{{ asset('vendors/parsleyjs/dist/parsley.min.js') }}"></script>
    <!-- Autosize -->
    <script src="{{ asset('vendors/autosize/dist/autosize.min.js') }}"></script>
    <!-- jQuery autocomplete -->
    <script src="{{ asset('vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js') }}"></script>
    <!-- starrr -->
    <script src="{{ asset('vendors/starrr/dist/starrr.js') }}"></script>
    <!--Full Calendar-->
{{--    <script src="{{ asset('vendors/fullcalendar/dist/fullcalendar.min.js') }}"></script>--}}

    <!--JQuery UI-->
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

    <script src="{{ asset('build/js/fullcalendar.js') }}"></script>

    {{-- hide message js --}}
    <script>

        $('#hide-message').show();
        setTimeout(function()
        {
            $('#hide-message').hide();
        },2000);

        $('#hidden-message').show();
        setTimeout(function()
        {
            $('#hidden-message').hide();
        },2000);

    </script>
    <script>
        $(document).ready(function() {
            //pass _token in all ajax
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            function convert(str) {
                const d = new Date(str);
                let month = '' + (d.getMonth() + 1);
                let day = '' + d.getDate();
                let year = d.getFullYear();
                if (month.length < 2) month = '0' + month;
                if (day.length < 2) day = '0' + day;
                let hour = '' + d.getUTCHours();
                let minutes = '' + d.getUTCMinutes();
                let seconds = '' + d.getUTCSeconds();
                if (hour.length < 2) hour = '0' + hour;
                if (minutes.length < 2) minutes = '0' + minutes;
                if (seconds.length < 2) seconds = '0' + seconds;

                return [year, month, day].join('-') + ' ' + [hour, minutes, seconds].join(':');
            }

            $('#addProgram').on('click', function () {
                $('#program').dialog({
                    title: 'Add Program',
                    width: 500,
                    height: 200,
                    modal: true,
                    show: {effect:'clip', duration:350},
                    hide: {effect:'clip', duration:250}
                })
            })

            $('#addEvent').on('click', function () {
                $('#dialog').dialog({
                    title: 'Add Event',
                    width: 600,
                    height: 750,
                    modal: true,
                    show: {effect:'clip', duration:350},
                    hide: {effect:'clip', duration:250}
                })
            })

            // page is now ready, initialize the calendar...

            var calendar = $('#calendar').fullCalendar({
                // put your options and callbacks here
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'year,month,basicWeek,basicDay'

                },
                timezone: 'local',
                // height: "auto",
                showNonCurrentDates: false,
                selectable: true,
                editable: true,
                aspectRatio: 2,
                dragabble: true,
                defaultView: 'month',
                yearColumns: 2,
                durationEditable: true,
                bootstrap: false,


                // events: [{
                //     title: "Some event",
                //     start: new Date('2017-1-10'),
                //     end: new Date('2017-1-20'),
                //     id: 1,
                //     allDay: true,
                //     editable: true,
                //     eventDurationEditable: true,
                // }, ],
                events: "{{ route('batches.index') }}",
                dayClick:function (date, event, view) {
                    $('#start').val(convert(date)),
                    $('#dialog').dialog({
                        title: 'Add Event',
                        width: 600,
                        height: 750,
                        modal: true,
                        show: {effect:'clip', duration:350},
                        hide: {effect:'clip', duration:250}
                    })
                },
                select: function (start, end){
                    $('#start').val(convert(start));
                    $('#end').val(convert(end));
                    $('#dialog').dialog({
                        title: 'Add Event',
                        width: 600,
                        height: 750,
                        modal: true,
                        show: {effect:'clip', duration:350},
                        hide: {effect:'clip', duration:250}
                    })
                },

                eventClick:function (event) {
                    $('#eid').val(event.eid);
                    $('#title').val(event.title);
                    $('#start').val(convert(event.start));
                    $('#end').val(convert(event.end));
                    $('#allDay').val(event.allDay);
                    $('#location').val(event.location);
                    $('#color').val(event.color);
                    $('#textColor').val(event.textColor);
                    $('#description').val(event.description);
                    $('#bid').val(event.bid);
                    $('#update').html('Update');
                    $('#dialog').dialog({
                        title: 'Edit Event',
                        width: 600,
                        height: 750,
                        modal: true,
                        show: {effect:'clip', duration:350},
                        hide: {effect:'clip', duration:250}
                    })
                }

                // select: function(start, end, allDay) {
                //     var title = prompt('Event Title:');
                //     if (title) {
                //         var event = {
                //             title: title,
                //             start: start.clone(),
                //             end: end.clone(),
                //             allDay: true,
                //             editable: true,
                //             eventDurationEditable: true,
                //             eventStartEditable: true,
                //             color: 'red',
                //         };
                //
                //
                //         calendar.fullCalendar('renderEvent', event, true);
                //     }
                // },
            })
        });
    </script>
    @include('sweetalert::alert')

{{--    <!-- calendar modal -->--}}
{{--    <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog">--}}
{{--            <div class="modal-content">--}}

{{--                <div class="modal-header">--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
{{--                    <h4 class="modal-title" id="myModalLabel">New Calendar Entry</h4>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <div id="testmodal" style="padding: 5px 20px;">--}}
{{--                        <form id="antoform" class="form-horizontal calender" role="form">--}}
{{--                            <div class="form-group">--}}
{{--                                <label class="col-sm-3 control-label">Title</label>--}}
{{--                                <div class="col-sm-9">--}}
{{--                                    <input type="text" class="form-control" id="title" name="title">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label class="col-sm-3 control-label">Description</label>--}}
{{--                                <div class="col-sm-9">--}}
{{--                                    <textarea class="form-control" style="height:55px;" id="descr" name="descr"></textarea>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>--}}
{{--                    <button type="button" class="btn btn-primary antosubmit">Save changes</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog">--}}
{{--            <div class="modal-content">--}}

{{--                <div class="modal-header">--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
{{--                    <h4 class="modal-title" id="myModalLabel2">Edit Calendar Entry</h4>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}

{{--                    <div id="testmodal2" style="padding: 5px 20px;">--}}
{{--                        <form id="antoform2" class="form-horizontal calender" role="form">--}}
{{--                            <div class="form-group">--}}
{{--                                <label class="col-sm-3 control-label">Title</label>--}}
{{--                                <div class="col-sm-9">--}}
{{--                                    <input type="text" class="form-control" id="title2" name="title2">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label class="col-sm-3 control-label">Description</label>--}}
{{--                                <div class="col-sm-9">--}}
{{--                                    <textarea class="form-control" style="height:55px;" id="descr2" name="descr"></textarea>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>--}}
{{--                    <button type="button" class="btn btn-primary antosubmit2">Save changes</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>--}}
{{--    <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>--}}
{{--    <!-- /calendar modal -->--}}

@endsection
