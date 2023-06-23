@extends('layout.master')
@section('title','Login')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">System Login
                        <a href="/" style="float: right" class="btn btn-info">View Product List</a>
                    </div>
                    <div class="card-body">
                        @if (Session::has('error'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('error') }}
                            </div>
                        @endif
                        @if (Session::has('register'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('register') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('login.submit') }}">
                            @csrf
                            <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="email" class="form-control" id="email" name="email">
                              @error('email')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="password">Password</label>
                              <input type="password" class="form-control" id="password" name="password">
                              @error('password')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                            <a href="/register" class="btn btn-success">Signup</a>
                            <button style="float: right" type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                    <div class="card-footer">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection