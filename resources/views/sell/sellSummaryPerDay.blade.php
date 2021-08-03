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
          {{-- <form action="{{ route('import_company')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row" style="margin-bottom:5px">
              <div class="col-md-2">
                <a href="{{url('sells/create')}}" class="btn btn-primary mb-2" style="margin-bottom: 10px">{{__('Add Sell')}}</a>
              </div>
              
            </form> --}}
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
                <th scope="col">{{__('Date')}}</th>
                <th scope="col">{{__('translate.action')}}</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              @foreach ($sells as $data)    
                <tr>
                  <th scope="row">{{$no++}}</th>
                  <td>{{$data->date}}</td>
                  <td>
                      <a href="/detail-summary-per-day/{{$data->date}}" class="btn btn-sm btn-info"><i class="fas fa-info"></i></a>
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
{{-- @foreach ($sells as $data)
    
  <div class="modal modal-info fade" id="modal-info{{$data->id}}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">{{__('Sell Info')}} {{$data->name}} </h4>
        </div>
        <div class="modal-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">{{__('Employee')}}</th>
                        <th scope="col">{{__('Date')}}</th>
                        <th scope="col">{{__('Created Date')}}</th>
                        <th scope="col">{{__('Last Update')}}</th>
                        <th scope="col">{{__('Total Price')}}</th>
                        <th scope="col">{{__('Discount Total')}}</th>
                        <th scope="col">{{__('Total')}}</th>
                    </tr>
                  </thead>
                  <tbody>  
                      <tr>
                        <td>{{$data->first_name}} {{$data->last_name}}</td>
                        <td>{{$data->date}}</td>
                        <td>{{$data->created_date}}</td>
                        <td>{{$data->last_update}}</td>
                        <td>Rp. <?php echo number_format($data->price_total , 0, ',', '.') ?></td>
                        <td>Rp. <?php echo number_format($data->discount_total , 0, ',', '.') ?></td>
                        <td>Rp. <?php echo number_format($data->total , 0, ',', '.') ?></td>
                      </tr>                 
                  </tbody>
              </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">{{__('Close')}}</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endforeach --}}

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
     // filter Date
     $('#filter-date').on('change',function(){
      var keyword = $('#filter-date').val();
       table.columns(5)
       .search(keyword)
       .draw();
     })
    // filter Company
      // $('#filter-timezone').change(function (){
      //         var keyword = $('#filter-timezone').val();
      //         table.columns(5)
      //         .search(keyword)
      //         .draw();
      //       });
} );
</script>
@endpush
    </section>
    <!-- /.content -->

    
@endsection