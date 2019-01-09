
@extends('layouts.base')
@section('title', "User Summary")


@section('content')
    <h1>My Items Out</h1>

    @component('components.items_out.renew_modal')

    @endcomponent

    @component('components.items_out.item_out_table', ['itemsOutList' => $user->itemsOut])


    @endcomponent

@endsection

