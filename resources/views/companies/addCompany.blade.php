@extends('Admin.layout')

@section('title',__('Add Companies Page'))
    
@section('content')
<!-- Content Wrapper. Contains page content -->

    

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">{{__('Add Companies Page')}}</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
         
         <form action="{{url('companies')}}" method="POST" enctype="multipart/form-data">
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
                        <label for="">{{__('Email')}}</label>
                        <input type="text" name="email" class="form-control" placeholder="{{__('email')}}..."  @error('email') is-invalid @enderror value="{{old('email')}}">
                        <div class="text-danger">
                            @error('email')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="form-group">
                        <label for="">Logo</label>
                        <input type="file" name="logo" class="form-control" placeholder="Name..."  @error('logo') is-invalid @enderror>
                        <div class="text-danger">
                            @error('logo')
                                {{$message}}
                            @enderror
                        </div>
                    </div> --}}
                    <div class="col-sm-12">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Logo</label>
                                <input type="file" name="logo" class="form-control " id="img-old" placeholder="Name..."  @error('logo') is-invalid @enderror onchange="previewImg()">
                                <div class="text-danger">
                                    @error('logo')
                                        {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <img src="{{url('logo/default-logo.png')}}" alt="" width="100px" height="100px" class="img-preview">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">{{__('translate.website')}}</label>
                        <input type="text" name="website" class="form-control" placeholder="{{__('website')}}..."  @error('website') is-invalid @enderror value="{{old('website')}}">
                        <div class="text-danger">
                            @error('website')
                                {{$message}}
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="form-group">
                        <label for="">{{__('Timezone')}}</label>
                        <select class="form-control" name="timezone" aria-label="Default select example">
                            <option selected>Open this select Timezone</option>
                            <option value="1">Asia/Singapure</option>
                            <option value="2">Asia/Indonesia</option>
                          </select>
                    </div> --}}

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