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
  </div>
    <div class="row">           
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Add New Participant</h4>
            <form class="form-sample"  method="POST" action="{{ url('participants') }}">
              @csrf
              <p class="card-description">
                Participant Info
              </p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">First Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="f_name" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Last Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="l_name" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Gender</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">E-mail Address</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="email" placeholder="john.doe@giz.de"/>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"> Profession </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="prfssn"/>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Organization</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="text"/>
                    </div>
                  </div>
                </div>
              </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label"> District </label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" />
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Region</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="text"/>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label" name=> Telephone </label>
                  <div class="col-sm-9">
                    <input type="tel" class="form-control" />
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Mobile number</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="tel"/>
                  </div>
                </div>
              </div>
            </div>

              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
            </form>            
          </div>
        </div>
      </div>
</div>
  <!-- content-wrapper ends -->


@endsection

