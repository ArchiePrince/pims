@extends('layout')
@section('dTstyles')
<!-- Datatables -->

<link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<style>
    /* close icon */
    .close:focus, .close:hover {
        color: rgb(255, 0, 0) ;
        text-decoration: none;
        opacity: .75;
        outline: none !important;
    }
    .close {
        font-size: 25px !important;
        margin-top: 5px !important;
    }
    #notifDiv {
        z-index: 10000;
        display: none;
        background: blue;
        font-weight: 450;
        width: 350px;
        position: fixed;
        top: 80%;
        left: 5%;
        color: white;
        padding: 5px 20px;
    }
</style>

@endsection
@section('content')
    <div class="page-title">
      <div class="title_left">
        <h3>All Participants</h3>

        <div class="form-group row">
            <div class="x_content">
									<br />
                    @if(\Session::has('del'))
                        <div id="hide-message" class="alert alert-primary alert-dismissible fade show" style="width: 70%; opacity: 1;">
                            <i class="fa fa-check-circle-o" style="font-size:1em"></i>
                            {!! \Session::get('del') !!}
                        </div>
                    @endif
                @if(session('status'))
                    <div id="hide-message" class="alert alert-primary alert-dismissible fade show" role="alert" style="width: 70%; opacity: 1;">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>

          @if(isset($errors) && $errors->any())
              <div id="hide-message" class="alert alert-primary alert-dismissible fade show">
                 @foreach($errors->all() as $error)
                     {{ $error }}
                 @endforeach
              </div>
          @endif

          @if(session()->has('failures'))

              <table id="hide-table" class="table table-danger">
                  <tr>
                      <th>Row</th>
                      <th>Attribute</th>
                      <th>Errors</th>
                      <th>Value</th>
                  </tr>

                  @foreach(session()->get('failures') as $validation)
                      <tr>
                          <td>{{ $validation->row() }}</td>
                          <td>{{ $validation->attribute() }}</td>
                          <td>
                              <ul>
                                  @foreach($validation->errors() as $e)
                                      <li>{{ $e }}</li>
                                  @endforeach
                              </ul>
                          </td>
                          <td>
                              {{ $validation->values()[$validation->attribute()] }}
                          </td>
                      </tr>
                  @endforeach
              </table>
          @endif

      </div>

      <div class="title_right">
          <div class="float-left">
              <form action="{{ route('participants.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group mt-3">
                      <input type="file" name="file">
                      <button type="submit" name="file" class="btn btn-outline-danger">Import</button>
                  </div>
              </form>
          </div>
        <div class="col-md-5 col-sm-5 col-xs-9 form-group pull-right top_search">
          <div class="float-right">
{{--              <button class="btn btn-danger m-r-15" ><i class="fa fa-plus"></i> Add Participant</button>--}}
              <div class="btn-group">
                  <button type="button" class="btn btn-danger dropdown-toggle m-r-15" data-toggle="dropdown"
                          aria-haspopup="true" aria-expanded="false"><i class="fa fa-plus"></i> Add Participant
                  </button>
                  <div class="dropdown-menu">
                      <a class="dropdown-item" data-toggle="modal" data-target="#ParticipantSubmit"> <i style="color: red" class="fa fa-file"></i> Modal Form </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ route('participants.download') }}"><i style="color: red" class="fa fa-download"></i>  Download Form</a>
                  </div>
              </div>
          </div>

        </div>

      </div>
    </div>

    <div class="clearfix"></div>

      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>Distinct Participants</h2>
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
              <div class="row">
                  <div class="col-sm-12">
                    <div class="card-box table-responsive">
            <table id="datatable" class="table table-striped table-bordered text-nowrap" style="width:100%">
              <thead>
                <tr>
{{--                    <th>--}}
{{--                    <input type="checkbox" class="checkBoxClassAll" value="">--}}
{{--                    </th>--}}
                  <th>#</th>
                  <th>Name</th>
                  <th>Email </th>
                    <th>Gender</th>
                  <th>Profession </th>

                  <th>Organization </th>
                    <th>Work Location</th>
                  <th>District </th>
                  <th>Region</th>
                  <th>Telephone</th>
                  <th>Mobile Number</th>
                  <th>Actions</th>

                </tr>
              </thead>
              <tbody>
                @if($participants)
                @foreach($participants as $participant)
                <tr id="pid{{ $participant->pid }}">
{{--                <td><input type="checkbox" class="checkBoxClass" name="pid[]" value="{{ $participant->pid }}"></td>--}}
                  <td class="rec_id">{{ $participant->pid }}</td>
                  @php
                  $full_name = $participant->f_name. " ".$participant->l_name;
                @endphp
                <td class="full_name">{{ $full_name }}</td>
                <td class="p_email">{{ $participant->p_email }}</td>
                    <td class="gender"> {{ $participant->gender }}</td>
                <td class="profession">{{ $participant->profession }}</td>


                    <td class="org">{{ $participant->org }}</td>
                    <td class="workloc">{{ $participant->workloc }}</td>
                <td  class="district">{{ $participant->district }}</td>
                <td class="region"> {{ $participant->region }}</td>
                <td  class="tel"> {{ $participant->tel }} </td>
                <td class="phone"> {{ $participant->phone ?? "Null" }}</td>
                <td>
                   <a class=" m-r-15 text-muted paxView" data-toggle="modal" data-id="'.$participant->pid.'" data-target="#ParticipantView">
                      <i class="fa fa-eye" style="color: #0ecf48;"></i>
                    </a>
                    <a href="{{ route('participants.edit', $participant) }}"><i class="fa fa-edit text-primary"></i></a>
                   <form action="{{ route('participants.destroy', $participant) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button  type="submit" onclick="return confirm('Are you sure to want to delete it?')" class="fa fa-trash" style="color: red; border: none;"><i ></i></button>
                   </form>
                  </td>
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>
          </div>
          </div>
      </div>


{{--      <!-- Participant Modal View-->--}}
<div class="modal fade" id="ParticipantView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">View Participant Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="demo-form"><!-- form add -->
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" id="m_pid" name="pid" value=""/>

                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Serial Number</label>
                            <div class="col-sm-9">
                                <input type="text" id="m_rec_id"name="rec_id" class="form-control" value="" readonly="readonly"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Full Name</label>
                            <div class="col-sm-9">
                                <input type="text" id="m_name"name="name" class="form-control" value="" readonly/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Gender</label>
                            <div class="col-sm-9">
                                <input type="text" id="m_gender"name="gender" class="form-control" value="" readonly/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email Address</label>
                            <div class="col-sm-9">
                                <input type="text" id="m_email"name="p_email" class="form-control" value="" readonly/>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Profession</label>
                            <div class="col-sm-9">
                                <input type="text" id="m_prfssn"name="profession" class="form-control" value="" readonly/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Organization</label>
                            <div class="col-sm-9">
                                <input type="text" id="m_org"name="org" class="form-control" value="" readonly/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Work Location</label>
                            <div class="col-sm-9">
                                <input type="text" id="m_workloc"name="workloc" class="form-control" value="" readonly/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">District</label>
                            <div class="col-sm-9">
                                <input type="text" id="m_distr"name="district" class="form-control" value="" readonly/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Region</label>
                            <div class="col-sm-9">
                                <input type="text" id="m_rgn"name="region" class="form-control" value="" readonly/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Telephone</label>
                            <div class="col-sm-9">
                                <input type="tel" id="m_tel"name="tel" class="form-control" value="" readonly/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Mobile Number</label>
                            <div class="col-sm-9">
                                <input type="tel" id="m_phone"name="phone" class="form-control" value="" readonly/>
                            </div>
                        </div>
                    </div>

                <!-- form add end -->
                  <div class="clearfix"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                </div>
                </form>
        </div>
    </div>
</div>
</div>
{{--<!-- End Modal View-->--}}


    <!-- Participant Modal Submit-->
    <div class="modal fade" id="ParticipantSubmit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2" style="text-align: center;">Add Participant</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{ route('participants.store') }}">
                        @csrf
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">First Name <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-6 ">
                                <input type="text" id="first-name" required="required" class="form-control " name="f_name">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Last Name <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-6 ">
                                <input type="text" id="last-name" name="l_name" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" >Gender</label>
                            <div class="col-md-9 col-sm-6  ">
                                <select id="gender" name="gender"class="select2_single form-control" tabindex="-1">
                                    <option value="" disabled>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="p_email">Email <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-6 ">
                                <input type="email" id="email" name="p_email" required="required" class="form-control">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="prfssn">Profession <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-6 ">
                                <input type="text" id="profession" name="profession" required="required" class="form-control">
                            </div>
                        </div>


                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="org">Organization <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-6 ">
                                <input type="text" id="organization" name="org" required="required" class="form-control">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="org">Work Location <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-6 ">
                                <input type="text" id="workloc" name="workloc" required="required" class="form-control">
                            </div>
                        </div>


                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="prfssn">District <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-6 ">
                                <input type="text" id="district" name="district" required="required" class="form-control">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="rgn">Region <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-6 ">
                                <input type="text" id="region" name="region" required="required" class="form-control">
                            </div>
                        </div>



                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="tel">Telephone <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-6 ">
                                <input type="tel" id="telephone" name="tel" required="required" class="form-control">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="tel">Mobile Number
                            </label>
                            <div class="col-md-9 col-sm-6 ">
                                <input type="tel" id="phone" name="phone" class="form-control">
                            </div>
                        </div>
                        <!-- form add end -->
                        <div class="clearfix"></div>
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-md-12 col-sm-6 offset-md-1">
                                    <button type="submit" name="modal" class="btn btn-success btn-round"><i class="fa fa-save"></i> Submit</button>
                                    <a href="{{ route('participants.index') }}"><button class="btn btn-round btn-danger" data-dismiss="modal"type="button"><i class="fa fa-close"></i> Cancel</button></a>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <!-- End Modal Submit-->


    @yield('register')


      @section('dTscripts')
      <script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
      <script src="{{ asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
      <script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
      <script src="{{ asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
      <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
      <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
      <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
      <script src="{{ asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
      <script src="{{ asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
      <script src="{{ asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
      <script src="{{ asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
      <script src="{{ asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
      <script src="{{ asset('vendors/jszip/dist/jszip.min.js') }}"></script>
      <script src="{{ asset('vendors/pdfmake/build/pdfmake.min.js') }}"></script>
      <script src="{{ asset('vendors/pdfmake/build/vfs_fonts.js') }}"></script>


      {{-- hide message js --}}
<script>

    $('#hide-message').show();
    setTimeout(function()
    {
        $('#hide-message').hide();
    },2000);

</script>
        <script>

            $('#hide-table').show();
            setTimeout(function()
            {
                $('#hide-table').hide();
            },20000);

        </script>
<script>
    $(document).on('click','.paxView',function()
    {
        var _this = $(this).parents('tr');
        $('#m_pid').val(_this.find('.pid').text());
        $('#m_rec_id').val(_this.find('.rec_id').text());
        $('#m_name').val(_this.find('.full_name').text());
        $('#m_gender').val(_this.find('.gender').text());
        $('#m_email').val(_this.find('.p_email').text());
        $('#m_prfssn').val(_this.find('.profession').text());
        $('#m_org').val(_this.find('.org').text());
        $('#m_workloc').val(_this.find('.workloc').text());
        $('#m_distr').val(_this.find('.district').text());
        $('#m_rgn').val(_this.find('.region').text());
        $('#m_tel').val(_this.find('.tel').text());
        $('#m_phone').val(_this.find('.phone').text());
    });
</script>

{{-- <script>
    $(function(e){
        $("#chkCheckAll").click(function(){
            $(".checkBoxClass").prop('checked',$(this).prop('checked'));
        });

        $("#deleteAllSelectedRecord").click(function(e){
            e.preventDefault();
            var all_ids = [];

            $("input:checkbox[name=pid]:checked").each(function(){
                all_ids.push($(this).val());
            });

            // $.ajax({
            //     url:"{{ route('participant.deleteSelected') }}",
            //     type:"DELETE",
            //     data:{
            //         _token:$("input[name=_token]").val(),
            //         pid:all_ids
            //     },
            //     success:function(response){
            //         $.each(all_ids, function(key,val){
            //             $("#pid"+val).remove();
            //         })
            //     }
            // })
        })
    });


</script> --}}

{{-- <script>


$(function(f){
        $("#chkCheckAll").on('submit', function(){
            $(".checkBoxClass").prop('checked',$(this).prop('checked'));
        });

        $("#submitSelectedParticipants").on('submit', function(f){
            e.preventDefault();
            var all_ids = [];

            $("input:checkbox[name=ids]:checked").each(function(){
                all_ids.push($(this).val());
            });

            $.ajax({
                url:"{{ route('attendance.store') }}",
                type:"POST",
                data:{
                    _token:$("input[name=_token]").val(),
                    ids:all_ids
                },
                    success: function(data){
                        alert('Successfully Submitted!')
                    }
                }
            })
        })
    });
</script> --}}

{{-- <script>
    $(function(){
        $('#registration').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                url:'{{ route('attendance.store') }}',
                type:'POST',
                data: $('#registration').serialize(),
                success: function(data){
                    alert('Successfully Submitted!')
                }
            });
        });
    });
</script> --}}

{{-- <script>
    $(document).on('click', 'registerButton', function(event){
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href,
            beforeSend: function() {
                $('#loader').show();
            },

            //return the result
            success: function(result) {
                $('#registerModal').modal("show");
                $('#registerBody').html(result).show();
            },
            complete: function() {
                $('#loader').hide();
            },
            error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error: "+ error);
                $('#loader').hide();
            },
            timeout: 2000
        })
    });

</script> --}}
{{-- <script>
    $(document).ready(function(){
        $('.save_btn').on('click', function(e) {
            e.preventDefault();

            const pid = [];
            const bid;

            $('.checkBoxClass').each(function() {
                if($(this).is(":checked")) {
                    pid.push($(this).val());
                }
            });

            $.ajax({
                url: '{{ route('attendance.store') }}',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    pid: pid,
                    bid: bid
                },
                success:function(response) {
                    if(response.success) {
                        $('#notifDiv').fadeIn();
                        $('#notifDiv').text('Data Inserted Successfully!');
                        setTimeout(() => {
                            $('#notifDiv').fadeOut();
                        }, 3000);
                        $('input[type="checkbox"]').prop('checked', false);
                    } else {
                        console.log('error');
                    }
                },
                error:function(response) {
                    console.log('error');
                }
            });
        });
    });
</script> --}}

      @endsection
@include('sweetalert::alert')
@endsection
