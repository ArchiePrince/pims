
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
    <h3>Users <small>Some examples to get you started</small></h3>
  </div>

						<div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

                {{-- <div class="float-right">
                <a href="{{ route('participants.index') }}"><button type="button" class="btn btn-danger btn-rounded btn-icon">
                  {{ __('View All Participants') }}
                </button></a>
                </div> --}}
        </div>
						</div>
					</div>
</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Form Design <small>different form elements</small></h2>
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
                                      @if(\Session::has('update'))
                                        <div id="hide-message" class="alert alert-success alert-dismissible fade show">
                                            <i class="fa fa-check-circle-o" style="font-size:1em"></i>
                                            {!! \Session::get('update') !!}
                                        </div>
                                    @endif
									<div class="clearfix"></div>
								</div>

								<div class="x_content">
									<br />
									{{-- @if (Session::has('success'))
										<span class="text-success label-align">
											{{ session('success') }}
										</span>

									@endif --}}
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  action="{{ route('participants.update', $participant) }}" method="POST">
											  @csrf
											  @method('PUT')
                                              <input type="hidden" name="pid" value="{{ $participant->pid }}">
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">First Name <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="first-name" required="required" class="form-control " name="f_name" value="{{ $participant->f_name }}">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Last Name <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="last-name" name="l_name" required="required" class="form-control" value="{{ $participant->l_name }}">
											</div>
										</div>

					<div class="item form-group">
                                          <label class="col-form-label col-md-3 col-sm-3 label-align" >Gender</label>
                            <div class="col-md-6 col-sm-6  ">
                                            <select id="gender" name="gender" class="select2_single form-control" tabindex="-1">
                                            <option value="" disabled>Select Gender</option>
											<option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            </select>
                            </div>
                      </div>
                    <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="p_email">Email <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="email" id="email" name="p_email" required="required" class="form-control" value="{{ $participant->p_email }}">
											</div>
										</div>

                    <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="profession">Profession <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="profession" name="profession" required="required" class="form-control" value="{{ $participant->profession }}">
											</div>
										</div>


                    <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="org">Organization <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="organization" name="org" required="required" class="form-control" value="{{ $participant->org }}">
											</div>
										</div>

                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="org">Work Location <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="organization" name="workloc" required="required" class="form-control" value="{{ $participant->workloc }}">
                                            </div>
                                        </div>


                    <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="district">District <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="district" name="district" required="required" class="form-control" value="{{ $participant->district }}">
											</div>
										</div>

										 <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="rgn">Region <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="region" name="region" required="required" class="form-control" value="{{ $participant->region }}">
											</div>
										</div>



                    <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="tel">Telephone <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="tel" id="telephone" name="tel" required="required" class="form-control" value="{{ $participant->tel }}">
											</div>
										</div>

                    <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="tel">Mobile Number
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="tel" id="phone" name="phone" class="form-control" value="{{ $participant->phone }}">
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="button"><a href="{{ route('participants.index') }}">Cancel</a></button>
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
        },5000);

    </script>

@endsection
