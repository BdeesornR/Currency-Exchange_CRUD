@extends('layout.layout')

@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4>Trading Board</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center align-middle">Advertisers</th>
                            <th class="text-center align-middle">Currency</th>
                            <th class="text-center align-middle">Type</th>
                            <th class="text-center align-middle">Price</th>
                            <th class="text-center align-middle">Available</th>
                            <th class="text-center align-middle">Trade</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shops as $shop)
                            <div style="display: none">{{ $index = $loop->index }}</div>
                            <tr>
                                <td class="text-center align-middle">{{ $issuerData[$index]['name'] }}</td>
                                <td class="text-center align-middle text-uppercase">{{ $shop->currency_crypto }}</td>
                                <td class="text-center align-middle">{{ $shop->type }}</td>
                                <td class="text-center align-middle text-uppercase">{{ $shop->currency_fiat." ".$shop->price }}</td>
                                <td class="text-center align-middle">{{ $issuerData[$index]['quantity'] }}</td>
                                <td class="text-center align-middle">
                                    <button 
                                        type="button" 
                                        class="btn btn-primary" 
                                        id="tradeBtn"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#tradeModal" 
                                        data-shopId="{{ $shop->id }}"
                                        data-currencyFiat="{{ $shop->currency_fiat }}"
                                        data-availableFiat="{{ min($consumerData[$index]['quantityFiat'], $issuerData[$index]['quantityFiat']) }}"
                                    >Trade</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection

@push('scripts')
    <script src="{{ mix('js/market.js') }}" type="application/javascript"></script>
@endpush
