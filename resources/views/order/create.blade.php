<x-layout page="Criar novo pedido" title="Criar Pedido">
    <form action="" method="POST">
        @csrf
        <div>
            <label for="customer_name">Customer Name</label>
            <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name') }}">
        </div>
        <div>
            <label for="phone_number">Phone Number</label>
            <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}">
        </div>
        <div>
            <label for="address">Address</label>
            <input type="text" name="address" id="address" value="{{ old('address') }}">
        </div>
        <div>
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" id="cpf" value="{{ old('cpf') }}">
        </div>
        <div>
            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="processing" {{ old('status') == 'processing' ? 'selected' : '' }}>Processing</option>
                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>
        <div>
            <label for="total_amount">Total Amount</label>
            <input type="text" name="total_amount" id="total_amount" value="{{ old('total_amount') }}">
        </div>
        <div>
            <label for="items">Items</label>
            @foreach ($items as $item)
                <div>
                    <input type="checkbox" name="items[{{ $loop->index }}][item_id]" value="{{ $item->id }}"
                        id="item_{{ $item->id }}">
                    <label for="item_{{ $item->id }}">{{ $item->name }}</label>
                    <input type="text" name="items[{{ $loop->index }}][quantity]" placeholder="Quantity">
                    <input type="number" name="items[{{ $loop->index }}][price]" readonly
                        value={{ number_format(floatval($item->sale_price), 2) }} placeholder="Price">
                </div>
            @endforeach
        </div>
        <button type="submit">Create Order</button>
    </form>

</x-layout>
