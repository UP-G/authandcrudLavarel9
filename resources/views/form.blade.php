@extends('layout')

@section('title', isset($user) ? 'Update '.$user->name : 'Создание заявки')

@section('content')
    <a class="btn btn-success" href="{{route('users.index')}}">Список</a>
    <form method="POST"
          @if(isset($user))
          action="{{route('users.update', $user)}}"
          @else
          action="{{route('users.store')}}"
          @endif
          class="mt-3">
        @csrf
        @isset($user)
            @method('PUT')
        @endisset
        <div class="row">
            <div class="row mt-3">
            <div class="col">
                <input name="name" value="{{isset($user) ? $user->name : null}}" type="text" class="form-control" placeholder="Имя" aria-label="Name">
            </div>
            </div>
            <div class="row mt-3">
            <div class="col">
                <input name="email" value="{{isset($user) ? $user->email : null}}" type="text" class="form-control" placeholder="Email" aria-label="Email">
            </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <input name="phone" value="{{isset($user) ? $user->phone : null}}" type="text" class="form-control" placeholder="+79201139598" aria-label="Номер телефона">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <button type="submit" class="btn btn-success">Создание Заявки</button>
                </div>
            </div>
        </div>
    </form>
@endsection
