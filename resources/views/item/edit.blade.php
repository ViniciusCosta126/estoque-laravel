<x-layout title="Alterar Produto" page="Alterar um produto">
    <form class="w-fit p-5 drop-shadow-sm  bg-gray-dark rounded" action="{{ route('item.update', $item->id) }}"
        method="post">
        @csrf
        @method('PUT')
        <div class="flex flex-col">
            <div class="flex flex-col">
                <label class="text-lg  text-white" for="name">Nome do Produto:</label>
                <input class="p-1 rounded" type="text" id="name" value="{{ $item->name }}" name="name">
            </div>
            <div class="flex flex-col mt-2">
                <label class="text-lg text-white" for="amount">Quantidade do Produto:</label>
                <input class="p-1 rounded" type="text" name="amount" value="{{ $item->amount }}" id="amount">
            </div>
            <div class="flex mt-2">
                <div class="flex flex-col">
                    <label class="text-lg text-white" for="minimum_quantity">Quantidade minima do
                        produto:</label>
                    <input class="p-1 rounded" type="text" id="minimum_quantity"
                        value="{{ $item->minimum_quantity }}" name="minimum_quantity">
                </div>
                <div class="flex flex-col ml-4">
                    <label class="text-lg text-white" for="max_quantity">Quantidade maxima do produto:</label>
                    <input class="p-1 rounded" type="text" value="{{ $item->max_quantity }}" id="max_quantity"
                        name="max_quantity">
                </div>
            </div>
            <div class="flex mt-2">
                <div class="flex flex-col w-2/4">
                    <label class="text-lg text-white" for="cost_price">Preço de custo:</label>
                    <input class="p-1 rounded" type="number" step="0.01" value="{{ $item->cost_price }}"
                        id="cost_price" name="cost_price">
                </div>
                <div class="flex flex-col ml-4 w-2/4">
                    <label class="text-lg text-white" for="sale_price">Preço de venda:</label>
                    <input class="p-1 rounded" type="number" step="0.01" value="{{ $item->sale_price }}"
                        id="sale_price" name="sale_price">
                </div>
            </div>
        </div>
        <button class="mt-4 bg-green p-3 rounded font-bold text-white" type="submit">Salvar produto</button>
    </form>
</x-layout>
