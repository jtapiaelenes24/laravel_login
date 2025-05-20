@extends('layout.plantilla')

@section('title', 'Regístrate')

@section('content')

    <div class="container mx-auto max-w-2xl mt-24">
        <h1 class="text-center text-3xl text-orange-600 mb-3">Regístrate</h1>
        <hr class="border-4 border-solid border-orange-700 mb-5">

        <p class="text-center text-lg text-orange-400 mb-4">
            ¿Ya tienes una cuenta?
            <a href="{{ route('login') }}" class="text-slate-500 hover:text-slate-700">Inicia sesión aquí</a>
        </p>

        <form action="{{ route('registrate.register') }}" method="POST" class="bg-white px-5 p-6">

            @csrf

            @if (count($errors) > 0)
                <div class="bg-red-300 p-2 mt-2">
                    <p class="text-red-500 mb-2">Corrige los siguientes errores:</p>
                    <ul class="list-disc pl-10">
                        @foreach ($errors->all() as $message)
                            <li class="text-red-500">{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <input type="text" autocomplete="off" name="name" placeholder="Nombre" value="{{ old('name') }}"
                class="block w-full p-2 mb-3 outline-none text-gray-400 border-b-2 border-gray-300">

            <input type="email" autocomplete="off" name="email" placeholder="Email" value="{{ old('email') }}"
                class="block w-full p-2 mb-3 outline-none text-gray-400 border-b-2 border-gray-300">

            <input type="password" autocomplete="off" name="password" placeholder="Password"
                class="block w-full p-2 mb-3 outline-none text-gray-400 border-b-2 border-gray-300">

            <input type="password" autocomplete="off" name="password_confirmation" placeholder="Confirmar Password"
                class="block w-full p-2 mb-3 outline-none text-gray-400 border-b-2 border-gray-300">

            <button type="submit"
                class="mt-4 p-4 rounded-md block mx-auto bg-gray-400 hover:bg-gray-500 ease-in duration-300">
                Iniciar Sesión
            </button>


        </form>
    </div>

@endsection
