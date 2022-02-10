@extends('layout')

@section('title', 'Заявка '.$user->name)

@section('content')
    <a class="btn btn-success" href="{{route('users.index')}}">Список</a>
    <div class="card mt-3" style="width: 18rem;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">#: {{($user->id)}}</li>
            <li class="list-group-item">Имя: {{($user->name)}}</li>
            <li class="list-group-item">Email: {{($user->email)}}</li>
            <li class="list-group-item">Номер телефона: {{($user->phone)}}</li>
            <li class="list-group-item">Создана: {{($user->created_at->format('d/m/Y H:i'))}}</li>
            <li class="list-group-item">Обнавленна: {{($user->updated_at->format('d/m/Y H:i'))}}</li>
        </ul>
    </div>
    <a type="button" class="btn btn-dark mt-3" href="{{route('users.edit', $user)}}">Изменить</a>
    <form method="POST" action="{{route('users.destroy', $user)}}">
        @csrf
        @method('DELETE')
        <button name="" class="btn btn-warning mt-1" type="submit">Удалить</button>
    </form>
@endsection
