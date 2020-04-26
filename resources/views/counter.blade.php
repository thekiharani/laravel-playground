@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ _('Laravel Counter') }}</div>

                <div class="card-body">
                    <h2>Vue Example</h2>
                    <counter></counter>

                    <hr>

                    <h2>Livewire Example</h2>
                    @livewire('counter')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
