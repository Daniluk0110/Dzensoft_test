@extends('layouts.app')

@section('title')
    Admin Panel
@endsection

@section('content')
    <h1>Admin Panel</h1>
    <br>
    <hr>
    <h2>Detail message:</h2>
    <br>

    <div class="conteiner">
        <div class="row">
            @include('partials.messages')
            <div class="col-12">Id: {{ $contact->id }}</div>
            <hr>
            <div class="col-12">Watched: @if($contact->watched == 0)No @else Yes @endif</div>
            <hr>
            <div class="col-12">Date Create: {{ $contact->created_at }}</div>
            <hr>
            <div class="col-12">Date Update: {{ $contact->updated_at }}</div>
            <hr>
            <div class="col-12">Name: {{ $contact->name }}</div>
            <hr>
            <div class="col-12">Email: {{ $contact->email }}</div>
            <hr>
            <div class="col-12">Phone: {{ $contact->phone }}</div>
            <hr>
            <div class="col-12">Message: {{ $contact->message }}</div>
            <hr>
            <a class="btn btn-primary" href="/admin/{{ $contact->id }}/update">Edit</a>
        </div>
    </div>
@endsection
