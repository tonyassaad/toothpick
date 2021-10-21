<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
</head>

<body bgcolor="#F9F9FC">
    <table width="600" align="center">
        @include('layouts.edm-header')

        <tr align="center">
            <td>
                <table width="495">
                    <tr>
                        <td height="5"></td>
                    </tr>
                    <tr align="center">
                        <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px">
                            TAX INVOICE - {{$order->order_number}}
                        </td>
                    </tr>
                    <tr align="center">
                        <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 10px">
                            NO1 DRAFT PICK PTY LTD - ABN 71 168 532 303
                        </td>
                    </tr>
                    <tr>
                        <td height="5"></td>
                    </tr>
                    <tr align="center">
                        <td>
                            <table width="100%">

                                <tr>
                                    <td width="80%" style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px; text-align: left;">
                                        PRODUCT
                                    </td>
                                    <td width="10%" style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px; text-align: left;">
                                        QTY
                                    </td>
                                    <td width="10%" style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px; text-align: left;">
                                        PRICE
                                    </td>
                                </tr>
                                {{-- loop itemss startttt --}}
                                @include('emails.shop.orderConfirmationItems',['order_items'=>$order->orderItems])
                                {{-- loop itemss end --}}

                                <tr>
                                    <td height="10"></td>
                                </tr>
                                <tr>
                                    <td width="80%" style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px; text-align: left;">
                                        TOTAL:
                                    </td>
                                    <td width="10%" style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px; text-align: left;">
                                    </td>
                                    <td width="10%" style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px; text-align: left;">
                                        $ {{$order->total}}
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10"></td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px">
                            Shipping Address:{{$order->customerhippingAddress->first_name ?? Null}} {{$order->customerhippingAddress->first_name ?? Null}}
                            {{$order->customerhippingAddress->street_address ?? Null}} {{$order->customerhippingAddress->suburb ?? Null}}
                        </td>
                    </tr>
                    <tr>
                        <td height="10"></td>
                    </tr>
                </table>
            </td>
        </tr>

        @include('layouts.edm-footer')

    </table>

</body>

</html>