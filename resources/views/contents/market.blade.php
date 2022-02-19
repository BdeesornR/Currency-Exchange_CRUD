@extends('..layout.layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Trading Board</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($shops as $shop)
                            <div class="row">
                                <div class="col-2">
                                    <div>Username</div>
                                </div>
                                <div class="col-2">
                                    <div>{{ $shop->price." ".$shop->currency_consumer }}</div>
                                </div>
                                <div class="col-2">
                                    <div>{{ $shop->quatity." ".$shop->currency_issuer }}</div>
                                </div>
                                <button>{{ $shop->type }}</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- @push('scripts')
    <script src="" />
@endpush --}}
