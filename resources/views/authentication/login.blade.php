@extends('layouts.auth')

@section('sectionTitle', 'Ingresar')

@section('content')
    <p>¿Todavía no tienes una cuenta? <a href="{{route('auth.sign-up')}}" class="is-block">Registrarse</a></p>

    <form action="#" method="POST">
        <div class="field">
            <label class="label" for="email-input">Correo electrónico</label>
            <div class="control">
                <input
                    name="email"
                    class="input"
                    type="email"
                    id="email-input"
                    placeholder="Por ejemplo, RobertJKrebs@gmail.com">
            </div>
{{--            <p class="help">This is a help text</p>--}}
        </div>

        <div class="field">
            <label class="label" for="password-input">Contraseña</label>
            <div class="control">
                <input
                    name="password"
                    class="input"
                    type="password"
                    id="password-input"
                    placeholder="Por ejemplo, ********">
            </div>
{{--            <p class="help">This is a help text</p>--}}
        </div>

        <div class="control">
            <button class="button">Ingresar</button>
        </div>
    </form>
@endsection
