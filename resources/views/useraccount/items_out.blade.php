
@extends('layouts.base')
@section('title', "User Summary")


@section('content')
    <h1>My Items Out</h1>

    @component('components.item_out_table', ['itemsOutList' => $user->itemsOut])


    @endcomponent

@endsection

