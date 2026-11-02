<?php

namespace App\Http\Controllers;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
     private array $platos = [
        'Bowl vegetariano' => 25.00,
        'Hamburguesa vegetariana' => 20.00,
        'Ensalada fresca' => 18.00,
    ];

    public function index()
    {
        return view('aluci', [
            'platos' => $this->platos,
        ]);
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'telefono' => ['required', 'string', 'max:20'],
            'plato' => ['required', 'string', 'in:' . implode(',', array_keys($this->platos))],
            'cantidad' => ['required', 'integer', 'min:1', 'max:100'],
            'detalle' => ['nullable', 'string', 'max:1000'],
        ]);

        $precio = $this->platos[$datos['plato']];

        Pedido::create([
            'nombre' => $datos['nombre'],
            'telefono' => $datos['telefono'],
            'plato' => $datos['plato'],
            'cantidad' => $datos['cantidad'],
            'precio_unitario' => $precio,
            'total' => $precio * $datos['cantidad'],
            'detalle' => $datos['detalle'] ?? null,
        ]);

        return redirect()
            ->route('aluci')
            ->with('exito', '¡Tu pedido fue registrado correctamente!');
    }
    //
}
