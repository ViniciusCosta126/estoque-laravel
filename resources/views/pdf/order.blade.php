<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        .table {
            width: 100%;
            border-collapse: collapse
        }

        .table th,
        .table td {
            padding: 0.5rem;
            border: 1px solid black;
            text-align: left;
        }

        .table td.not-border {
            border: none;
            border-right: 1px solid black;
            border-left: 1px solid black;
        }

        .table td.not-border-bottom {
            border-bottom: none
        }

        .not-border-td {
            border: none !important;
            border-bottom: 1px solid black !important;
        }

        .border-right {
            border-right: 1px solid black !important;
        }

        .border-left {
            border-left: 1px solid black !important;
        }

        .border-top {
            border-top: 1px solid black !important;
        }

        .table td.border-bottom {
            border-bottom: 1px solid black;
        }

        .table th {
            background-color: rgb(147, 168, 172);
            font-weight: bold;
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

        .bg-gray {
            background-color: rgb(147, 168, 172)
        }
    </style>
</head>

<body>
    <div>
        <h1 class="font-bold text-2xl">Pedido - Nº {{ $order->id }}</h1>

        <table class="table">
            <thead>
                <tr>
                    <th colspan="2" class="bg-gray text-xl font-bold border pl-1">Cliente</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="not-border-bottom font-bold">Nome do cliente</td>
                    <td class="not-border-bottom font-bold">Telefone</td>
                </tr>
                <tr>
                    <td class="not-border">{{ $order->customer_name }}</td>
                    <td class="not-border">{{ $order->phone_number }}</td>
                </tr>
                <tr>
                </tr>
                <tr>
                    <td class="not-border-bottom font-bold">Endereço</td>
                    <td class="not-border-bottom font-bold">CPF</td>
                </tr>
                <tr>
                    <td class="not-border border-bottom">{{ $order->address }}</td>
                    <td class="not-border border-bottom">{{ $order->cpf }}</td>
                </tr>
            </tbody>
        </table>

        <p class="bg-gray font-bold " style="padding: 0.25rem;">Itens do pedido</p>
        <table class="table">

            <thead>
                <tr>
                    <th class="bg-gray font-bold p-1 not-border-td border-left border-top">
                        Nome Produto</th>
                    <th class="bg-gray font-bold p-1 not-border-td border-top">Quantidade
                    </th>
                    <th class="bg-gray font-bold p-1 not-border-td border-top">Valor Unitário
                    </th>
                    <th class="bg-gray font-bold p-1 not-border-td border-right border-top">
                        Valor total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                    <tr>
                        <td class="not-border-td border-left">{{ $item->name }}</td>
                        <td class="not-border-td">{{ $item->getOriginal()['pivot_quantity'] }}</td>
                        <td class="not-border-td">R$ {{ number_format((float) $item->getOriginal()['pivot_price'], 2) }}
                        </td>
                        <td class="not-border-td border-right">
                            R${{ number_format((float) $item->getOriginal()['pivot_price'] * (int) $item->getOriginal()['pivot_quantity'], 2) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <table class="table">
            <tbody>
                <tr>
                    <td colspan="2" class="bg-gray pl-1 gap-x-20 rounded-b py-2">
                        <p><span class="font-bold">Data do pedido:</span> {{ $order->created_at }}</p>
                        <p><span class="font-bold">Valor total:</span> R$
                            {{ number_format((float) $order->total_amount, 2) }}</p>
                        <p><span class="font-bold">Contato:</span> (16) 99613-1443</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
