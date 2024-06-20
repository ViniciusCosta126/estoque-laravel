<x-layout title="Home" page="Itens estoque">
    <table class="border-collapse overflow-y-auto">
        <thead>
            <tr class="border-2 border-dark text-white">
                <th class="bg-gray-dark p-4">Nome</th>
                <th class="bg-gray-dark p-4">Quantidade</th>
                <th class="bg-gray-dark p-4">Quantidade minima</th>
                <th class="bg-gray-dark p-4">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr class="border-2">
                    <td class="text-center py-1">{{ $item->name }}</td>
                    <td class="text-center py-1">{{ $item->amount }}</td>
                    <td class="text-center py-1">{{ $item->minimum_quantity }}</td>
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
</x-layout>
