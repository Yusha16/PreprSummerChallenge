@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div>
                            {{ $lab->name }} Details
                        </div>
                    </div>
                    <div class="card-body" style="height: 500px;">
                        <!-- Lab data details -->
                        <div class="row justify-content-center pt-2">
                            <div class="col-md-5">
                                <div class="row pb-2">
                                    Name: {{ $lab->name }}
                                </div>
                                <div class="row pb-2">
                                    Date Added: {{ $lab->dateAdded }}
                                </div>
                                <div class="row pb-2">
                                    Location: {{ $lab->location }}
                                </div>
                                <div class="row">
                                    <!-- Edit Button -->
                                    <form method="GET" action="{{ route('lab.edit', $lab->id) }}" class="col-md-3">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Edit') }}
                                            </button>
                                        </div>
                                    </form>
                                    <!-- Delete Button -->
                                    <div class="col-md-3">
                                        <delete-button
                                            delete-route="{{ route('lab.destroy', $lab->id) }}"
                                            index-route="{{ route('lab.index') }}"
                                        >
                                        </delete-button>
                                    </div>
                                </div>
                            </div>
                            <!-- Google Map for the Location of the Lab -->
                            <lab-map location="{{ $lab->location }}"></lab-map>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
