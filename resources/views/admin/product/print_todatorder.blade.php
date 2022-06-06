<script src="{{ asset('rokon/jquery.printPage.js') }}"></script>

<center>
<h2>Todays Products List For Distribution</h2>
<h4>Jim Electric & Hardware<br>Mirbag,Kaunia,Rangpur</h4>
<table class=" " >
<tr><th>Product code&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;</th><th>Product&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;</th><th>&#160;&#160;&#160;&#160;&#160;Quantity</th></tr>
@foreach($all_order as $order)
<tr>
<td>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;{{ $order->product_code }}</td>
<td>{{ $order->product }}&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;</td>
<td>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;{{ $order->total_qty }}</td>
</tr>
@endforeach
</center>
