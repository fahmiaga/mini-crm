@extends('Admin.layout')

@section('title',__('Add Item Page'))
    
@section('content')
<!-- Content Wrapper. Contains page content -->

    

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">{{__('Add Item Page')}}</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
         
         <form action="{{url('items')}}" method="POST" >
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">{{__('translate.name')}}</label>
                        <input type="text" name="name" class="form-control" placeholder="{{__('name')}}..." @error('name') is-invalid @enderror value="{{old('name')}}">
                        <div class="text-danger">
                            @error('name')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">{{__('Price')}}</label>
                        <input type="text" name="price" class="form-control" placeholder="{{__('price')}}..."  @error('price') is-invalid @enderror value="{{old('price')}}">
                        <div class="text-danger">
                            @error('price')
                                {{$message}}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary">{{__('Submit')}}</button>
                    </div>
                </div>
            </div>
        </div>
        

        </form>
          
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
        

    </section>
    <!-- /.content -->

    
@endsection