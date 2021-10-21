<!------ Include the above in your HEAD tag ---------->

            @foreach ($order_items as $order_item)
          <tr>

          <td>{{$order_item->product->name}}</td>
          <td>{{$order_item->price}}</td>
          <td>{{$order_item->quantity}}</td>
          <td>{{$order_item->size}}</td>
          <td>{{$order_item->discount_price ?? 0}}</td>
          <td>{{$order_item->total}}</td>
            <td></td>

          </tr>

          @endforeach
