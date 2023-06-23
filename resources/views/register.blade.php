@extends('layout.master')
@section('title','Register')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">User Register</div>
                    <div class="card-body">
                        @if (Session::has('error'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('error') }}
                            </div>
                            {{-- <div class="alert alert-success" role="alert">{{ Session::get('Add_products') }}</div> --}}
                        @endif
                        <form method="POST" action="{{ route('register.submit') }}">
                            @csrf
                            <div class="form-group">
                              <label for="user_type">Type</label>
                              <select name="user_type" id="user_type" class="form-control">
                                <option value="2">Seller</option>
                              </select>
                              @error('user_type')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="name">Name</label>
                              <input type="name" class="form-control" id="name" name="name">
                              @error('name')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="email">Email address</label>
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
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection