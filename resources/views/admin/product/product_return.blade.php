@extends('admin.admin-master')
@section('product_return') active @endsection
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Admin</a>
      <span class="breadcrumb-item active">Products Return</span>
    </nav>


<script type="text/javascript">
  $(document).ready(function () {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        // $(this).html('<select><option value="{!! date('D, d, M, Y', strtotime($date)) !!}">{!! date('D, d, M, Y', strtotime($date)) !!}</option><option value="">All</option><option></select>');
    });
 
    // DataTable
    var table = $('#example').DataTable({
        initComplete: function () {
            // Apply the search
            this.api()
                .columns()
                .every(function () {
                    var that = this;
 
                    $('input', this.footer()).on('keyup change clear', function () {
                        if (that.search() !== this.value) {
                            that.search(this.value).draw();
                        }
                    });
                });
        },
    });
});
</script>
<style type="text/css">
   tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
        /*display: table-header-group;*/
    }
</style>

<div class="sl-pagebody">
      <div class="row row-sm">
        <div class="col-md-12">


<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Products Return</h6>    
    <div class="table-wrapper">
    <table id="example" class="display" style="width:100%">
    	 
        <thead>
            <tr>
                <th>Invoice</th>
                <th>Shop name</th>                
                <th>Product code </th>
                <th>Product</th>
                <th>Qty</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
        	 @foreach ($ReturnProdict as $products)
            <tr>
                <td>{{$products->invoice}}</td>
                <td>{{$products->shop_name}}</td>               
                <td>{{$products->product_code}}</td>
                <td>{{$products->product}}</td>
                <td>{{$products->qty}}</td>
                <td>{!! date('D, d, M, Y', strtotime( $products->created_at)) !!}</td>
            </tr>
             @endforeach
            
            
        </tbody>
        <tfoot>
            <tr>
                <th>Invoice</th>
                <th>Shop name</th>                
                <th>Product code </th>
                <th>Product</th>
                <th>Qty</th>
                <th>Date</th>
            </tr>
        </tfoot>
    </table>
</div>
</div>
</div>
</div>
</div>











 </div>
 
 @endsection   