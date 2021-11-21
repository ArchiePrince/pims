@extends('layout')
@extends('navbar')
@extends('sidebar')
@extends('footer')
@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h4 class="font-weight-bold mb-0">PIMS | Participants</h4>
          </div>
          <div>
              <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                <i class="ti-clipboard btn-icon-prepend"></i>Report
              </button>
          </div>
        </div>
      </div>
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">All Participants
              <a href="{{ url('participants/create') }}" class="float-right"><button type="button" class="btn btn-inverse-success btn-rounded btn-icon">
                <i class="ti-plus"></i>
              </button></a>
            </h4>
            <div class="table-responsive pt-2">
              <table class="table table-striped table-bordered display nowrap" id="example" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th> Profession </th>
                    <th> Organization </th>
                    <th> District </th>
                    <th> Telephone </th>
                    <th>Created By</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th> Profession </th>
                    <th> Organization </th>
                    <th> District </th>
                    <th> Telephone </th>
                    <th>Created By</th>
                    <th>Actions</th>
                </tfoot>
                <tbody>
 
                  @foreach ($participants as $participant)
                    
                  
                  <tr>
                    <td>{{ $participant->pid }}</td>
                    @php
                      $full_name = $participant->f_name. " ".$participant->l_name;
                    @endphp
                    <td>{{ $full_name }}</td>
                    <td>{{ $participant->p_email }}</td>
                    <td>{{ $participant->prfssn }}</td>
                    <td>{{ $participant->org }}</td>
                    <td>{{ $participant->distr }}</td>
                    <td> {{ $participant->tel }} </td>
                    <td>{{ $participant->created_by }}</td>
                    <td>
                      <a><button type="button" class="btn  btn-rounded btn-icon btn-sm">
                        <i class="ti-eye text-primary"></i>
                      </button>
                      </a>
                      <button type="button" class="btn btn-rounded btn-icon btn-sm">
                        <i class="ti-pencil-alt text-warning"></i>
                      </button>
                      <button type="button" class="btn btn-rounded btn-icon btn-sm">
                        <i class="ti-trash text-danger"></i>
                      </button>
                    </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- content-wrapper ends -->
@endsection
