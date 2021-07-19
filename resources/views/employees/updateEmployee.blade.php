@extends('Admin.layout')

@section('title',__('Update Employee Page'))
    
@section('content')
<!-- Content Wrapper. Contains page content -->

    

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">{{__('Add Employee Page')}}</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
              
        <div class="container">
            <div class="row">
                <form action="{{url('employees/'.$employee->id)}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">{{__('First Name')}}</label>
                        <input type="text" name="first_name" class="form-control" placeholder="{{__('First Name')}}..." @error('first_name') is-invalid @enderror value="{{$employee->first_name}}">
                        <div class="text-danger">
                            @error('first_name')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">{{__('Last Name')}}</label>
                        <input type="text" name="last_name" class="form-control" placeholder="{{__('Last Name')}}..."  @error('last_name') is-invalid @enderror value="{{$employee->last_name}}">
                        <div class="text-danger">
                            @error('last_name')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
        
                    <div class="form-group">
                        <label for="">{{__('Company')}}</label>
                        <select class="form-control" name="company" aria-label="Default select example">
                            {{-- <option selected>Open this select menu</option> --}}
                            @foreach ($companies as $data)
                                 <option value={{$data->id}} {{($employee->company == $data->id ? "selected" : "")}} >{{$data->name}}</option>
                            @endforeach
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="email..."  @error('email') is-invalid @enderror value="{{$employee->email}}">
                        <div class="text-danger">
                            @error('email')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">{{__('Phone')}}</label>
                        <input type="text" name="phone" class="form-control" placeholder="{{__('Phone')}}..."  @error('phone') is-invalid @enderror value="{{$employee->phone}}">
                        <div class="text-danger">
                            @error('phone')
                                {{$message}}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </div>
                
                </form>
                <div class="col-md-6">
                    <form action="{{url('change-password/'.$employee->id)}}" method="POST">
                        @csrf
                        {{-- <input type="hidden" name="_method" value="PATCH"> --}}
                        @if (session('message'))
                            <div class="alert alert-success alert-dismissible mt-1">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                            {{session('message')}}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" name="password" class="form-control" placeholder="Password..."  @error('password') is-invalid @enderror >
                            <div class="text-danger">
                                @error('password')
                                    {{$message}}
                                @enderror
                            </div>
                            <button class="btn btn-primary" style="margin-top: 5px">Change Password</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
        

          
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