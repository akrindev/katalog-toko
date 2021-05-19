@extends('layouts.tabler')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body">
                iam lgin
                {{ auth()->user()->email }}
            </div>
        </div>
    </div>
@endsection
