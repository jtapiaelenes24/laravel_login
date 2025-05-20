@extends('layout.plantilla')

@section('title', 'Iniciar Sesión')

@section('content')

    <div class="container mx-auto max-w-2xl mt-24">
        <h1 class="text-center text-3xl text-orange-600 mb-3">Inicio de Sesión</h1>
        <hr class="border-4 border-solid border-orange-700 mb-5">

        <p class="text-center text-lg text-orange-400 mb-4">
            ¿No tienes una cuenta?
            <a href="" class="text-slate-500 hover:text-slate-700">Regístrese aquí</a>
        </p>

        <form action="{{ route('login.login') }}" method="POST" class="bg-white px-5 p-6">

            @csrf

            <input type="email" autocomplete="off" name="email" placeholder="Email"
                class="block w-full p-2 mb-3 outline-none text-gray-400 border-b-2 border-gray-300">

            <input type="password" autocomplete="off" name="password" placeholder="Password"
                class="block w-full p-2 mb-3 outline-none text-gray-400 border-b-2 border-gray-300">

            <input type="checkbox" name="remember" id="recordar">
            <label for="recordar" class="text-gray-700">Mantener la sesión iniciada</label>

            <button type="submit"
                class="mt-4 p-4 rounded-md block mx-auto bg-gray-400 hover:bg-gray-500 ease-in duration-300">
                Regístrate
            </button>


        </form>
    </div>

@endsection
