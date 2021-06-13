@extends('layouts.auth')

@section('sectionTitle', 'Ingresar')

@section('content')
    <p>¿Ya tienes una cuenta? <a href="{{route('auth.login')}}" class="is-block">Ingresar</a></p>

    <form action="#" method="POST">
        <div class="field">
            <label class="label" for="name-input">Nombre</label>
            <div class="control">
                <input
                    name="name"
                    class="input"
                    type="text"
                    id="name-input"
                    placeholder="Por ejemplo, Robert">
            </div>
{{--            <p class="help">This is a help text</p>--}}
        </div>

        <div class="field">
            <label class="label" for="last_name-input">Apellido</label>
            <div class="control">
                <input
                    name="last_name"
                    class="input"
                    type="text"
                    id="last_name-input"
                    placeholder="Por ejemplo, Krebs">
            </div>
{{--            <p class="help">This is a help text</p>--}}
        </div>

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
            <p class="help">La contraseña debe contener como mínimo 8 caracteres</p>
        </div>

        <div class="field">
            <label class="label" for="repeat_password-input">Repetir contraseña</label>
            <div class="control">
                <input
                    name="repeat_password"
                    class="input"
                    type="password"
                    id="repeat_password-input"
                    placeholder="Por ejemplo, ********">
            </div>
{{--            <p class="help">This is a help text</p>--}}
        </div>

        <div class="control">
            <button class="button">Ingresar</button>
        </div>
    </form>
@endsection
