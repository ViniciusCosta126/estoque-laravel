<x-layout title="Home" page="Itens estoque">
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
                <th class="bg-gray-dark p-4">Ações</th>
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
                    <td class="flex justify-evenly py-1">
                        <a href="{{ route('item.edit', $item->id) }}">
                            <i class="fas text-yellow fa-edit"></i>
                        </a>
                        <form action="{{ route('item.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><i class="fas text-red fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="flex mt-2 justify-end">
        <a href="{{ route('download') }}" class="text-2xl text-green cursor-pointer"><i
                class="far fa-file-excel"></i></a>
        <a href="{{ route('download-pdf') }}" class="text-2xl ml-2 cursor-pointer text-red"><i
                class="far fa-file-pdf"></i></a>
    </div>
</x-layout>
