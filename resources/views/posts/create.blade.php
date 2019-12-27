@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Create Post</div>

                <div class="card-body">
                    <form action="#" method="post">
                        @csrf
                        @include('partials.channels.dropdown', ['field' => 'aria_channel'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
