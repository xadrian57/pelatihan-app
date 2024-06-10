@extends('layout.main')
@section('content')
<div class="page-heading">
    <h3>Edit Data</h3>
</div> 
<div class="page-content"> 
    <section class="row">
        <div class="col-12 col-lg-12">
            <a href="{{ route('books.index') }}" class="btn btn-primary col-2 my-2">Back</a>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Data Book</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('books.update', $data->id) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 my-2">
                            <label for="title">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title"
                                value="{{ old('title') ?? $data->title }}" name="title" required>
                            @error('title') 
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-6 my-2">
                            <label for="author">Author</label>
                            <input type="text" class="form-control @error('author') is-invalid @enderror" id="author"
                                placeholder="Author" value="{{ old('author') ?? $data->author }}" name="author" required>
                            @error('author') 
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-6 my-2">
                            <label for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3">{{ old('description') ?? $data->description }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-6 my-2">
                            <label for="description">Publisher</label>
                            <input type="text" class="form-control @error('publisher') is-invalid @enderror" id="publisher" name="publisher"
                                placeholder="publisher" value="{{ old('publisher') ?? $data->publisher }}" required>
                            @error('publisher') 
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-6 my-2">
                            <label for="year">Year</label>
                            <input type="text" class="form-control @error('year') is-invalid @enderror" id="year"
                                placeholder="Year" value="{{ old('year') ?? $data->year }}" name="year" required>
                            @error('year') 
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