@extends('..layout.layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Register</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('register')}}" method="POST">
                            <div class="row">
                                <div class="col-1">
                                    <label class="form-label" for="registerName">Username</label>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control" id="registerName" placeholder="username" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    <label class="form-label" for="registerEmail">Email</label>
                                </div>
                                <div class="col-3">
                                    <input type="email" class="form-control" id="registerEmail" placeholder="name@example.com" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    <label class="form-label" for="registerPassword">Password</label>
                                </div>
                                <div class="col-3">
                                    <input type="password" class="form-control" id="registerPassword" placeholder="password" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    <label class="form-label" for="registerPasswordConfirmtion">Confirm Password</label>
                                </div>
                                <div class="col-3">
                                    <input type="password" class="form-control" id="registerPasswordConfirmtion" placeholder="password" />
                                </div>
                            </div>
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection