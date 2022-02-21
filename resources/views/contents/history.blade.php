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
                            <th class="text-center align-middle">Buyer/Seller ID</th>
                            <th class="text-center align-middle">Buyer/Seller Name</th>
                            <th class="text-center align-middle">Transaction Type</th>
                            <th class="text-center align-middle">Crypto Currency</th>
                            <th class="text-center align-middle">Quantity</th>
                            <th class="text-center align-middle">Base Currency</th>
                            <th class="text-center align-middle">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < $histories->count(); $i++)
                            <tr>
                                <td class="text-center align-middle">{{ $histories[$i]->associated_id }}</td>
                                <td class="text-center align-middle">{{ $associatedName[$i] }}</td>
                                <td class="text-center align-middle">{{ $histories[$i]->type }}</td>
                                <td class="text-center align-middle text-uppercase">{{ $histories[$i]->currency_crypto }}</td>
                                <td class="text-center align-middle">{{ $histories[$i]->quantity }}</td>
                                <td class="text-center align-middle text-uppercase">{{ $histories[$i]->currency_fiat }}</td>
                                <td class="text-center align-middle">{{ $histories[$i]->price }}</td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
