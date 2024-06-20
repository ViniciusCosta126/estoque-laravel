<x-layout title="Alterar Produto" page="Alterar um produto">
    <form class="w-fit p-5 drop-shadow-sm" action="{{ route('item.update', $item->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="flex">
            <div class="flex flex-col">
                <label class="text-lg font-bold" for="name">Nome do Produto:</label>
                <input class="p-1 rounded" type="text" id="name" name="name" value="{{ $item->name }}">
            </div>
            <div class="flex flex-col ml-4">
                <label class="text-lg font-bold" for="amount">Quantidade do Produto:</label>
                <input class="p-1 rounded" type="text" name="amount" id="amount" value="{{ $item->amount }}">
            </div>
            <div class="flex flex-col ml-4">
                <label class="text-lg font-bold" for="minimum_quantity">Quantidade minima do produto:</label>
                <input class="p-1 rounded" type="text" id="minimum_quantity" name="minimum_quantity"
                    value="{{ $item->minimum_quantity }}">
            </div>
        </div>
        <button class="mt-4 bg-gray-dark p-3 rounded font-bold text-white" type="submit">Salvar produto</button>
    </form>
</x-layout>
