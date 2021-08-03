@extends('Admin.layout')

@section('title',__('Add Sell Page'))
    
@section('content')
<!-- Content Wrapper. Contains page content -->

    

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">{{__('Add Sell Page')}}</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
         
         <form action="{{url('sells')}}" method="POST" >
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">{{__('Item')}}</label>
                        <select class="form-control" name="item"            aria-label="Default select example" id="selected_price">
                            <option selected>Open this select menu</option>
                            @foreach ($items as $data)
                                 <option value={{$data->id}} data-price ="{{$data->price}}" id="price_value">{{$data->name}}</option>
                            @endforeach
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="">{{__('Price')}}</label>
                        <input type="text" id="price_item" name="price" class="form-control" placeholder="{{__('price')}}..."  @error('price') is-invalid @enderror readonly>
                        <div class="text-danger">
                            @error('price')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">{{__('Discount')}}</label>
                        <input type="text" name="discount" class="form-control" placeholder="{{__('discount')}}..."  @error('discount') is-invalid @enderror value="{{old('discount')}}">
                        <div class="text-danger">
                            @error('discount')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">{{__('Employee')}}</label>
                        <select class="form-control" name="employee" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            @foreach ($employees as $data)
                                 <option value={{$data->id}}> {{$data->first_name}} {{$data->last_name}}</option>
                            @endforeach
                          </select>
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
        
        @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
        <script src="//cdn.datatables.net/plug-ins/1.10.25/pagination/input.js"></script>
        @endpush

        <script type="text/javascript">
                const price_value = document.getElementById("selected_price");
                price_value.onchange = function(e){
                    const price = e.target.options[e.target.selectedIndex].dataset.price;
                    console.log(price);
                    document.getElementById("price_item").value = price
                }
        </script>
    </section>
    <!-- /.content -->
    
@endsection