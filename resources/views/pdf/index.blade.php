<style>
    .border-collapse {
        border-collapse: collapse;
    }

    .text-white {
        color: #ffff;
    }

    .border-dark {
        border-color: #000;
    }

    .border-2 {
        border-color: #000;
        border-width: 2px;
    }

    .p-4 {
        padding: 1rem;
    }

    .bg-gray-dark {
        background-color: rgb(39 52 68);
    }

    .justify-end {
        justify-content: flex-end;
    }

    .flex {
        display: flex;
    }

    .mt-2 {
        margin-top: 0.5rem;
    }

    .text-center {
        text-align: center;
    }

    .py-1 {
        padding-top: 0.25rem;
        padding-bottom: 0.25rem;
    }
</style>
<table class="border-collapse overflow-y-auto">
    <thead>
        <tr class="border-2 border-dark text-white">
            <th class="bg-gray-dark p-4">Nome</th>
            <th class="bg-gray-dark p-4">Quantidade</th>
            <th class="bg-gray-dark p-4">Qtd minima</th>
            <th class="bg-gray-dark p-4">Qtd maxima</th>
            <th class="bg-gray-dark p-4">Preço de custo</th>
            <th class="bg-gray-dark p-4">Preço de venda</th>
            <th class="bg-gray-dark p-4">Margem de lucro</th>
            <th class="bg-gray-dark p-4">Valor em estoque</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
            <tr class="border-2">
                <td class="text-center py-1">{{ $item->name }}</td>
                <td class="text-center py-1">{{ $item->amount }}</td>
                <td class="text-center py-1">{{ $item->minimum_quantity }}</td>
                <td class="text-center py-1">{{ $item->max_quantity }}</td>
                <td class="text-center py-1">R$ {{ number_format(floatval($item->cost_price), 2) }}</td>
                <td class="text-center py-1">R$ {{ number_format(floatval($item->sale_price), 2) }}</td>
                <td class="text-center py-1">
                    {{ number_format((floatval($item->cost_price) / floatval($item->sale_price)) * 100, 2) }}%
                </td>
                <td class="text-center py-1">R$
                    {{ number_format(floatval($item->sale_price) * (int) $item->amount, 2) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
