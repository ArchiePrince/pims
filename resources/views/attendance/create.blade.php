@extends('layout')

@section('register')     
     
     <!--Participant Register Modal View-->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Register Participant to Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="registerBody">
                <form action="{{ route('attendance.store') }}" method="POST"><!-- form add -->
                    {{ csrf_field() }}
               									 <div class="item form-group">
                                          <label class="col-form-label col-md-3 col-sm-3 label-align" >Batch:Event</label>
                            <div class="col-md-6 col-sm-6  ">
                                            <select class="select2_single form-control" tabindex="-1" id="att_bid" name="bid">
                                                 <option selected value="">{{ __('Select Batch:Event') }}</option>
                                              @foreach  ($attBatchEvent as $batch)
                                               
                                                  <option value="{{ $attendance->bid }}">{{ $batch->b_title }}</option>
                                                
                                              
                                              @endforeach
                                            
                                             
                                            </select>
                            </div>
                      </div>
                    </div>
                </form>
                <!-- form add end -->
            </div>
            <div class="clearfix"></div>
                                <div class="modal-footer">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icofont icofont-eye-alt"></i>Close</button>
                        <button type="submit" id=""name="" class="btn btn-success  waves-light"><i class="icofont icofont-check-circled"></i>Save</button>
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- End Modal View-->

@endsection
