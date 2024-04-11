@extends('blades.header')

@section('title')
F1 | Guys
@endsection

@section('main')

<form method="POST" action="{{ route('add') }}" class="form-container">
    @csrf

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="team">Team:</label>
        <input type="text" id="team" name="team" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="wins">Wins:</label>
        <input type="number" id="wins" name="wins" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Add Pilot</button>
</form>

<form method="POST" action="{{ route('populate') }}" style="margin: 2rem 4rem;">
    @csrf
    <button type="submit" class="btn" style="background-color: #c647e6;">Populate many</button>
</form>

<h2 style="font-size: 32px; margin-left: 4rem">
    Current F1 Pilots:
</h2>

@foreach($f1pilots as $pilot)

<div style="display: flex; gap: 1rem; max-width:300px; margin-left: 6rem; align-items: center; justify-content: space-between;">

    <form class="pilotNameForm" id="{{ $pilot->id }}" method="get" action="{{ route('pilots', ['id' => $pilot->id]) }}">
        <div onclick="document.getElementById('{{ $pilot->id }}').submit();">{{ $pilot->name }}</div>
    </form>

    <form method="POST" action="{{ route('delete', ['id' => $pilot->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn" style="background-color: red;">Delete</button>
    </form>

</div>

@endforeach

@endsection

<style>
    .pilotNameForm:hover {
        text-decoration: underline;
        cursor: pointer;
    }

    .form-container {
        max-width: 400px;
        margin: 0 auto;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    label {
        display: block;
        margin-bottom: 0.5rem;
    }

    .input-group {
        margin-bottom: 1rem;
    }

    .form-control {
        width: 100%;
        padding: 0.5rem;
        font-size: 1rem;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
    }

    .btn {
        display: inline-block;
        font-weight: 400;
        color: #fff;
        text-align: center;
        vertical-align: middle;
        user-select: none;
        background-color: #007bff;
        border: 1px solid transparent;
        padding: 0.25rem 0.5rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        cursor: pointer;
        transition: color 0.15s ease-in-out,
            background-color 0.15s ease-in-out,
            border-color 0.15s ease-in-out,
            box-shadow 0.15s ease-in-out;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>