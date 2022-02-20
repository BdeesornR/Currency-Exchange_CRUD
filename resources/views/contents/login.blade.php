@extends('layout.layout')

@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4>Login</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-1">
                            <label class="form-label" for="loginEmail">Email</label>
                        </div>
                        <div class="col-3">
                            <input type="email" class="form-control" id="loginEmail" name="loginEmail" placeholder="name@example.com" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <label class="form-label" for="loginPassword">Password</label>
                        </div>
                        <div class="col-3">
                            <input type="password" class="form-control" id="loginPassword" name="loginPassword" placeholder="password" />
                        </div>
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
