@extends('layout.main')
@section('content')
<div class="page-heading">
    <h3>Dashboard</h3>
</div> 
<div class="page-content"> 
    <section class="row">
        <div class="col-12 col-lg-9">
            <h1>Hello {{ $data->name }}!</h1>
        </div>
    </section>
</div>
@endsection