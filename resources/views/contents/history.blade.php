@extends('layout.layout')

@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4>Trading History</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Buyer/Seller ID</th>
                            <th class="text-center">Buyer/Seller Name</th>
                            <th class="text-center">Transaction Type</th>
                            <th class="text-center">Crypto Currency</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Base Currency</th>
                            <th class="text-center">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < $histories->count(); $i++)
                            <tr>
                                <td class="text-center">{{ $histories[$i]->associated_id }}</td>
                                <td class="text-center">{{ $associatedName[$i] }}</td>
                                <td class="text-center">{{ $histories[$i]->type }}</td>
                                <td class="text-center">{{ $histories[$i]->currency_crypto }}</td>
                                <td class="text-center">{{ $histories[$i]->quantity }}</td>
                                <td class="text-center">{{ $histories[$i]->currency_fiat }}</td>
                                <td class="text-center">{{ $histories[$i]->price }}</td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
