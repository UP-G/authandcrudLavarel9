@extends('layout')

@section('title', 'Заявки')

@section('content')
    <form method="POST"

          action="{{route('users.store')}}"
          class="mt-3">
        @csrf
        @isset($user)
            @method('PUT')
        @endisset
        <div class="row">
            <div class="row mt-3">
                <div class="col">
                    <input name="name" value="{{old('name', isset($user) ? $user->name : null)}}" type="text" class="form-control" placeholder="Имя" aria-label="Name">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <input name="email" value="{{old('email', isset($user) ? $user->email : null)}}" type="text" class="form-control" placeholder="Email" aria-label="Email">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <input name="phone" value="{{old('phone', isset($user) ? $user->phone : null)}}" type="text" class="form-control" placeholder="+79201139598" aria-label="Номер телефона">
                    @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <button type="submit" class="btn btn-success">Создать Заявку</button>
                    @guest()
                    @if (Route::has('login'))
                        <a class="btn btn-primary" href="{{ route('login') }}">{{ __('Вход') }}</a>
                    @endif
                    @endguest
                </div>
            </div>
        </div>
    </form>
    @guest()

    @else
        <div class="col mt-1" >
                    <h3>{{Auth::user()->name}}</h3>
            <a class="btn btn-primary" role="button" href="{{route('users.create')}}" >Форма Заявки (Admin)</a>
                    <a class="btn btn-danger" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Выход') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
        </div>
    @endguest
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
    <tr>
        @guest()
            @if (Route::has('login'))
                <th scope="row">{{$user -> id}}</th>
                <td><h5>{{$user -> name}}</h5></td>
                <td><h5>{{$user -> email}}</h5></td>
                <td>{{$user -> phone}}</td>
            @endif
            @else
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
        @endguest
    </tr>
    @endforeach
    </tbody>
</table>
{{$users->links()}}
@endsection
