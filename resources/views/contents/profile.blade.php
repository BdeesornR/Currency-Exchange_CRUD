@extends('..layout.layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>User Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-1">
                                <div>Username</div>
                            </div>
                            <div class="col-3">
                                <div></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1">
                                <div>Email</div>
                            </div>
                            <div class="col-3">
                                <div></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <div>Fiat Balance</div>
                            </div>
                            <div class="col-1">
                                <div>USD</div>
                            </div>
                            <div class="col-2">
                                <div></div>
                            </div>
                            <div class="col-1">
                                <div>THB</div>
                            </div>
                            <div class="col-2">
                                <div></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <div>Cryto Balance</div>
                            </div>
                            <div class="col-1">
                                <div>BTC</div>
                            </div>
                            <div class="col-2">
                                <div></div>
                            </div>
                            <div class="col-1">
                                <div>ETH</div>
                            </div>
                            <div class="col-2">
                                <div></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-1">
                                <div>XRP</div>
                            </div>
                            <div class="col-2">
                                <div></div>
                            </div>
                            <div class="col-1">
                                <div>DOGE</div>
                            </div>
                            <div class="col-2">
                                <div></div>
                            </div>
                        </div>
                        <a class="btn btn-outline-secondary" href="{{ route("show-history") }}"> Trade History</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection