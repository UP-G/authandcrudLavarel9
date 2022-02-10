@extends('layout')
@guest()
    @if (Route::has('login'))
        <h1>Для админа</h1>
        <a href="/" class="btn btn-danger">Выход</a>
    @endif
@else
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
                    <button type="submit" class="btn btn-success">Создание Заявки</button>
                </div>
            </div>
        </div>
    </form>
@endsection
@endguest
