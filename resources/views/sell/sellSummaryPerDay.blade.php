@extends('Admin.layout')

@section('title',__('Sell Summaries Per Day Page'))
    
@section('content')
<!-- Content Wrapper. Contains page content -->

    

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">{{__('Sell Summaries Per Day Page')}}</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form action="{{url('detail-summary-per-day')}}" method="POST">
            @csrf
              <div class="row">
                  <div class="col-md-3"> 
                      <div class="form-group">
                        <label for="">From Date</label>
                        <input type="date" class="form-control" placeholder="From..." id="min" name="min">
                      </div>
                      <div class="form-group">
                        <label for="">To Date</label>
                        <input type="date" class="form-control" placeholder="To..." id="max" name="max">
                      </div>
                    </div>
                    <div class="col-md-3">
                        <label for="">Company</label>
                        <select name="company" id="" class="form-control">
                                <option value="">Select Company</option>
                            @foreach ($company as $data)
                                <option value="{{$data->name}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">Employee</label>
                        <input type="text" class="form-control" placeholder="Employee..." name="employee" autocomplete="off">
                    </div>
                  </div>
                  <button class="btn btn-primary">Submit</button>
            </form>
          </div>
          

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
                <th scope="col">{{__('Employee')}}</th>
                <th scope="col">{{__('Company')}}</th>
                <th scope="col">{{__('Date')}}</th>
                {{-- <th scope="col">{{__('translate.action')}}</th> --}}
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              @foreach ($sells as $data)    
                <tr>
                  <th scope="row">{{$no++}}</th>
                  <td>{{$data->first_name}} {{$data->last_name}}</td>
                  <td>{{$data->name}}</td>
                  <td>{{$data->date}}</td>
                  {{-- <td>
                      <a href="/detail-summary-per-day/{{$data->date}}" class="btn btn-sm btn-info"><i class="fas fa-info"></i></a>
                  </td> --}}
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
        

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.25/pagination/input.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.1.0/js/dataTables.dateTime.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

    <script>
        // var minDate, maxDate;
        
        // // Custom filtering function which will search data in column four between two values
        // $.fn.dataTable.ext.search.push(
        //     function( settings, data, dataIndex ) {
        //         var min = minDate.val();
        //         var max = maxDate.val();
        //         var date = new Date( data[4] );
        
        //         if (
        //             ( min === null && max === null ) ||
        //             ( min === null && date <= max ) ||
        //             ( min <= date   && max === null ) ||
        //             ( min <= date   && date <= max )
        //         ) {
        //             return true;
        //         }
        //         return false;
        //     }
        // );
        
        // $(document).ready(function() {
        //     // Create date inputs
        //     minDate = new DateTime($('#min'), {
        //         format: 'MMMM Do YYYY'
        //     });
        //     maxDate = new DateTime($('#max'), {
        //         format: 'MMMM Do YYYY'
        //     });
        
            // DataTables initialisation
            var table = $('#table2').DataTable();
        
        //     // Refilter the table
        //     $('#min, #max').on('change', function () {
        //         table.draw();
        //     });
        // });
    </script>
@endpush
    </section>
    <!-- /.content -->

    
@endsection