@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="pb-2">
                    <a href="{{ route('lab.create') }}">Create New Lab</a>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div>
                            Lab Dashboard
                        </div>
                        <!-- Form for the filter -->
                        <div class="row">

                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="pt-2">
                            @foreach($labs as $lab)
                                <div class="row pb-2">
                                    <div class="col-md-3">
                                        <a href={{ route('lab.show', $lab->id) }}>{{ $lab->name }}</a>
                                    </div>
                                    <div class="col-md-3">
                                        {{ $lab->dateAdded }}
                                    </div>
                                    <div class="col-md-3">
                                        {{ $lab->location }}
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
