@extends('layout.main')
@section('content')
<div class="page-heading">
    <h3>Data Member</h3>
</div> 
<div class="page-content"> 
    <section class="row">
        <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Member</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <a href="{{ route('users.create') }}" class="btn btn-primary">Add Data</a>
                            </div>
                            <!-- table bordered -->
                            <div class="table-responsive">
                                <table class="table table-bordered mb-3 mx-2">
                                    <form action="{{ route('users.index') }}" method="get">
                                        <div class="input-group col-6 my-3">
                                            <input type="text" class="form-control" name="search" value="{{ old('search') }}" placeholder="Cari..." aria-label="Search">
                                            <button type="submit" class="btn btn-outline-secondary">Cari</button>
                                        </div>
                                    </form>
                                    <thead>
                                        <tr>
                                            <th>name</th>
                                            <th>email</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $datas)
                                        <tr>
                                            <td class="text-bold-500">{{ $datas->name }}</td>
                                            <td>{{ $datas->email }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('users.edit', $datas->id) }}" class="btn btn-info">Edit</a>
                                                    <a href="{{ route('users.destroy', $datas->id) }}" class="btn btn-danger mx-2" data-confirm-delete="true">Delete</a>
                                                </div>
                                            </td>
                                        @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                                {{ $data->links() }}
                            </div>
                        </div>
                    </div>
        </div>
    </section>
</div>
@endsection