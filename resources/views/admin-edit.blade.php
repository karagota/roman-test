@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                        <h1>Edit Json</h1>

                            <form action="/admin/{{$id}}/save">
                            <div>
                                <textarea name="data">
                                    {{$jsData}}
                                </textarea>
                            </div>
                            <div>
                                <input type="submit" value="save" />
                            </div>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
