<section>
<div class="modal fade" id="GymClientsModal" tabindex="-1" aria-labelledby="cusModalLabel"
aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="cusModalLabel"> Gym Registered Members </h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div class="table-responsive">
<table id="customButtons2" class="table m-0 align-middle">
<thead>
<tr>
<th>#</th>
<th>Client</th>
<th>Phone Number</th>
<th>Category</th>
<th align="right">Payments This Year</th>
</tr>
</thead>
<tbody>
@php
$num=1;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
@endphp
@foreach ($GymCustomers as $gymx_cus)
<tr>
<td>{{ $num }}</td>
<td>{{ $gymx_cus->name }}</td>
<td>{{ $gymx_cus->phone_number }}</td>
<td>{{ $gymx_cus->mem_description }}</td>
<td align="right">{{ $gymx_cus->total_payments ?? 0 }}</td>
</tr>
@php
$num++;
@endphp
@endforeach
</tbody>
</table>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
Cancel
</button>
</div>
</div>
</div>
</div>
</section>


<form action="{{ route('save.gym.customers') }}" method="post">
@csrf
@method('POST')


</form>
