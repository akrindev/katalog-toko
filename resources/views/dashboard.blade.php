@extends('layouts.tabler')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    iam lgin
                    {{ auth()->user()->email }}
                </div>
            </div>
        </div>
    </div>
@endsection
