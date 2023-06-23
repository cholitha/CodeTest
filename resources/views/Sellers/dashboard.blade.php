@extends('layout.sellermaster')
@section('title','Dashboard')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Inquiries</div>
                    <div class="card-body">

                        <table class="table">
                            <thead>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Customer Name</th>
                                <th>Problem Description</th>
                                <th>Mobile Number</th>
                                <th>Email</th>
                                <th>Ticket Status</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($tickets as $ticket)
                                    <tr @if ($ticket->ticket_status == 1)style="background-color: burlywood" @endif>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ticket->item_name }}</td>
                                        <td>{{ $ticket->customer }}</td>
                                        <td>{{ $ticket->problem_description }}</td>
                                        <td>{{ $ticket->mobile_number }}</td>
                                        <td>{{ $ticket->email }}</td>
                                        <td>{{ ($ticket->ticket_status == 1)?'Pending':'Attended'}}</td>
                                        <td><button id="resolveTicket" data-id="{{ $ticket->id }}">Resolve</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    
</script>
@endsection