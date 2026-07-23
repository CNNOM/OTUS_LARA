@extends('layouts.root')

@section('title', 'Test Pfukjdjr')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-3">
                @include('layouts.sidebar')
            </div>
            <div class="col-9">
                <x-syper-input label="NAME" type="text">dasda</x-syper-input>
                <x-syper-input label="PASSWORD" type="password"></x-syper-input>
            </div>
        </div>
    </div>
@endsection

@php

@endphp
