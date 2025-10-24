<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto; 
use Illuminate\Routing\Controller; 

class ContactoController extends Controller
{
    // Función para MOSTRAR el formulario (Ruta: /)
    public function mostrarFormulario()
    {
        return view('formulario'); 
    }

    // Función para RECIBIR y GUARDAR los datos (Ruta: POST /contacto)
    public function guardarContacto(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|max:100',
            'correo' => 'required|email|unique:contactos,correo',
            'numero' => 'nullable|max:20',
            'asunto' => 'required',
        ]);

        // Guardado en la base de datos
        Contacto::create($request->all());

        // Redirección con mensaje de éxito
        return redirect()->route('contacto.formulario')
                         ->with('success', '¡Contacto guardado exitosamente y enviado a la lista!');
    }
    
    // Función para MOSTRAR la lista de contactos (Ruta: /contactos)
    public function mostrarContactos()
    {
        // Obtiene TODOS los registros
        $contactos = Contacto::all();

        // Retorna la vista y le pasa los datos
        return view('contactos_lista', compact('contactos'));
    }

    // Función para ELIMINAR un contacto (Ruta: DELETE /contactos/{contacto})
    public function eliminarContacto(Contacto $contacto)
    {
        // Elimina el registro de la base de datos
        $contacto->delete();

        // Redirige de vuelta a la lista con un mensaje de error/alerta
        return redirect()->route('contactos.lista')->with('error', '¡Contacto eliminado correctamente!');
    }
}