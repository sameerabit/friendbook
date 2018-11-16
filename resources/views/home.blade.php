@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <div class="form-group row">
                                <label for="search"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Search') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name">
                                </div>
                            </div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th> id</th>
                                <th> First Name</th>
                                <th> Last Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($friends as $friend)
                                <tr>
                                    <td> {{$friend->id}} </td>
                                    <td> {{$friend->first_name}} </td>
                                    <td> {{$friend->last_name}} </td>
                                    <td></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
