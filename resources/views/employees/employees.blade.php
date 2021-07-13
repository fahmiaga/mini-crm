@extends('Admin.layout')
@section('title',__('employees page'))

@section('content')
<!-- Content Wrapper. Contains page content -->


    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">{{__('employees page')}}</h3>
    
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              
              <form action="{{ route('import-employee')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row" style="margin-bottom:5px ">
                  <div class="col-md-2">
                    <a href="{{url('employees/create')}}" class="btn btn-primary mb-2" style="margin-bottom: 10px">{{__('add employee')}}</a>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                      <div class="custom-file text-left">
                          <input type="file" name="file" class="custom-file-input" id="customFile">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                    </div>
                    <button class="btn btn-primary">Import data</button>
                    <a href="{{route('export-employee')}}" class="btn btn-success">Export Data</a>
                  </div>
                  <div class="col-md-8">
                    <p>
                      <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Filter Data
                      </a>
                    </p>
                    <div class="collapse" id="collapseExample">
                      <div class="card card-body">
                        <div class="form-group">
                          <input type="text" id="filter-name" name="first_name" placeholder="First Name...">
                          <input type="text" id="filter-last" name="last_name" placeholder="Last Name...">
                         <select name="company" id="filter-company">
                            <option value=""> Choose Company </option>
                            @foreach ($companies as $data)
                            <option value="{{$data->name}}"> {{$data->name}} </option>
                            @endforeach
                         </select>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>

              @if (session('message'))
              <div class="alert alert-success alert-dismissible mt-1">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
               {{session('message')}}
              </div>
              @endif
    
              {{-- table --}}
              <table class="table table-striped col-md-12" id="tabel1">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{__('First Name')}}</th>
                    <th scope="col">{{__('Last Name')}}</th>
                    <th scope="col">{{__('Company')}}</th>
                    <th scope="col">{{__('email')}}</th>
                    <th scope="col">{{__('Phone')}}</th>
                    <th scope="col">{{__('action')}}</th>
                  </tr>
                </thead>
                {{-- <tbody>
                  <?php $no = 1; ?>
                  @foreach ($employees as $data)    
                    <tr>
                      <th scope="row">{{$no++}}</th>
                      <td>{{$data->first_name}}</td>
                      <td>{{$data->last_name}}</td>
                      <td>{{$data->name}}</td>
                      <td>{{$data->email}}</td>
                      <td>{{$data->phone}}</td>
                      <td>
                        <a href="{{url('employees/'.$data->id.'/edit')}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                       
                          <button type="submit" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-danger{{$data->id}}"><i class="fas fa-trash"></i></button>
                       
                      </td>
                    </tr>
                  @endforeach
                  
                </tbody> --}}
              </table>
              
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              Footer
            </div>
            <!-- /.box-footer-->
          </div>
          <!-- /.box -->

<!-- /.modal -->
@foreach ($employees as $data)
    
  <div class="modal modal-danger fade" id="modal-danger{{$data->id}}">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">{{__('Delete')}} {{$data->first_name}} </h4>
        </div>
        <div class="modal-body">
          <p>{{__('Are You Sure')}}?&hellip;</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">{{__('No')}}</button>

            <form action="{{url('employees/'.$data->id)}}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-outline">{{__('Yes')}}</button>
            </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
@endforeach
<!-- /.modal -->

    </section>
    <!-- /.content -->

    @push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
   

    <script>
        $(document).ready(function(){
          // data1()
        // });
        // function data1(){
            var table =  $('#tabel1').DataTable({
            serverside : true,
            responsive : true,
            ajax:{
              url:"{{route('employees.index')}}"
              // data : function (d){
              //   d.first_name = $('#filter-name').val();
              // }
            },
            columns:[
              {
                  "data":null,"sortable":false,
                  render:function(data,type,row,meta){
                    return meta.row + meta.settings._iDisplayStart + 1
                  }
                },
                {data: 'first_name', name:'first_name'},
                {data: 'last_name', name:'last_name'},
                {data: 'name', name:'name'},
                {data: 'email', name:'email'},
                {data: 'phone', name:'phone'},
                {data: 'action', name:'action',orderable: false},
            ],
              order:[[0,'asc']],
              iDisplayLength :10,
              aLengthMenu : [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
              
          })

            // filter First Name
            $('#filter-name').keyup(function (){
              var keyword = $('#filter-name').val();
              table.columns(1)
              .search(keyword)
              .draw();
            });
            // filter Last Name
            $('#filter-last').keyup(function (){
              var keyword = $('#filter-last').val();
              console.log(keyword)
              table.columns(2)
              .search(keyword)
              .draw();
            });
            // filter Company
            $('#filter-company').change(function (){
              var keyword = $('#filter-company').val();
              table.columns(3)
              .search(keyword)
              .draw();
            });
            
          });
    </script>
     @endpush
@endsection