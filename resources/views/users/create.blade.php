@extends('layout.main')
@section('content')
<div class="page-heading">
    <h3>Add Data Member</h3>
</div> 
<div class="page-content"> 
    <section class="row">
        <div class="col-12 col-lg-12">
            <a href="{{ route('users.index') }}" class="btn btn-primary col-2 my-2">Back</a>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add New Data Users</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 my-2">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name"
                                value="{{ old('name') }}" name="name" required>
                            @error('name') 
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-6 my-2">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                placeholder="email" value="{{ old('email') }}" name="email" required>
                            @error('email') 
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-6 my-2">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                                placeholder="password" name="password" required>
                            @error('password') 
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 my-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection