<div class="flex space-x-2">
    <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" href="{{ route('dashboard', [
        'id' => $id
    ]) }}">Ver</a>

    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('dashboard', [
        'id' => $id
    ]) }}">Editar</a>

    <form action="delete">
        @csrf

        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>

    </form>
</div>