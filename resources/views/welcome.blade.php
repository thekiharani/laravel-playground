@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ config('app.name') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, doloribus, vel! Corporis culpa odio officiis pariatur ut? Cumque dicta esse inventore natus nihil, odio quia totam voluptas. Commodi, nam, veniam?</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
