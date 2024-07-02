<x-layout page="Criar novo pedido" title="Criar Pedido">
    <form class="border px-4" action="{{ route('order.store') }}" method="POST">
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

        <div class="flex flex-col">
            <label class="text-lg text-semibold" for="address">Endereco</label>
            <input class="px-2 py-0.5 rounded " type="text" name="address" id="address"
                value="{{ old('address') }}">
        </div>
        <div class="flex flex-col">
            <label class="text-lg text-semibold" for="cpf">CPF</label>
            <input class="px-2 py-0.5 rounded " type="text" name="cpf" id="cpf"
                value="{{ old('cpf') }}">
        </div>
        <div class="flex">
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
                <input class="px-2 py-0.5 rounded" type="text" name="total_amount" id="total_amount"
                    value="{{ old('total_amount') }}">
            </div>
        </div>

        <div class="flex flex-col">
            <label class="text-lg text-semibold" for="items">Items</label>
            <select class="px-2 py-0.5 rounded " id="itemSelect" onchange="createInputs()">
                <option value="" disabled selected>Escolha uma opção</option>
            </select>
            <div id="inputContainer"></div>
        </div>
        <button type="submit" class="mt-4 bg-green p-3 rounded font-bold text-white">Criar Pedido</button>
    </form>
    <script>
        var teste = ''
        document.addEventListener('DOMContentLoaded', function() {
            fetch('/items/search')
                .then(response => response.json())
                .then(data => {
                    teste = data
                    const selectedItem = document.getElementById('itemSelect')
                    data.forEach(element => {
                        var option = document.createElement("option")
                        option.value = element.id
                        option.text = element.name
                        selectedItem.appendChild(option)
                    });

                })
                .catch(error => {
                    console.error('Erro:', error);
                });
        });

        async function createInputs() {
            const container = document.getElementById('inputContainer');


            const selectedItem = document.getElementById('itemSelect').value;
            if (selectedItem) {
                const parametro = encodeURIComponent(selectedItem); // Substitua por seu valor dinâmico
                try {
                    const response = await fetch('/items/search/' + parametro);
                    const data = await response.json();

                    const inputGroup = document.createElement('div');
                    inputGroup.className = 'input-group';

                    const idInput = document.createElement('input')
                    idInput.type = 'text';
                    idInput.value = data[0].id;
                    idInput.hidden = true
                    idInput.name = `items[${data[0].id}][item_id]`;

                    const nameInput = document.createElement('input');
                    nameInput.type = 'text';
                    nameInput.value = data[0].name;
                    nameInput.placeholder = 'Nome';
                    nameInput.readOnly = true;
                    nameInput.setAttribute('class', 'px-2 py-0.5 rounded mr-1 ')

                    const quantityInput = document.createElement('input');
                    quantityInput.type = 'number';
                    quantityInput.placeholder = 'Quantidade';
                    quantityInput.name = `items[${data[0].id}][quantity]`;
                    quantityInput.setAttribute('class', 'px-2 py-0.5 rounded mr-1')

                    const valueInput = document.createElement('input');
                    valueInput.type = 'number';
                    valueInput.value = parseFloat(data[0].sale_price).toFixed(2);
                    valueInput.placeholder = 'Valor';
                    valueInput.readOnly = true;
                    valueInput.name = `items[${data[0].id}][price]`;
                    valueInput.setAttribute('class', 'px-2 py-0.5 rounded  ')

                    inputGroup.appendChild(idInput)
                    inputGroup.appendChild(nameInput);
                    inputGroup.appendChild(quantityInput);
                    inputGroup.appendChild(valueInput);
                    inputGroup.setAttribute('class', 'mt-1 w-full')

                    container.appendChild(inputGroup);
                    container.setAttribute('class', 'mt-2 w-full')

                } catch (error) {
                    console.error('Erro:', error);
                }
            }
        }
    </script>

</x-layout>
