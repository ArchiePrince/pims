
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
</style>

@endsection
@section('content')
    <div class="page-title">
      <div class="title_left">
        <h3>Users <small>Some examples to get you started</small></h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="float-right">
            <a href="{{ route('events.create') }}" class=""><i class="fa fa-plus btn btn-icon btn-danger"></i></a>
          {{-- <a href="{{ route('events') }}"><button type="button" class="btn btn-danger btn-rounded btn-icon">
            {{-- {{ __('Register Event') }} --}}
          </button></a>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>Plus Table Design</small></h2>
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
            <p class="text-muted font-13 m-b-30">
              DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
              
        @if(\Session::has('del'))
            <div id="hide-message" class="alert alert-success alert-dismissible fade show" style="width: 25%; opacity:0.6;">
                <i class="fa fa-check-circle-o" style="font-size:1em"></i>
                {!! \Session::get('del') !!}
            </div>
        @endif
            </p>
            <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" cellspacing="0" style="width:100%">
              <thead>
                <tr>
                  <th>
                    <input type="checkbox" name="" id="check-all" disabled>
                  </th>
                  <th>#</th>
                  <th>Title</th>
                  <th>Type</th>
                  <th>Date</th>
                  <th>Location </th>
                  <th>Description </th>
                  <th>Remarks </th>
                  <th>Created By </th>
                  <th>Updated By </th>
                  <th>Actions</th>

                </tr>
              </thead>
              <tbody>
                @foreach($events as $event)
                <tr>
                  
                <td><input type="checkbox" id="check-all" ></td>
                <td class="rec_id">{{ $loop->iteration }}</td>
                <td>{{ $event->e_title }}</td>
                <td >{{ $event->eventType->t_title }}</td>
                <td class="full_name">{{ $event->e_date }}</td>
                <td class="gender">{{ $event->e_loc }}</td>
                <td class="p_email">{{ $event->e_desc }}</td>
                <td class="prfssn">{{ $event->e_rmrks }}</td>
                <td class="org">{{$event->creator->name ?? 'Not found'}}</td>
                <td class="org">{{$event->editor->name ?? 'Not found'}}</td>
                <td>
                   <a class=" m-r-15 text-muted paxView" data-toggle="modal" data-id="'.$event->eid.'" data-target="#EventView">
                      <i class="fa fa-eye" style="color: #0ecf48;"></i>
                    </a>
                    <a href=""><i class="fa fa-edit text-primary"></i></a>
                   <form action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button  type="submit" onclick="return confirm('Are you sure to want to delete it?')" class="fa fa-trash" style="color: red; border: none;"><i ></i></a></button>
                   </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          </div>
      </div>


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
    $(document).on('click','.paxView',function()
    {
        var _this = $(this).parents('tr');
        $('#m_pid').val(_this.find('.pid').text());
        $('#m_rec_id').val(_this.find('.rec_id').text());
        $('#m_name').val(_this.find('.full_name').text());
        $('#m_gender').val(_this.find('.gender').text());
        $('#m_email').val(_this.find('.p_email').text());
        $('#m_prfssn').val(_this.find('.prfssn').text());
        $('#m_org').val(_this.find('.org').text());
        $('#m_distr').val(_this.find('.distr').text());
        $('#m_rgn').val(_this.find('.rgn').text());
        $('#m_tel').val(_this.find('.tel').text());
        $('#m_phone').val(_this.find('.phone').text());
    });
</script> 

      @endsection
  
@endsection