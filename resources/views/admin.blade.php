@extends('layouts.app')
@php
    function printAll($a) {
        if (!is_array($a)) {
            echo $a, ' ';
            return;
        }

        foreach($a as $k => $value) {
            echo '<li>';
             echo '<b>',$k,': </b>';
             printAll($value);
            echo '</li>';
        }

    }
@endphp
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
                        <h1>List of Jsons</h1>

                        @foreach ($jsData as $item)
                            <div style="display:flex;">
                                <ul style="width:60%;">
                                    @php printAll($item->data); @endphp
                                </ul>
                                <div style="width:20%">
                                    <a href="/admin/{{$item->id}}/delete" style="color:red;">Удалить</a>
                                </div><div style="width:20%">
                                    <a href="/admin/{{$item->id}}/edit" style="color:green;">Править</a>
                                </div>
                            </div>
                        @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
