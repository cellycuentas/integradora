@extends('layouts.esmeralda')

@section('contenido')

<div class="formulario">
    <h1>Iniciar sesión</h1>
    <p>Bienvenido a Joyería La Esmeralda</p>

    @if ($errors->any())
        <p style="color:red">
            {{ $errors->first() }}
        </p>
    @endif

    <form action="{{ route('login.process') }}" method="POST">
        @csrf

        <label for="email">Correo electrónico</label>
        <input type="email" id="email" name="email"
               value="{{ old('email') }}" required>

        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password"
               required>

        <button type="submit">Ingresar</button>
    </form>
</div>

@endsection