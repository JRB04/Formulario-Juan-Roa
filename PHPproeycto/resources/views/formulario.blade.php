{{-- resources/views/formulario.blade.php --}}

@extends('app') 

@section('title', 'Formulario de Contacto')

@section('content')

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Completa tu Solicitud</h4>
                </div>
                <div class="card-body">
                    
                    <form action="{{ route('contacto.guardar') }}" method="POST">
                        @csrf <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo Electrónico:</label>
                            <input type="email" id="correo" name="correo" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="numero" class="form-label">Número de Teléfono:</label>
                            <input type="text" id="numero" name="numero" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="asunto" class="form-label">Asunto o Mensaje:</label>
                            <textarea id="asunto" name="asunto" rows="4" class="form-control" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-success w-100">
                            Enviar Contacto
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection