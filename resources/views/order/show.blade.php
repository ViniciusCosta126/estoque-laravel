<x-layout title="Pedido | Nº {{ $order->id }}" page="Pedido - Nº {{ $order->id }}">
    <div class="w-1/3">
        <p class="bg-gray text-xl font-bold border border-2 pl-1 ">Cliente</p>
        <div class="grid grid-cols-2  border">
            <div class="border py-1 pr-20 pl-1 ">
                <p class="font-bold">Nome do cliente</p>
                <p class="mt-1">{{ $order->customer_name }}</p>
            </div>
            <div class="border py-1 pr-20 pl-1 ">
                <p class="font-bold ">Telefone</p>
                <p class="mt-1">{{ $order->phone_number }}</p>
            </div>
            <div class="border py-1 pr-20 pl-1 ">
                <p class="font-bold">Endereco</p>
                <p class="mt-1">{{ $order->address }}</p>
            </div>
            <div class="border py-1 pr-20 pl-1 ">
                <p class="font-bold ">Cpf</p>
                <p class="mt-1">{{ $order->cpf }}</p>
            </div>
        </div>
        <p class="bg-gray text-xl font-bold border border-2 pl-1 ">Itens do pedido</p>
        <div class="border border-2">
            <div class="grid grid-cols-4 bg-gray">
                <p class="font-bold p-1">Nome Produto</p>
                <p class="font-bold p-1">Quantidade</p>
                <p class="font-bold p-1">Valor Unitario</p>
                <p class="font-bold p-1">Valor total</p>
            </div>
            @foreach ($order->items as $item)
                <div class="grid grid-cols-4">
                    <p class="p-1">{{ $item->name }}</p>
                    <p class="p-1">{{ $item->getOriginal()['pivot_quantity'] }}</p>
                    <p class="p-1">R$ {{ number_format((float) $item->getOriginal()['pivot_price'], 2) }}</p>
                    <p class="p-1">
                        R${{ number_format((float) $item->getOriginal()['pivot_price'] * (int) $item->getOriginal()['pivot_quantity'], 2) }}
                    </p>
                </div>
            @endforeach
        </div>
        <div class="grid grid-cols-2 bg-gray pl-1 gap-x-20 rounded-b py-2">
            <p><span class="font-bold">Data do pedido:</span> {{ $order->created_at }}</p>
            <p><span class="font-bold">Valor total:</span> R${{ number_format((float) $order->total_amount, 2) }}</p>
            <p><span class="font-bold">Contato:</span> (16) 99613-1443</p>
        </div>
        <div class="flex mt-2 justify-end">
            <a href="{{ route('download-pdf-order', $order->id) }}" class="text-2xl ml-2 cursor-pointer text-red"><i
                    class="far fa-file-pdf"></i></a>
        </div>
    </div>
</x-layout>
