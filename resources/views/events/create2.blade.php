@extends('layout')
@section('formStyle')
  	<!-- bootstrap-wysiwyg -->
	<link href="{{ asset('vendors/google-code-prettify/bin/prettify.min.css') }}" rel="stylesheet">
	<!-- Select2 -->
	<link href="{{ asset('vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">
	<!-- Switchery -->
	<link href="{{ asset('vendors/switchery/dist/switchery.min.css') }}" rel="stylesheet">
	<!-- starrr -->
	<link href="{{ asset('vendors/starrr/dist/starrr.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="">

  <div class="clearfix"></div>
  <div class="page-title">
  <div class="title_left">
    <h3>EVENTS</h3>
  </div>

						<div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

                <div class="float-right">
                <a href="{{ route('events.index') }}"><button type="button" class="btn btn-danger btn-rounded btn-icon">
                  {{ __('View All Events') }}
                </button></a>
                </div>
        </div>
						</div>
					</div>
</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2><small>CREATE A NEW EVENT</small></h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a class="dropdown-item" href="#">Settings 1</a>
												</li>
												<li><a class="dropdown-item" href="#">Settings 2</a>
												</li>
											</ul>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>

								<div class="x_content">
									<br />
									@if (Session::has('success'))

										<span id="hide-message" class="text-success label-align alert alert-dismissible fade show">
											{{ session('success') }}
										</span>

									@endif
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{ route('events.store') }}">
											  @csrf
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Event Title <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="event-name" required="required" class="form-control " name="e_title">
											</div>
										</div>

{{--                    <div class="item form-group">--}}
{{--                          <label class="col-form-label col-md-3 col-sm-3 label-align">Date <span class="required">*</span>--}}
{{--                          </label>--}}
{{--                          <div class="col-md-6 col-sm-6 ">--}}
{{--                            <input id="e_date" class="date-picker form-control"  type="date" required="required" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" name="e_date">--}}
{{--                            <script>--}}
{{--                              function timeFunctionLong(input) {--}}
{{--                                setTimeout(function() {--}}
{{--                                  input.type = 'text';--}}
{{--                                }, 60000);--}}
{{--                              }--}}
{{--                            </script>--}}
{{--                          </div>--}}
{{--                    </div>--}}
                    <div class="item form-group">
                                          <label class="col-form-label col-md-3 col-sm-3 label-align" >Event Type</label>
                            <div class="col-md-6 col-sm-6  ">
                                            <select name="tid"class="select2_single form-control" tabindex="-1">
                                              <option selected>Select Event Type</option>
											  @foreach ($eventType as $type)
												      <option value="{{ $type->tid }}">{{ $type->t_title }}</option>
											  @endforeach
                                            </select>
                            </div>
                      </div>


{{--                    <div class="item form-group">--}}
{{--											<label class="col-form-label col-md-3 col-sm-3 label-align" for="e_loc">Location <span class="required">*</span>--}}
{{--											</label>--}}
{{--											<div class="col-md-6 col-sm-6 ">--}}
{{--												<input type="text" id="e_loc" name="e_loc" required="required" class="form-control">--}}
{{--											</div>--}}
{{--										</div>--}}


{{--                <div class="item form-group">--}}
{{--									<label class="control-label col-md-3 col-sm-3 label-align">Description</label>--}}
{{--									<div class="col-md-6 col-sm-6 ">--}}
{{--										<textarea class="resizable_textarea form-control" name="e_desc"></textarea>--}}
{{--									</div>--}}
{{--								</div>--}}

{{--                     <div class="item form-group">--}}
{{--									<label class="control-label col-md-3 col-sm-3 label-align">Remarks</label>--}}
{{--									<div class="col-md-6 col-sm-6 ">--}}
{{--										<textarea class="resizable_textarea form-control" name="e_rmrks"></textarea>--}}
{{--									</div>--}}
{{--								</div>--}}
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-3 col-sm-3 offset-md-3">
												<a href="{{ route('participants.index') }}"><button class="btn btn-primary" type="button">Cancel</button></a>
												<button class="btn btn-primary" type="reset">Reset</button>
												<button type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>



          	<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2><small>ASSIGN BATCH TO EVENT</small></h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a class="dropdown-item" href="#">Settings 1</a>
												</li>
												<li><a class="dropdown-item" href="#">Settings 2</a>
												</li>
											</ul>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>

								<div class="x_content">
									<br />
									@if (Session::has('add'))

										<span id="hidden-message" class="text-success label-align alert alert-dismissible fade show">
											{{ session('add') }}
										</span>

									@endif
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{ route('batches.store') }}">
											  @csrf
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Event <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="event-name" class="form-control " name="e_title" placeholder="{{ $batchEvent->e_title ?? "No data"}}">
											</div>
										</div>
											 {{-- <div class="item form-group">
                                          <label class="col-form-label col-md-3 col-sm-3 label-align" >Event</label>
                            <div class="col-md-6 col-sm-6  ">
                                            <select class="select2_single form-control" tabindex="-1" name="b_title">
												<option selected value="Batch-01">{{ $batch->b_title }}</option>
                                              @foreach ($batch as $b)

											  @endforeach

                                              <option value="Batch-02">Batch-02</option>
                                              <option value="Batch-03">Batch-03</option>
                                              <option value="Batch-04">Batch-04</option>

                                            </select>
                            </div>
                      </div> --}}
									-
					  <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align">Start Date <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input id="start" class="date-picker form-control"  type="date" required="required" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" name="start">
                            <script>
                              function timeFunctionLong(input) {
                                setTimeout(function() {
                                  input.type = 'text';
                                }, 60000);
                              }
                            </script>
                          </div>
                    </div>
					<div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align">End Date <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input id="end_time" class="date-picker form-control"  type="date" required="required" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" name="end">
                            <script>
                              function timeFunctionLong(input) {
                                setTimeout(function() {
                                  input.type = 'text';
                                }, 60000);
                              }
                            </script>
                          </div>
                    </div>

										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-3 col-sm-3 offset-md-3">
												<a href="{{ route('participants.index') }}"><button class="btn btn-primary" type="button">Cancel</button></a>
												<button type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>
</div>
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

@endsection
