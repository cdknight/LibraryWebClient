
@extends('layouts.base')
@section('title', "User Summary")


@section('content')

    @component('components.users.update_userinfo_modal')

    @endcomponent


    <h1>My Info</h1>

    <ul class="list-group " >
        <li class="list-group-item">
            <p id="firstname-data" class="d-inline-block">First Name: {{ $user->firstname }}</p>
            <button class="inline-block btn btn-success float-right updateUserInfoModalButton" data-toggle="modal" data-userid="{{ $user->id }}" data-target="#updateUserInfoModal" data-fieldname="firstname" data-fieldnamefancy="First Name" data-fieldtype="text">Change</button>



        </li>
        <li class="list-group-item">
            <p id="lastname-data" class="d-inline-block">Last Name: {{ $user->lastname }}</p>
            <button class="inline-block btn btn-success float-right updateUserInfoModalButton" data-toggle="modal" data-userid="{{ $user->id }}" data-target="#updateUserInfoModal" data-fieldname="lastname" data-fieldnamefancy="Last Name" data-fieldtype="text">Change</button>

        </li>
        <li class="list-group-item">
            <p id="email-data" class="d-inline-block">E-Mail Address: {{ $user->email}}</p>
            <button class="inline-block btn btn-success float-right updateUserInfoModalButton" data-toggle="modal" data-userid="{{ $user->id }}" data-target="#updateUserInfoModal" data-fieldname="email" data-fieldnamefancy="E-Mail" data-fieldtype="email">Change</button>

        </li>
        <li class="list-group-item">
            <p id="address-data" class="d-inline-block">Street Address: {{ $user->address}}</p>
            <button class="inline-block btn btn-success float-right updateUserInfoModalButton" data-toggle="modal" data-userid="{{ $user->id }}" data-target="#updateUserInfoModal" data-fieldname="address" data-fieldnamefancy="Street    Address" data-fieldtype="text">Change</button>

        </li>
    </ul>

@endsection

