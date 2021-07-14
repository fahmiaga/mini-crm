@extends('Admin.layout')

@section('title',__('companies page'))
    
@section('content')
<!-- Content Wrapper. Contains page content -->

    

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">{{__('companies page')}}</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form action="{{ route('import_company')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row" style="margin-bottom:5px">
              <div class="col-md-2">
                <a href="{{url('companies/create')}}" class="btn btn-primary mb-2" style="margin-bottom: 10px">{{__('add company')}}</a>
              </div>
              <div class="col-md-2">
                <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                  <div class="custom-file text-left">
                      <input type="file" name="file" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                </div>
                <button class="btn btn-primary">Import data</button>
                <a href="{{route('export-company')}}" class="btn btn-success">Export Data</a>
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
                      <input type="text" id="filter-company" name="name" placeholder="Company Name...">
                      <input type="text" id="filter-email" name="email" placeholder="Email...">
                      <input type="text" id="filter-website" name="website" placeholder="Website...">
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
          <table class="table table-striped" id="table2">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">{{__('name')}}</th>
                <th scope="col">{{__('email')}}</th>
                <th scope="col">{{__('logo')}}</th>
                <th scope="col">{{__('website')}}</th>
                <th scope="col">{{__('action')}}</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              @foreach ($companies as $data)    
                <tr>
                  <th scope="row">{{$no++}}</th>
                  <td>{{$data->name}}</td>
                  <td>{{$data->email}}</td>
                  <td><img src="{{url('logo/'.$data->logo)}}" alt="" width="80px" height="80px"></td>
                  <td>{{$data->website}}</td>
                  <td>
                    <a href="{{url('companies/'.$data->id.'/edit')}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                   
                      <button type="submit" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-danger{{$data->id}}"><i class="fas fa-trash"></i></button>
                   
                  </td>
                </tr>
              @endforeach
              
            </tbody>
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
@foreach ($companies as $data)
    
  <div class="modal modal-danger fade" id="modal-danger{{$data->id}}">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">{{__('Delete')}} {{$data->name}} </h4>
        </div>
        <div class="modal-body">
          <p>{{__('Are You Sure')}}?&hellip;</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">{{__('No')}}</button>

            <form action="{{url('companies/'.$data->id)}}" method="POST">
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
  <!-- /.modal -->
@endforeach

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.25/pagination/input.js"></script>
<script>
  $(document).ready(function() {
    
   var table =  $('#table2').DataTable({
     responsive : true,
     pagingType: "input",
   });
     // filter Company
     $('#filter-company').keyup(function (){
              var keyword = $('#filter-company').val();
              table.columns(1)
              .search(keyword)
              .draw();
            });
     // filter Email
     $('#filter-email').keyup(function (){
              var keyword = $('#filter-email').val();
              table.columns(2)
              .search(keyword)
              .draw();
            });
     // filter Company
     $('#filter-website').keyup(function (){
              var keyword = $('#filter-website').val();
              table.columns(4)
              .search(keyword)
              .draw();
            });
} );
</script>
@endpush
    </section>
    <!-- /.content -->

    
@endsection