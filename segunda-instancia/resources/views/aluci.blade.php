
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aluci | Restaurante vegetariano</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f5ef;
            color: #344e41;
            margin: 0;
        }
        header {
            background: #52796f;
            color: white;
            text-align: center;
            padding: 28px 15px;
        }
        main {
            max-width: 650px;
            margin: 30px auto;
            padding: 25px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 15px #0001;
        }
        label {
            display: block;
            margin-top: 14px;
        }
        input, select, textarea, button {
            box-sizing: border-box;
            width: 100%;
            padding: 12px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font: inherit;
        }
        button {
            margin-top: 20px;
            background: #52796f;
            color: white;
            border: 0;
            cursor: pointer;
        }
        button:hover { background: #354f52; }
        .mensaje {
            padding: 12px;
            border-radius: 8px;
            background: #e0f2e8;
            margin-bottom: 15px;
        }
        .error { color: #b42318; }
    </style>
</head>
<body>
    <header>
        <h1>aluci</h1>
        <p>Alimentación saludable, sabor natural</p>
    </header>

    <main>
        <h2>Realiza tu pedido</h2>
        <p>Elige tu plato vegetariano favorito.</p>

        @if (session('exito'))
            <div class="mensaje">{{ session('exito') }}</div>
        @endif

        @if ($errors->any())
            <div class="error">
                <p>Revisa los siguientes datos:</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pedidos.store') }}" method="POST">
            @csrf

            <label for="nombre">Nombre del cliente</label>
            <input id="nombre" name="nombre" value="{{ old('nombre') }}" required>

            <label for="telefono">Teléfono</label>
            <input id="telefono" name="telefono" value="{{ old('telefono') }}" required>

            <label for="plato">Selecciona tu plato</label>
            <select id="plato" name="plato" required>
                <option value="">Seleccionar plato</option>
                @foreach ($platos as $nombrePlato => $precio)
                    <option value="{{ $nombrePlato }}"
                        @selected(old('plato') === $nombrePlato)>
                        {{ $nombrePlato }} - Bs {{ number_format($precio, 2) }}
                    </option>
                @endforeach
            </select>

            <label for="cantidad">Cantidad</label>
            <input id="cantidad" type="number" name="cantidad"
                   min="1" max="100" value="{{ old('cantidad', 1) }}" required>

            <label for="detalle">Detalles adicionales (opcional)</label>
            <textarea id="detalle" name="detalle" rows="3">{{ old('detalle') }}</textarea>

            <button type="submit">Registrar pedido</button>
        </form>
    </main>
</body>
</html>
