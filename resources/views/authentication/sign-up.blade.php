@php

    $values = [
        'name' => old('name') ?? null,
        'last_name' => old('last_name') ?? null,
        'email' => old('email') ?? null,
    ];

@endphp

@extends('layouts.auth')

@section('sectionTitle', 'Ingresar')

@section('content')
    <p>¿Ya tienes una cuenta? <a href="{{route('auth.login-form')}}" class="is-block">Ingresar</a></p>

    <form action="{{route('auth.sign-up')}}" method="POST">
        @csrf

        <div class="field">
            <label class="label" for="name-input">Nombre</label>
            <div class="control">
                <input
                    name="name"
                    class="input"
                    type="text"
                    id="name-input"
                    value="{{$values["name"]}}"
                    placeholder="Por ejemplo, Robert"
                    @error('name') aria-describedby="name-error" @enderror>
            </div>

            @error('name')
            <div class="notification is-danger" id="name-error">{{$message}}</div>
            @enderror
        </div>

        <div class="field">
            <label class="label" for="last_name-input">Apellido</label>
            <div class="control">
                <input
                    name="last_name"
                    class="input"
                    type="text"
                    value="{{$values["last_name"]}}"
                    id="last_name-input"
                    placeholder="Por ejemplo, Krebs"
                    @error('last_name') aria-describedby="last_name-error" @enderror>
            </div>

            @error('last_name')
            <div class="notification is-danger" id="last_name-error">{{$message}}</div>
            @enderror
        </div>

        <div class="field">
            <label class="label" for="email-input">Correo electrónico</label>
            <div class="control">
                <input
                    name="email"
                    class="input"
                    type="email"
                    value="{{$values["email"]}}"
                    id="email-input"
                    placeholder="Por ejemplo, RobertJKrebs@gmail.com"
                    @error('email') aria-describedby="email-error" @enderror>
            </div>

            @error('email')
            <div class="notification is-danger" id="email-error">{{$message}}</div>
            @enderror
        </div>

        <div class="field">
            <label class="label" for="password-input">Contraseña</label>
            <div class="control">
                <input
                    name="password"
                    class="input"
                    type="password"
                    id="password-input"
                    placeholder="Por ejemplo, ********"
                    @error('password') aria-describedby="password-error" @enderror>
            </div>

            <p class="help">La contraseña debe contener como mínimo 8 caracteres</p>

            @error('password')
            <div class="notification is-danger" id="password-error">{{$message}}</div>
            @enderror
        </div>

        <div class="field">
            <label class="label" for="password_confirmation-input">Repetir contraseña</label>
            <div class="control">
                <input
                    name="password_confirmation"
                    class="input"
                    type="password"
                    id="password_confirmation-input"
                    placeholder="Por ejemplo, ********"
                    @error('password_confirmation') aria-describedby="password_confirmation-error" @enderror>
            </div>

            @error('password_confirmation')
            <div class="notification is-danger" id="password_confirmation-error">{{$message}}</div>
            @enderror
        </div>

        <div class="control">
            <button class="button">Registrarme</button>
        </div>
    </form>
@endsection
