@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Utilisateurs intéressés</h2>

    <h4>Utilisateurs en attente</h4>
    <ul>
        @foreach($interestedUsers as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>

    <h4>Utilisateurs acceptés</h4>
    <ul>
        @foreach($acceptedUsers as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>
</div>
@endsection
