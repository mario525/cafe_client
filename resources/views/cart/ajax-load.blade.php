<div id="load_cart" style="position: relative;">
     <a id="counter2" class="hidden" value="{{$cart_counter}}"></a>
    <table class="w-full text-sm text-left text-gray-500   ">
        <thead class="text-xs text-slate-100 uppercase bg-blue-500 my-2 pt-3">
            <tr class="text-center">
                <th scope="col" class="py-3 px-6">

                </th>
                <th scope="col" class="py-3 px-6">

                </th>
                <th scope="col" class="py-3 px-16">
                    Product Name
                </th>
                <th scope="col" class="py-3 px-6">
                    Price
                </th>
                <th scope="col" class="py-3 px-6">
                    Quantity
                </th>
                <th scope="col" class="py-3 px-6">
                    Total
                </th>
            </tr>
        </thead>
        <tbody>

            @foreach ($carts as $item)
                <tr class="bg-white border-b ">
                    <td>
                        <button type="button" onclick="removeCart('{{ $item->rowId }}')"
                            class="bg-red-500 text-white rounded-full w-8 h-8">X</button>

                    </td>
                    <td class="image-prod">
                        <img src="https://mdbootstrap.com/img/new/standard/city/041.jpg"
                            class="p-1 bg-white border rounded w-40" alt="..." />
                    </td>
                    <td class="py-4 px-6">
                        {{ $item->name }}
                    </td>
                    <td class="py-4 px-6">
                        ${{ $item->price }}
                    </td>
                    <td class="quantity py-4  ftco-cart">
                        <div class="input-group mb-3">
                            <button type="button" class="px-4 w-full sm:max-w-fit bg-slate-50"
                                onclick="updateCart('{{ $item->rowId }}', ( Number({{ $item->qty }}) - Number(1)))">-
                            </button>
                            <input type="text" name="quantity"
                                class="quantity form-control input-number"
                                value="{{ $item->qty }}" min="1" max="100">
                            <button type="button" class="px-4  w-full sm:max-w-fit bg-slate-50"
                                onclick="updateCart('{{ $item->rowId }}', ( Number({{ $item->qty }}) + Number(1)))">+</button>
                        </div>

                    </td>
                    <td class="py-4 px-6">
                        ${{ $item->subtotal }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

