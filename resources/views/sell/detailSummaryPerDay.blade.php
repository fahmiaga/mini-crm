@extends('Admin.layout')

@section('title',__('Items Page'))
    
@section('content')
<!-- Content Wrapper. Contains page content -->

    

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">{{__('translate.companies_page')}}</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
         
            <a href="{{url('sells-summary-per-day')}}" class="btn btn-primary mb-2" style="margin-bottom: 10px">{{__('Back')}}</a>
             {{-- <h4 style="font-weight: 700; text-align:center"> Employee's Name : {{$employee->first_name}} {{$employee->last_name}}</h4> --}}
              {{-- <div class="col-md-4">
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
                      <input type="text" id="filter-website" name="website" placeholder="Website..." style="margin-top: 5px">
                      <input type="date" id="filter-date" name="created_at" placeholder="Created At..." style="margin-top: 5px">
                      
                  </div>
                  </div>
                </div>
              </div> --}}

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
                {{-- <th scope="col">{{__('Employee')}}</th> --}}
                <th scope="col">{{__('Created Date')}}</th>
                <th scope="col">{{__('Last Update')}}</th>
                <th scope="col">{{__('Total Price')}}</th>
                <th scope="col">{{__('Total Discount')}}</th>
                <th scope="col">{{__('Total')}}</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; $total_price=0; $total_discount=0; $total=0;?>
              @foreach ($sells_summaries as $data)    
                <tr>
                  <th scope="row">{{$no++}}</th>
                  <td>{{$data->date}}</td>
                  {{-- <td>{{$data->first_name}} {{$data->last_name}}</td> --}}
                  <td>{{$data->created_date}}</td>
                  <td>{{$data->last_update}}</td>
                  <td>Rp. <?php echo number_format($data->price_total , 0, ',', '.') ?></td>
                  <td>Rp. <?php echo number_format($data->discount_total , 0, ',', '.') ?></td>
                  <td>Rp. <?php echo number_format($data->total , 0, ',', '.') ?></td>
                  <?php $total_price += $data->price_total ?>
                  <?php $total_discount += $data->discount_total ?>
                  <?php $total += $data->total ?>
                </tr>
              @endforeach
              <tr>
                <td colspan="4"> <b>Total</b></td>
                <td>Rp. <?php echo number_format($total_price , 0, ',', '.') ?></td>
                <td>Rp. <?php echo number_format($total_discount , 0, ',', '.') ?></td>
                <td>Rp. <?php echo number_format($total , 0, ',', '.') ?></td>
              </tr>
            </tbody>
          </table>
          {{-- Total Summaries --}}
    
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