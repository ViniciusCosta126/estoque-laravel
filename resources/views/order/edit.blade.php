<x-layout page="Atualizar pedido - {{ $order->id }}" title="Atualiza Pedido">
    <form class="px-4 w-2/5" action="{{ route('order.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="flex">
            <div class="flex flex-col w-6/12 mr-2">
                <label class="text-lg text-semibold" for="customer_name">Nome cliente</label>
                <input class="px-2 py-0.5 rounded" type="text" name="customer_name" id="customer_name"
                    value="{{ $order->customer_name }}">
            </div>
            <div class="flex flex-col w-6/12">
                <label class="text-lg text-semibold" for="phone_number">Numero de telefone</label>
                <input class="px-2 py-0.5 rounded" type="text" name="phone_number" id="phone_number"
                    value="{{ $order->phone_number }}">
            </div>
        </div>

        <div class="flex flex-col mt-1">
            <label class="text-lg text-semibold" for="address">Endereco</label>
            <input class="px-2 py-0.5 rounded " type="text" name="address" id="address"
                value="{{ $order->address }}">
        </div>
        <div class="flex flex-col mt-1">
            <label class="text-lg text-semibold" for="cpf">CPF</label>
            <input class="px-2 py-0.5 rounded " type="text" name="cpf" id="cpf"
                value="{{ $order->cpf }}">
        </div>
        <div class="flex mt-1">
            <div class="flex flex-col w-6/12 mr-2">
                <label class="text-lg text-semibold" for="status">Status</label>
                <select class="px-2 py-0.5 rounded" name="status" id="status" value="{{ $order->status }}">
                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pendente</option>
                    <option value="processing" {{ old('status') == 'processing' ? 'selected' : '' }}>Processando
                    </option>
                    <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completo</option>
                    <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelado</option>
                </select>
            </div>

            <div class="flex flex-col w-6/12">
                <label class="text-lg text-semibold" for="total_amount">Total do pedido</label>
                <input class="px-2 py-0.5 rounded" type="text" name="total_amount" readonly id="total_amount"
                    value="{{ number_format((float) $order->total_amount, 2) }}">
            </div>
        </div>

        <div class="flex mt-1 flex-col">
            <label class="text-lg text-semibold" for="items">Items</label>
            <select class="px-2 py-0.5 rounded " id="itemSelect">
                <option value="" disabled selected>Escolha uma opção</option>
            </select>
            <div class="grid grid-cols-4 mt-2 gap-1" id="inputContainer">
                <p class="font-bold">Nome produto</p>
                <p class="font-bold">Qtd desejada</p>
                <p class="font-bold">Qtd disponivel</p>
                <p class="font-bold">Valor do produto</p>

                @foreach ($order->items as $item)
                    <input type="text" value="{{ $item->id }}" hidden=""
                        name="items[{{ $item->id }}][item_id]" id='{{ $item->id }}'>
                    <input type="text" placeholder="Nome" readonly="" value="{{ $item->name }}"
                        class="px-2 py-0.5 rounded">
                    <input type="number" placeholder="Quantidade" name="items[{{ $item->id }}][quantity]"
                        class="px-2 py-0.5 rounded quantidade"
                        value="{{ (int) $item->getOriginal()['pivot_quantity'] }}">
                    <input type="number" readonly="" value="{{ $item->amount }}" class=" px-2 py-0.5 rounded">
                    <input type="number" placeholder="Valor"
                        value="{{ number_format((float) $item->getOriginal()['pivot_price'], 2) }}"
                        name="items[{{ $item->id }}][price]" class="px-2 py-0.5 rounded valor-produto">
                @endforeach

            </div>
        </div>
        <button type="submit" class="mt-4 bg-green p-3 rounded font-bold text-white">Salvar Pedido</button>
    </form>
    @vite('resources/js/order/index.js')
</x-layout>
