
@extends('layouts.base')
@section('title', "User Summary")


@section('content')
    <h1>My Dashboard</h1>

    <ul class="list-group " >
        <li class="list-group-item">
            First Name: {{ $user->firstname }}
            <button class="inline-block btn btn-success float-right">Change</button>

        </li>
        <li class="list-group-item">
            Last Name: {{ $user->lastname }}
            <button class="inline-block btn btn-success float-right">Change</button>
        </li>
        <li class="list-group-item">
            E-Mail Address: {{ $user->email}}
            <button class="inline-block btn btn-success float-right">Change</button>
        </li>
        <li class="list-group-item">
            Street Address: {{ $user->address}}
            <button class="inline-block btn btn-success float-right">Change</button>
        </li>
    </ul>

@endsection

