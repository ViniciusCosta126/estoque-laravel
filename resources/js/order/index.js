var dataItems = ''
document.addEventListener('DOMContentLoaded', function() {
    fetch('/items/search')
        .then(response => response.json())
        .then(data => {
            dataItems = data
            const selectedItem = document.getElementById('itemSelect')
            data.forEach(element => {    
                if(parseInt(element.amount) !== 0 ){
                    var option = document.createElement("option")
                    option.value = element.id
                    option.text = element.name
                    selectedItem.appendChild(option)
                }
            });

        })
        .catch(error => {
            console.error('Erro:', error);
        });

        /* Inicio função para criar evento para adiconar os itens a lista */
        const selectedItem = document.getElementById('itemSelect')
        selectedItem.addEventListener("change",async ()=>{
            const container = document.getElementById('inputContainer');


            const selectedItem = document.getElementById('itemSelect').value;
            if (selectedItem) {
                const parametro = encodeURIComponent(selectedItem); 
                try {
                    const response = await fetch('/items/search/' + parametro);
                    const data = await response.json();

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
                    nameInput.setAttribute('class', 'px-2 py-0.5 rounded ')
        
                    const quantityInput = document.createElement('input');
                    quantityInput.type = 'number';
                    quantityInput.placeholder = 'Quantidade';
                    quantityInput.name = `items[${data[0].id}][quantity]`;
                    quantityInput.setAttribute('class', 'px-2 py-0.5 rounded quantidade')
                    quantityInput.addEventListener('change',()=>{
                        setValorTotal()
                    })
        
                    const valueInput = document.createElement('input');
                    valueInput.type = 'number';
                    valueInput.value = parseFloat(data[0].sale_price).toFixed(2);
                    valueInput.placeholder = 'Valor';
                    valueInput.readOnly = true;
                    valueInput.name = `items[${data[0].id}][price]`;
                    valueInput.setAttribute('class', 'px-2 py-0.5 rounded valor-produto')

                    const quantidadeDisponivel = document.createElement('input');
                    quantidadeDisponivel.type = 'number';
                    quantidadeDisponivel.value = parseInt(data[0].amount);
                    quantidadeDisponivel.readOnly = true;
                    quantidadeDisponivel.setAttribute('class', ' px-2 py-0.5 rounded')
        
                    container.appendChild(idInput)
                    container.appendChild(nameInput);
                    container.appendChild(quantityInput);
                    container.appendChild(quantidadeDisponivel)
                    container.appendChild(valueInput);
                    container.setAttribute('class', 'mt-2 grid grid-cols-4 mt-2 gap-1')
                } catch (error) {
                    console.error('Erro:', error);
                }
            }
        })
});


const setValorTotal = ()=>{
    var valoresProduto = document.querySelectorAll(".valor-produto")
    var quantidadeProduto = document.querySelectorAll(".quantidade")

    var valorTotal = 0

    quantidadeProduto.forEach((produto,index)=>{
        valorTotal += parseInt(produto.value) * parseFloat(valoresProduto[index].value)
    })

    document.querySelector('#total_amount').value = valorTotal.toFixed(2)
}