@extends('Admin.layout')

@section('title', __('Add Item Page'))

@section('content')
    <!-- Content Wrapper. Contains page content -->



    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Add Item Page') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">

                <form action="{{ url('sells/' . $model->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">{{ __('Item') }}</label>
                                    <select class="form-control" name="item" aria-label="Default select example">
                                        @foreach ($items as $data)
                                            <option value={{ $data->id }}
                                                {{ $data->id == $model->item ? 'selected' : '' }}>{{ $data->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('Price') }}</label>
                                    <input type="text" name="price" class="form-control"
                                        placeholder="{{ __('price') }}..." @error('price') is-invalid @enderror
                                        value="{{ $model->price }}">
                                    <div class="text-danger">
                                        @error('price')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('Discount') }}</label>
                                    <input type="text" name="discount" class="form-control"
                                        placeholder="{{ __('discount') }}..." @error('discount') is-invalid @enderror
                                        value="{{ $model->discount }}">
                                    <div class="text-danger">
                                        @error('discount')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('Employee') }}</label>
                                    <select class="form-control" name="employee" aria-label="Default select example">
                                        @foreach ($employees as $data)
                                            <option value={{ $data->id }}
                                                {{ $data->id == $model->employee ? 'selected' : '' }}>
                                                {{ $data->first_name }} {{ $data->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary">{{ __('Submit') }}</button>
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
