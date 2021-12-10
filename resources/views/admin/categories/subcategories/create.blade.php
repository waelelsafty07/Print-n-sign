
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

            {!! Form::open(['url'=>route('admin.categories.subcategory.store')]) !!}
                    @csrf
            <div class="form-group mt-2">
              {!! Form::label('name', 'SubCategory Name') !!}
              {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
            </div>
            {!! Form::hidden('category_id', $id) !!}

            {!! Form::submit('Add',['class'=>'btn btn-primary mt-2','placeholder' => '..................']) !!}
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
@endsection