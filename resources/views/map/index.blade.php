@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div>
                            Map Dashboard
                        </div>
                        <!-- Form for the filter -->
                        <div class="row">

                        </div>
                    </div>

                    <div class="card-body">
                        <lab-map v-bind:markers="{{ json_encode($markers) }}"></lab-map>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

