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
                            <th class="text-center">Advertisers</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Available</th>
                            <th class="text-center">Trade</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < $shops->count(); $i++)
                            <tr>
                                <td class="text-center">{{ $issuerData[$i]->issuerName }}</td>
                                <td class="text-center">{{ $shops[$i]->currency_fiat." ".$shops[$i]->price }}</td>
                                <td class="text-center">{{ $shops[$i]->currency_crypto." ".$issuerData[$i]->quantity }}</td>
                                <td class="text-center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Trade</button></td>
                                <div class="row">
                                    <div class="col">
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Trade</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="tradeForm" action="{{ route('trade', ['shopId' => $shops[$i]]) }}" method="POST">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <label class="col-4" for="tradeQuantity">Buy/Sell</label>
                                                                    <div class="col-2">{{ $shops[$i]->currency_crypto }}</div>
                                                                    <input class="col-6" type="number" id="tradeQuantity" name="tradeQuantity" max="{{ min($consumerData[$i]->quantity, $issuerData[$i]->quantity) }}" />
                                                                </div>
                                                                <div class="col-2">Available</div>
                                                                <div class="col-2">{{ $shop[$i]->currency_crypto." ".min($consumerData[$i]->quantity, $issuerData[$i]->quantity) }}</div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <button type="submit" form="tradeForm" class="btn btn-primary">Trade</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
