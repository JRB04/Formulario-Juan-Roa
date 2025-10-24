{{-- resources/views/contactos_lista.blade.php --}}

@extends('app') 

@section('title', 'Lista de Contactos')

@section('content')

    <h2 class="mb-4">Contactos Recibidos</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    
    @if($contactos->isEmpty())
        <div class="alert alert-info" role="alert">
            No hay contactos guardados todavía. Envía uno desde el formulario.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover shadow-sm">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Número</th>
                        <th>Asunto</th>
                        <th>Fecha de Envío</th>
                        <th>Acciones</th> </tr>
                </thead>
                <tbody>
                    @foreach ($contactos as $contacto)
                        <tr>
                            <td>{{ $contacto->id }}</td>
                            <td>{{ $contacto->nombre }}</td>
                            <td>{{ $contacto->correo }}</td>
                            <td>{{ $contacto->numero }}</td>
                            <td>{{ $contacto->asunto }}</td>
                            <td>{{ $contacto->created_at->format('d/m/Y H:i') }}</td>
                            
                            <td>
                                <form action="{{ route('contacto.eliminar', $contacto->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE') <button type="submit" class="btn btn-danger btn-sm" 
                                            onclick="return confirm('¿Estás seguro de que deseas eliminar este contacto?')">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

@endsection