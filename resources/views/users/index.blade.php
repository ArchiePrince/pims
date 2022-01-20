@extends('layout')

@section('dTstyles')
<!-- Datatables -->
    
<link href="{{ asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
 <link href="{{ asset('build/css/custom.min.css') }}" rel="stylesheet">
<style>
    {{-- /* close icon */
    .close:focus, .close:hover {
        color: rgb(255, 0, 0) ;
        text-decoration: none;
        opacity: .75;
        outline: none !important;
    }
    .close {
        font-size: 30px !important;
        margin-top: 5px !important;
    }
</style> --}}

@endsection
@section('content')
    <div class="page-title">
      <div class="title_left">
        <h3>Users <small>Some examples to get you started</small></h3>
      </div>

        @if(\Session::has('del'))
            <div id="hide-message" class="alert alert-dark-success alert-dismissible fade show" style="width: 25%;">
                <i class="fa fa-check-circle-o" style="font-size:1em"></i>
                {!! \Session::get('del') !!}
            </div>
        @endif

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="float-right">
            <a href="{{ url('users/create') }}" class=""><i class="fa fa-plus btn btn-icon btn-danger"></i></a>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>All Users</small></h2>
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
            <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" cellspacing="0" style="width:100%">
              <thead>
                <tr>
                  <th><input type="checkbox" name="" id=""></th>
                  <th>#</th>
                  <th>Full name</th>
                  <th>Username</th>
                  <th>Email </th>
                  <th>Department </th>
                  <th>Created at</th>
                  <th>Updated at</th>
                  <th>Actions</th>

                </tr>
              </thead>
              <tbody>
                @if($users)
                @foreach($users as $user)
                <tr>
                  <td><input type="checkbox" name="" id=""></td>
                  <td class="uid">{{ $user->uid }}</td>
                <td class="full_name">{{ $user->name }}</td>
                <td class="username"> {{ $user->username }}</td>
                <td class="email">{{ $user->email }}</td>
                <td class="u_dpt">{{ $user->u_dpt }}</td>
                <td class="created_at">{{ $user->created_at }}</td>
                <td  class="updated_at">{{ $user->updated_at }}</td>
                <td>
                   <a class=" m-r-15 text-muted userView" data-toggle="modal" data-id="'.$user->uid.'" data-target="#UserView">
                      <i class="fa fa-eye" style="color: #0ecf48;"></i>
                    </a>
                    <a href="{{ url('users/'.$user->uid) }}"><i class="fa fa-edit text-primary"></i></a>
                   
                    <a href="{{ url('users/'.$user->uid.'/delete') }}" onclick="return confirm('Are you sure to want to delete it?')"><i class="fa fa-trash" style="color: red;"></i></a>
                  </td>
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>
          </div>
          </div>
      </div>

      <!-- Modal View-->
<div class="modal fade" id="UserView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="demo-form"><!-- form add -->
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" id="m_uid" name="uid" value=""/>
                    
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Full Name</label>
                            <div class="col-sm-9">
                                <input type="text" id="m_name"name="name" class="form-control" value="" readonly/>
                            </div>
                        </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" id="m_username"name="username" class="form-control" value="" readonly/>
                        </div>
                    </div>    

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email Address</label>
                            <div class="col-sm-9">
                                <input type="text" id="m_email"name="email" class="form-control" value="" readonly/> 
                                {{-- <span id="m_email" name="p_email" class="form-control" aria-readonly>{{ $participant->p_email }}</span> --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Department</label>
                            <div class="col-sm-9">
                                <input type="text" id="m_u_dpt"name="u_dpt" class="form-control" value="" readonly/>
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Created At</label>
                            <div class="col-sm-9">
                                <input type="text" id="m_created_at"name="created_at" class="form-control" value="" readonly/>
                            </div>
                        </div>

                                          
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Updated At</label>
                            <div class="col-sm-9">
                                <input type="text" id="m_updated_at"name="updated_at" class="form-control" value="" readonly/>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- form add end -->
            </div>
            <div class="clearfix"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icofont icofont-eye-alt"></i>Close</button>
                </div>
        </div>
    </div>
</div>
<!-- End Modal View-->
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
    },5000);
    
</script>
{{-- <script>
$(document).ready(function() {
    $('#datatable-checkbox').DataTable( {
        "columnDefs": [
            {
                "targets": [ 3 ],
                "visible": false
            },
            {
                "targets": [ 8 ],
                "visible": false
            },
            {
                "targets": [ 10 ],
                "visible": false
            }
        ]
    } );
} )
</script> --}}
{{-- view js --}}
<script>
    $(document).on('click','.userView',function()
    {
        var _this = $(this).parents('tr');
        $('#m_uid').val(_this.find('.uid').text());
        $('#m_name').val(_this.find('.full_name').text());
        $('#m_username').val(_this.find('.username').text());
        $('#m_email').val(_this.find('.email').text());
        $('#m_u_dpt').val(_this.find('.u_dpt').text());
        $('#m_created_at').val(_this.find('.created_at').text());
        $('#m_updated_at').val(_this.find('.updated_at').text());

    });
</script> 

      @endsection
  
@endsection