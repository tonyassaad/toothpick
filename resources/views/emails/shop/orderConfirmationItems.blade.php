@foreach ($order_items as $order_item)

<tr>
    <td width="80%" style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px; text-align: left;">
        {{$order_item->product->name}}
    </td>
    <td width="10%" style="font-family: 'Open Sans', sans-serif; color: #262262;  text-align: left; font-size: 13px">
        {{$order_item->quantity}}
    </td>

    <td width="10%" style="font-family: 'Open Sans', sans-serif; color: #262262;  text-align: left; font-size: 13px" align="end">
        $ {{$order_item->price ?? 0}}
    </td>
</tr>

<tr>
    <td height="10"></td>
</tr>
<tr>
    <td width="80%" style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px">
        Subtotal:
    </td>
    <td width="10%" style="font-family: 'Open Sans', sans-serif; color: #262262;  text-align: left; font-size: 13px"></td>
    <td width="10%" style="font-family: 'Open Sans', sans-serif; color: #262262; text-align: left; font-size: 13px">
        $ {{$order_item->discount_price ?? 0}}
    </td>
</tr>

<tr>
    <td width="80%" style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px">
        Discount:
    </td>
    <td width="10%" style="font-family: 'Open Sans', sans-serif; color: #262262; text-align: left; font-size: 13px"></td>
    <td width="10%" style="font-family: 'Open Sans', sans-serif; color: #262262; text-align: left; font-size: 13px">
        $ {{$order_item->product->discount?? 0}}
    </td>
</tr>

<hr style="width: 100%;">
</hr>
@endforeach
<hr style="width: 100%;">
</hr>