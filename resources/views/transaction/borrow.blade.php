@extends('layout.main')
@section('content')
<div class="page-heading">
    <h3>Borrow Book</h3>
</div> 
<div class="page-content"> 
    <section class="row">
        <div class="col-12 col-lg-12">
            <a href="{{ route('transactions') }}" class="btn btn-primary col-2 my-2">Back</a>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Borrow Book</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('borrow.post') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 my-2">
                            <h6>email</h6>
                                    <div class="form-group">
                                        <select class="choices form-select" name="user_id">
                                                <option value="#">Select</option>
                                                @foreach ($user as $users)
                                                <option value="{{ $users->id }}">{{ $users->email }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                        </div>
                        <div class="col-sm-6 my-2">
                            <h6>Title</h6>
                                    <div class="form-group">
                                        <select class="choices form-select" name="book_id">
                                                <option value="#">Select</option>
                                                @foreach ($book as $books)
                                                <option value="{{ $books->id }}">{{ $books->title }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                        </div>
                        <div class="col-sm-12 my-3">
                            <button type="submit" class="btn btn-primary">Borrow</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection