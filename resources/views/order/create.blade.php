<x-layout page="Criar novo pedido" title="Criar Pedido">
    <form class="border px-4 w-2/5" action="{{ route('order.store') }}" method="POST">
        @csrf
        <div class="flex">
            <div class="flex flex-col w-6/12 mr-2">
                <label class="text-lg text-semibold" for="customer_name">Nome cliente</label>
                <input class="px-2 py-0.5 rounded" type="text" name="customer_name" id="customer_name"
                    value="{{ old('customer_name') }}">
            </div>
            <div class="flex flex-col w-6/12">
                <label class="text-lg text-semibold" for="phone_number">Numero de telefone</label>
                <input class="px-2 py-0.5 rounded" type="text" name="phone_number" id="phone_number"
                    value="{{ old('phone_number') }}">
            </div>
        </div>

        <div class="flex flex-col mt-1">
            <label class="text-lg text-semibold" for="address">Endereco</label>
            <input class="px-2 py-0.5 rounded " type="text" name="address" id="address"
                value="{{ old('address') }}">
        </div>
        <div class="flex flex-col mt-1">
            <label class="text-lg text-semibold" for="cpf">CPF</label>
            <input class="px-2 py-0.5 rounded " type="text" name="cpf" id="cpf"
                value="{{ old('cpf') }}">
        </div>
        <div class="flex mt-1">
            <div class="flex flex-col w-6/12 mr-2">
                <label class="text-lg text-semibold" for="status">Status</label>
                <select class="px-2 py-0.5 rounded" name="status" id="status">
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
                    value="{{ old('total_amount') }}">
            </div>
        </div>

        <div class="flex mt-1 flex-col">
            <label class="text-lg text-semibold" for="items">Items</label>
            <select class="px-2 py-0.5 rounded " id="itemSelect">
                <option value="" disabled selected>Escolha uma opção</option>
            </select>
            <div class="grid grid-cols-4 mt-2" id="inputContainer">
                <p class="font-bold">Nome produto</p>
                <p class="font-bold">Qtd desejada</p>
                <p class="font-bold">Qtd disponivel</p>
                <p class="font-bold">Valor do produto</p>
            </div>
        </div>
        <button type="submit" class="mt-4 bg-green p-3 rounded font-bold text-white">Criar Pedido</button>
    </form>
    @vite('resources/js/order/index.js')
</x-layout>
