<title>{{ucfirst($title)}} - {{ucfirst(config('app.name'))}}</title>
@php
use Carbon\Carbon;
@endphp
<link rel="icon" href="assets/img/favicon.png" type="image/x-icon">
<section class="content" >
<div class="container-fluid" style="padding-top: 2px">
<div class="row">
<div class="col-12" style="font-family:'Times New Roman', Times, serif; font-size:17px;">
<center>
<table cellspacing="5">
<thead style="font-size:13px;">
<span style="font-family:'Times New Roman', Times, serif; font-size:23px;" >
<u>
<a href="{{ route('booking')}}">
<img src="{{asset('app_assets/assets/logo/logo.jpg')}}" alt="logo.jpg" style="width: 100px;height: 100px">
</a>
</u>
</span>
<br>
<span style="font-size: 30px; font-weight: bolder">{{ $hotel_details->name }}</span><br/>
<b>Contact: {{ $hotel_details->phone_number }}</b><br>
<b>Website: {{ $hotel_details->url }}</b><br>
<b>Email Address: {{ $hotel_details->email }}</b><br>
<div style="border-bottom:2px solid #000; width:100%;"></div>
</thead>
</table>
</center>
</div>
</div>
<div class="row">
<div class="col-lg-12 col-md-12" style="padding: 10px 20px 0px 20px">
<p><span><b>Receipt Code</b> : {{ $printing_paid_data->code }}</span></p>
{{-- <p><span><b>Branch</b> : {{'01092'}}</span></p> --}}
<p><span><b>Printed By</b> : {{ session('user_name') }}</span></p>
<p><span><b>Date</b> : {{ Carbon::parse(now())->format('d-M-Y') }}</span></p>
<p><span><b>Customer</b> : {{ $printing_data->name }}</span></p>
<table id="simpletable" class="table table-striped table-bordered nowrap" style="border: 1px solid black">
<thead style="border: 1px solid black">
<tr style="border: 1px solid black;width:500px; height: 30px; text-align: left;">
<th style="border: 1px solid black;width:700px; height: 30px; text-align: left;padding-left: 10px;"><em>Description</em></th>
<th style="border: 1px solid black;width:500px; height: 30px; text-align: center;"><em>Rate (GH¢)</em></th>
<th style="border: 1px solid black;width:300px; height: 30px; text-align: right;padding-right: 10px;"><em>Duration (Days)</em></th>
<th style="border: 1px solid black;width:300px; height: 30px; text-align: right;padding-right: 10px;"><em>Total(GH¢)</em></th>
</tr>
</thead>
<tbody style="border: 1px solid black">
<tr style="border: 1px solid black">
<td style="border: 1px solid black;width:700px;height: 30px;padding-left: 10px">{{ $printing_paid_data->description }}</td>
<td style="border: 1px solid black;width:500px;text-align: center;height: 30px">{{ $printing_data->fees }}</td>
<td style="border: 1px solid black;width:300px;text-align: right;height: 30px;padding-right: 10px">{{ ($printing_paid_data->amount)/($printing_data->fees) }}</td>
<td style="border: 1px solid black;width:300px;text-align: right;height: 30px;padding-right: 10px">{{ $printing_paid_data->amount }}</td>
</tr>
</tbody>
</table>
<br><div style="border-bottom:2px dashed; #000; width:100%;"></div><br>
<table id="simpletable" class="table table-striped table-bordered nowrap">
<thead style="border: 1px solid black">
<tr>
<th style="width:500px;"><em></em></th>
<th style="width:500px;text-align: right;">Sub Total</th>
<th style="width:500px; text-align: right;">{{ number_format($printing_paid_data->amount,2) }}</th>
</tr>
</thead>
<tbody style="border: 1px solid black">
<tr>
<td style="width:500px;"></td>
@php
$discounted = 0.00;
$tax = 0.00;
$final_total = $printing_paid_data->amount + $discounted + $tax;
@endphp
<td style="width:500px;text-align: right;"><b>Discount</b></td>
<td style="width:500px;text-align: right;"><b>{{ number_format($discounted,2) }}</b></td>
</tr>
<tr>
<td style="width:500px;"></td>
<td style="width:500px;text-align: right;"><b>Tax</b></td>
<td style="width:500px;text-align: right;"><b>{{ number_format($tax,2) }}</b></td>
</tr>
<tr>
<td style="width:500px;"></td>
<td style="width:500px;text-align: right;"><b>Receipt Total</b></td>
<td style="width:500px;text-align: right;"><b>{{ number_format($final_total,2) }}</b></td>
</tr>
</tbody>
</table>
<br><div style="border-bottom:2px dashed; #000; width:100%;"></div><br>
{{-- <table id="simpletable" class="table table-striped table-bordered nowrap">
<thead style="border: 1px solid black">
<tr>
<th style="width:500px;"><em></em></th>
<th style="width:500px;text-align: right;">Tendered</th>
<th style="width:500px; text-align: right;">{{'01092'}}</th>
</tr>
</thead>
<tbody style="border: 1px solid black">
<tr>
<td style="width:500px;"></td>
<td style="width:500px;text-align: right;"><b>Change</b></td>
<td style="width:500px;text-align: right;"><b>{{'01092'}}</b></td>
</tr>
</tbody>
</table> --}}
</div>
</div>
<center><b>______________________________________________________________________</b></center>
<div class="row" style="padding-top: 5px">
<div class="col-lg-4 offset-8 col-md-4 offset-8">
<center><p><b><i>Thank you! Please come again</i></b></p></center>
<center><p><b><i>Contact : 0248383212 For Software Products</i></b></p></center>
</div>
</div>
</div>
</section>
<script type="text/javascript">
window.print();
</script>
