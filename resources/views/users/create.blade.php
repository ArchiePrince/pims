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

                <div class="float-right">
                <a href="{{ route('users.index') }}"><button type="button" class="btn btn-danger btn-rounded btn-icon">
                  {{ __('View All Users') }}
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
									<div class="clearfix"></div>
								</div>

								<div class="x_content">
									<br />
									@if (Session::has('success'))

										<span id="hide-message" class="text-success label-align alert alert-dismissible fade show">
											{{ session('success') }}
										</span>

									@endif
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{ route('users.store') }}">
											  @csrf
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="full-name">Full Name <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="name" required="required" class="form-control " name="name">
											</div>
										</div>
                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="username">Username <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="name" required="required" class="form-control " name="username">
											</div>
										</div>
                    <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="email" id="email" name="email" required="required" class="form-control">
											</div>
										</div>

                                        <div class="item form-group">
                                                                      <label class="col-form-label col-md-3 col-sm-3 label-align" >Department</label>
                                                                      <div class="col-md-6 col-sm-6  ">
                                                                          <select name="did"class="select2_single form-control" tabindex="-1">
                                                                              <option selected>Select Department</option>
                                                                              @foreach ($departments ?? '' as $department)
                                                                                  <option value="{{ $department->did }}">{{ $department->d_title }}</option>
                                                                              @endforeach
                                                                          </select>
                                                                      </div>
                                                                  </div>

                                                                                    <div class="item form-group">
                                                                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="u_dpt">Set Default Password <span class="required">*</span>
                                                                                        </label>
                                                                                        <div class="col-md-6 col-sm-6 ">
                                                                                            <input type="password" id="password" name="password" required="required" class="form-control">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="item form-group">
                                                                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="u_dpt">Confirm Password<span class="required">*</span>
                                                                                        </label>
                                                                                        <div class="col-md-6 col-sm-6 ">
                                                                                            <input type="password" id="password-confirm" name="password_confirmation" required="required" class="form-control">
                                                                                        </div>
                                                                                    </div>




                                                                                    <div class="ln_solid"></div>
                                                                                    <div class="item form-group">
                                                                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                                                                            <a href="{{ route('users.index') }}"><button class="btn btn-primary" type="button">Cancel</button></a>
                                                                                            <button class="btn btn-primary" type="reset">Reset</button>
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

</script>

@endsection
