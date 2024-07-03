<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: sans-serif
        }

        .grid {
            display: -ms-grid;
            display: grid;
        }

        .grid-cols-2 {
            -ms-grid-columns: 1fr 1fr;
            grid-template-columns: repeat(2, 1fr);
        }

        .grid-cols-4 {
            -ms-grid-columns: 1fr 1fr 1fr 1fr;
            grid-template-columns: repeat(4, 1fr);
        }

        .pr-20 {
            padding-right: 5rem;
        }

        .mt-1 {
            margin-top: 0.25rem;
        }

        .pl-1 {
            padding-left: 0.25rem;
        }

        .py-1 {
            padding-top: 0.25rem;
            padding-bottom: 0.25rem;
        }

        .border {
            border-width: 1px;
            border-style: solid;
            border-color: black;
        }

        .bg-gray {
            background-color: rgb(147 168 172);
        }

        .font-bold {
            font-weight: 700;
        }

        .text-2xl {
            font-size: 2.25rem;
            line-height: 2.5rem;
        }

        .text-xl {
            font-size: 1.25rem;
            line-height: 1.75rem;
        }

        .mb-4 {
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <div>
        <h1 class="font-bold text-2xl">Pedido - Nº {{ $order->id }}</h1>
        <p class="bg-gray text-xl font-bold border pl-1">Cliente</p>
        <div class="grid grid-cols-2 border">
            <div class="border py-1 pr-20 pl-1">
                <p class="font-bold">Nome do cliente</p>
                <p class="mt-1">{{ $order->customer_name }}</p>
            </div>
            <div class="border py-1 pr-20 pl-1">
                <p class="font-bold">Telefone</p>
                <p class="mt-1">{{ $order->phone_number }}</p>
            </div>
            <div class="border py-1 pr-20 pl-1">
                <p class="font-bold">Endereço</p>
                <p class="mt-1">{{ $order->address }}</p>
            </div>
            <div class="border py-1 pr-20 pl-1">
                <p class="font-bold">CPF</p>
                <p class="mt-1">{{ $order->cpf }}</p>
            </div>
        </div>
        <p class="bg-gray text-xl font-bold border pl-1">Itens do pedido</p>
        <div class="border">
            <div class="grid grid-cols-4 bg-gray">
                <p class="font-bold p-1">Nome Produto</p>
                <p class="font-bold p-1">Quantidade</p>
                <p class="font-bold p-1">Valor Unitário</p>
                <p class="font-bold p-1">Valor total</p>
            </div>
            @foreach ($order->items as $item)
                <div class="grid grid-cols-4">
                    <p class="p-1">{{ $item->name }}</p>
                    <p class="p-1">{{ $item->pivot_quantity }}</p>
                    <p class="p-1">R$ {{ number_format((float) $item->pivot_price, 2) }}</p>
                    <p class="p-1">R${{ number_format((float) $item->pivot_price * $item->pivot_quantity, 2) }}</p>
                </div>
            @endforeach
        </div>
        <div class="grid grid-cols-2 bg-gray pl-1 gap-x-20 rounded-b py-2">
            <p><span class="font-bold">Data do pedido:</span> {{ $order->created_at }}</p>
            <p><span class="font-bold">Valor total:</span> R${{ number_format((float) $order->total_amount, 2) }}</p>
            <p><span class="font-bold">Contato:</span> (16) 99613-1443</p>
        </div>
    </div>
</body>

</html>
