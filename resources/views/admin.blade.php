@extends('layouts.app')

@section('title')
    Admin Panel
@endsection

@section('content')
    <h1>Admin Panel</h1>
    <br>
    <h2>Last messages:</h2>

    @include('partials.messages')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Watched</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Date</th>
            <th scope="col">Email</th>
            <th scope="col">Message</th>
            <th scope="col">CRUD</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contacts as $contact)
            <tr>
                <th scope="row">{{ $contact->id }}</th>
                <th scope="row">@if($contact->watched == 0)No @else Yes @endif</th>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->phone }}</td>
                <td>{{ $contact->updated_at }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->message }}</td>
                <td><a href="/admin/{{ $contact->id }}">View</a> | <a href="/admin/{{ $contact->id }}/update">Change</a> |
                    <form action="/admin/{{ $contact->id }}/delete" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete message</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
