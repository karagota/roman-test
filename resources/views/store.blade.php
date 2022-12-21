@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                        <h1>Store a Json</h1>
                        <form method="POST" action="/json/save" id="store-form">
                            @csrf
                            <div>
                                <select name="method" onchange="document.getElementById('store-form').setAttribute('method', this.options[this.selectedIndex].value);">
                                    <option value="POST">POST</option>
                                    <option value="GET">GET</option>
                                </select>
                            </div>
                            <div>
                                <textarea name="data">

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
