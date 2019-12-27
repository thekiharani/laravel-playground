@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Channels</div>

                <div class="card-body">
                    @include('partials.channels.list')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
