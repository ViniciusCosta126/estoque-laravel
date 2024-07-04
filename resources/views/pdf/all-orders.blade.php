<style>
    body {
        font-family: sans-serif;
    }

    .overflow-y-auto {
        overflow-y: auto;
    }

    .border-collapse {
        border-collapse: collapse;
    }

    .text-white {
        color: #ffff;
    }

    .border {
        border: 1px solid black;
    }

    .border-dark {
        border-color: rgb(0 0 0);
    }

    .border-2 {
        border-width: 2px;
    }

    .p-4 {
        padding: 1rem;
    }

    .text-center {
        text-align: center;
    }

    .py-1 {
        padding: 0.5rem
    }

    .bg-gray-dark {
        background-color: rgb(39 52 68);
    }
</style>

<table class="border-collapse overflow-y-auto">
    <thead>
        <tr class="border-2 border border-dark text-white">
            <th class="bg-gray-dark p-4">Nº Pedido</th>
            <th class="bg-gray-dark p-4">Comprador</th>
            <th class="bg-gray-dark p-4">CPF</th>
            <th class="bg-gray-dark p-4">Numero Telefone</th>
            <th class="bg-gray-dark p-4">Status</th>
            <th class="bg-gray-dark p-4">Valor total</th>
            <th class="bg-gray-dark p-4">Endereco</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr class="border-2 border">
                <td class="text-center py-1">
                    {{ $order->id }}
                </td>
                <td class="text-center py-1 px-2">
                    {{ $order->customer_name }}
                </td>
                <td class="text-center py-1">{{ $order->cpf }}</td>
                <td class="text-center py-1">{{ $order->phone_number }}</td>
                <td class="text-center py-1">{{ $order->status }}</td>
                <td class="text-center py-1">R$ {{ number_format((float) $order->total_amount, 2) }}</td>
                <td class="text-center py-1">{{ $order->address }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
