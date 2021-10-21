<!------ Include the above in your HEAD tag ---------->

            @foreach ($order_items as $order_item)

            <tr>
                <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px; padding-left: 15px">{{$order_item->product->name}}
 <br>Size: {{$order_item->size}}<br>Qty: {{$order_item->quantity}}</td>
                <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px; padding-left: 15px">${{$order_item->price}}</td>
                <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px; padding-left: 15px">${{$order_item->discount_price ?? 0}}</td>
                <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px; padding-left: 15px">%{{$order_item->product->discount_percentage ?? 0}}</td>
                <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px; padding-left: 15px">${{$order_item->total}}</td>
            </tr>

          @endforeach
