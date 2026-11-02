
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joyeria La Esmeralda</title>
    <link rel="stylesheet" href="{{ asset('css/esmeralda.css') }}">
</head>
<body>

    <header class="encabezado">
        <div class="contenedor">
            <h2>💎 La Esmeralda</h2>

            <nav>
    <ul>
        <li><a href="/joyas">Joyas</a></li>

        @auth
            <li>
                <a href="/joyas/nuevo">Registrar joya</a>
            </li>

            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Cerrar sesión</button>
                </form>
            </li>
        @else
            <li>
                <a href="{{ route('login') }}">Entrar</a>
            </li>
        @endauth

    </ul>
</nav>

            <button type="button" id="btn-oscuro">
                Modo oscuro
            </button>
        </div>
    </header>

    <main class="contenedor">
        @yield('contenido')
    </main>

    <footer>
        <p>Segunda instancia - Celly Villca Cuentas - 1 de noviembre de 2026</p>
    </footer>

    <script src="{{ asset('js/esmeralda.js') }}"></script>
</body>
</html>
