
@extends('layouts.esmeralda')

@section('contenido')

    <section class="presentacion">
        <h1>Joyeria La Esmeralda</h1>

        <p>
            Bienvenidos a nuestra joyería. Ofrecemos piezas elegantes
            elaboradas con metales de calidad para cada ocasión.
        </p>
    </section>

    <section class="filtros">
        <h2>Nuestro mostrador</h2>

        <nav aria-label="Filtrar joyas">
            <a href="/joyas">Todos</a>
            <a href="/joyas?metal=Oro">Oro</a>
            <a href="/joyas?metal=Plata">Plata</a>
            <a href="/joyas?metal=Platino">Platino</a>
        </nav>
    </section>

    <section class="inventario">

        <h2>Inventario de joyas</h2>

        <p>
            Hay {{ count($joyas) }} joyas en el mostrador.
        </p>

        <p>
            Valor total del inventario: Bs {{ $joyas->sum('precio') }}
        </p>

        <div class="tarjetas">

            @forelse ($joyas as $joya)

                <article class="tarjeta
                    {{ $joya->precio >= 5000 ? 'coleccion' : '' }}">

                    <h3>{{ $joya->pieza }}</h3>

                    <p>Metal: {{ $joya->metal }}</p>

                    <p>Precio: Bs {{ $joya->precio }}</p>

                    @if ($joya->precio >= 5000)
                        <strong class="etiqueta">
                            Pieza de coleccion
                        </strong>
                    @endif

                </article>

            @empty

                <p>No hay joyas para mostrar.</p>

            @endforelse

        </div>

    </section>

    <p class="atencion">
        Mostrador atendido por Celly Villca Cuentas
    </p>

    <a href="/joyas/nuevo" class="boton">
        Registrar nueva joya
    </a>

@endsection
