@extends('layout')

@section('title', 'Заявки')

@section('content')

    <a class="btn btn-primary" role="button" href="{{route('users.create')}}" >Создать Заявку</a>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
    <tr>
        <th scope="row">{{$user -> id}}</th>
        <td><a href="{{route('users.show', $user)}}">{{$user -> name}}</a></td>
        <td><a href="{{route('users.show', $user)}}">{{$user -> email}}</a></td>
        <td>{{$user -> phone}}</td>
        <td>
            <form method="POST" action="{{route('users.destroy', $user)}}">
                <a type="button" class="btn btn-dark" href="{{route('users.edit', $user)}}">Изменить</a>
                @csrf
                @method('DELETE')
                <button name="" class="btn btn-warning" type="submit">Удалить</button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
{{$users->links()}}
@endsection
