@extends('layouts.admin')
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{$page_title}}</h3>
          </div>
          
          <!-- /.card-header -->
          <div class="card-body">

          {!! Form::open(['id'=>'form_data','url'=>route('admin.categories.multiple'),'method'=>'delete']) !!}
            {!! $dataTable->table([
              'class'=>' table table-striped table-hover  table-bordered',
            ],
            true
            ) !!}
            {!! Form::close() !!}
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<div class="modal fade" id="ModelDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger empty d-none">
          Please Check Your Select
        </div>
        <div class="alert alert-danger not-empty d-none">
          Are you Sure To Delete <span class="record_count"></span> Records
        </div>
      </div>
      <div class="modal-footer">
      <div class="empty d-none">
        <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
      </div>
        <div class="not-empty d-none">
          <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">No</button>
          <input type="submit" class="btn btn-danger" id="del_all" name="del_all" value="Yes">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('js')
<!-- <link rel="stylesheet" href="{{asset('/js/datatables/jquery.dataTables.min.js')}}"></link> -->


  <script
  src="https://code.jquery.com/jquery-1.9.1.min.js"
  integrity="sha256-wS9gmOZBqsqWxgIVgA8Y9WcQOa7PgSIX+rPA0VL2rbQ="
  crossorigin="anonymous"></script>
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css"> -->

{!! $dataTable->scripts() !!}

<script src="{{asset('/js/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/js/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="{{asset('/vendor/datatables/buttons.server-side.js')}}"></script>

@endpush