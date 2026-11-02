
@extends('layouts.esmeralda')

@section('contenido')

    <section class="formulario-seccion">

        <h1>Registrar una nueva joya</h1>

        <p>
            Complete los siguientes datos para agregar una pieza
            al inventario de La Esmeralda.
        </p>

        @if ($errors->any())
            <div class="errores">
                <h2>Revisa los siguientes errores:</h2>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="form-joya"
              action="/joyas/nuevo"
              method="POST">

            @csrf

            <div class="campo">
                <label for="pieza">Pieza de la joya:</label>

                <input
                    type="text"
                    id="pieza"
                    name="pieza"
                    value="{{ old('pieza') }}"
                    placeholder="Ejemplo: Anillo">

                <p id="aviso-pieza" class="aviso"></p>
            </div>

            <div class="campo">
                <label for="metal">Metal:</label>

                <select id="metal" name="metal">
                    <option value="">Elige un metal</option>

                    <option value="Oro" {{ old('metal') == 'Oro' ? 'selected' : '' }}>
                        Oro
                    </option>

                    <option value="Plata" {{ old('metal') == 'Plata' ? 'selected' : '' }}>
                        Plata
                    </option>

                    <option value="Platino" {{ old('metal') == 'Platino' ? 'selected' : '' }}>
                        Platino
                    </option>
                </select>
            </div>

            <div class="campo">
                <label for="precio">Precio en Bs:</label>

                <input
                    type="number"
                    id="precio"
                    name="precio"
                    value="{{ old('precio') }}"
                    placeholder="Ejemplo: 1500">

                <p id="aviso-precio" class="aviso"></p>
            </div>

            <button type="submit" class="boton">
                Registrar joya
            </button>

        </form>

    </section>

@endsection
