@extends('layouts.app')
@php
    function printAll($a) {
        if (!is_array($a)) {
            echo '<div class="tree-nav__item">',$a,'</div>';
            return;
        }
        foreach($a as $k => $value) {
            echo '<details class="tree-nav__item is-expandable">';
             echo '<summary class="tree-nav__item-title">',$k,'</summary>';
             printAll($value);
            echo '</details>';
        }
    }
@endphp
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                        <h1>List of Stored Json Objects</h1>

                        @foreach ($jsData as $k=>$item)
                            <div style="display:flex;max-width:60%;">
                                <nav class="tree-nav" style="width:60%;">
                                    <details class="tree-nav__item is-expandable">
                                        <summary class="tree-nav__item-title">{{$k}}</summary>
                                        @php printAll($item->data); @endphp
                                    </details>
                                </nav>
                                <div style="width:20%">
                                    <a href="/admin/{{$item->id}}/delete" style="color:red;">Delete</a>
                                </div><div style="width:20%">
                                    <a href="/admin/{{$item->id}}/edit" style="color:green;">Edit</a>
                                </div>
                            </div>
                        @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
