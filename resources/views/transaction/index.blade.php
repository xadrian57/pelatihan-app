@extends('layout.main')
@section('content')
<div class="page-heading">
    <h3>Data Borrowed</h3>
</div> 
<div class="page-content"> 
    <section class="row">
        <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Borrowed</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <a href="{{ route('borrow') }}" class="btn btn-primary">Borrow</a>
                            </div>
                            <!-- table bordered -->
                            <div class="table-responsive">
                                <table class="table table-bordered mb-3 mx-2">
                                    <form action="{{ route('transactions') }}" method="get">
                                        <div class="input-group col-6 my-3">
                                            <input type="text" class="form-control" name="search" value="{{ old('search') }}" placeholder="Cari..." aria-label="Search">
                                            <button type="submit" class="btn btn-outline-secondary">Cari</button>
                                        </div>
                                    </form>
                                    <thead>
                                        <tr>
                                            <th>name</th>
                                            <th>email</th>
                                            <th>Title</th>
                                            <th>borrow Date</th>
                                            <th>return Date</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaction as $transactions)
                                        <tr>
                                            <td class="text-bold-500">{{ $transactions->user->name }}</td>
                                            <td>{{ $transactions->user->email }}</td>
                                            <td>{{ $transactions->book->title }}</td>
                                            <td>{{ $transactions->borrow_at }}</td>
                                            <td>{{ $transactions->return_at }}</td>
                                            <td>
                                                <form action="{{ route('return.post', $transactions->id) }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $transactions->id }}">
                                                    <button type="submit" class="btn btn-primary">Return</button>
                                                </form>
                                                
                                            </td>
                                        @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                                {{ $transaction->links() }}
                            </div>
                        </div>
                    </div>
        </div>
    </section>
</div>
@endsection