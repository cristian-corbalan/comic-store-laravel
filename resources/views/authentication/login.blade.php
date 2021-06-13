@php
$values = [
        'email' => old('email') ?? null,
    ]
@endphp

@extends('layouts.auth')

@section('sectionTitle', 'Ingresar')

@section('content')
    <p>¿Todavía no tienes una cuenta? <a href="{{route('auth.sign-up-form')}}" class="is-block">Registrarse</a></p>

    <form action="{{route('auth.login')}}" method="POST">
        @csrf

        <div class="field">
            <label class="label" for="email-input">Correo electrónico</label>
            <div class="control">
                <input
                    name="email"
                    class="input"
                    type="email"
                    id="email-input"
                    value="{{$values["email"]}}"
                    placeholder="Por ejemplo, RobertJKrebs@gmail.com"
                    @error('email') aria-describedby="email-error" @enderror />
            </div>
{{--            <p class="help">This is a help text</p>--}}
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
                    @error('password') aria-describedby="password-error" @enderror />
            </div>
{{--            <p class="help">This is a help text</p>--}}
            @error('password')
            <div class="notification is-danger" id="password-error">{{$message}}</div>
            @enderror
        </div>

        <div class="control">
            <button class="button">Ingresar</button>
        </div>
    </form>
@endsection
