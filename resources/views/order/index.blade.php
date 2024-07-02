<x-layout title="Pedidos" page="Todos o pedidos">
    @if ($mensagemSucesso)
        <div class="bg-green-light rounded w-fit px-2 py-1 mb-2">
            <p class="text-xl text-bold text-white">{{ $mensagemSucesso }}</p>
        </div>
    @endif
    <table class="border-collapse overflow-y-auto">
        <thead>
            <tr class="border-2 border-dark text-white">
                <th class="bg-gray-dark p-4">Nº Pedido</th>
                <th class="bg-gray-dark p-4">Comprador</th>
                <th class="bg-gray-dark p-4">CPF</th>
                <th class="bg-gray-dark p-4">Numero Telefone</th>
                <th class="bg-gray-dark p-4">Status</th>
                <th class="bg-gray-dark p-4">Valor total</th>
                <th class="bg-gray-dark p-4">Endereco</th>
                <th class="bg-gray-dark p-4">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr class="border-2">
                    <td class="text-center py-1">
                        <a href="" class="underline underline-offset-2">
                            {{ $order->id }}
                        </a>
                    </td>
                    <td class="text-center py-1 px-2">
                        <a href="" class="underline underline-offset-1">
                            {{ $order->customer_name }}
                        </a>
                    </td>
                    <td class="text-center py-1">{{ $order->cpf }}</td>
                    <td class="text-center py-1">{{ $order->phone_number }}</td>
                    <td class="text-center py-1">{{ $order->status }}</td>
                    <td class="text-center py-1">{{ $order->total_amount }}</td>
                    <td class="text-center py-1">{{ $order->address }}</td>

                    <td class="flex justify-evenly py-1">
                        <a href="">
                            <i class="fas text-yellow fa-edit"></i>
                        </a>
                        <form action="" method="POST">
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
        <a href="" class="text-2xl text-green cursor-pointer"><i class="far fa-file-excel"></i></a>
        <a href="" class="text-2xl ml-2 cursor-pointer text-red"><i class="far fa-file-pdf"></i></a>
    </div>
</x-layout>
