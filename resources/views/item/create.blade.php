<x-layout title="Criar Produto" page="Adicionar um novo produto">
    <form class="w-fit p-5 drop-shadow-sm" action="{{ route('item.store') }}" method="post">
        @csrf
        <div class="flex">
            <div class="flex flex-col">
                <label class="text-lg font-bold" for="name">Nome do Produto:</label>
                <input class="p-1 rounded" type="text" id="name" name="name">
            </div>
            <div class="flex flex-col ml-4">
                <label class="text-lg font-bold" for="amount">Quantidade do Produto:</label>
                <input class="p-1 rounded" type="text" name="amount" id="amount">
            </div>
            <div class="flex flex-col ml-4">
                <label class="text-lg font-bold" for="minimum_quantity">Quantidade minima do produto:</label>
                <input class="p-1 rounded" type="text" id="minimum_quantity" name="minimum_quantity">
            </div>
        </div>
        <button class="mt-4 bg-gray-dark p-3 rounded font-bold text-white" type="submit">Adicionar produto</button>
    </form>
</x-layout>
