<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body>
	<table width="600" align="center">
        @include('layouts.edm-header')
        <tr>
			<tr>
				<td>
					<table width="100%" bgcolor="#FAFAFA">
						<tr><td height="15"></td></tr>
						<tr>
							<td>
								<table width="495" align="center">
									<tr>
										<td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">Hi Super Admin,</td>
									</tr>
									<tr><td height="15"></td></tr>
									<tr>
										<td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">A new order has been submitted from the webstore.</td>
									</tr>
									<tr><td height="15"></td></tr>

								</table>
							</td>
						</tr>
						<tr>
							<td>
								<table width="495" align="center">
									<tr>
										<td width="140" style="font-family: 'Open Sans', sans-serif; color: #79769F; font-size: 14px">Customer Name:</td>
										<td width="343" style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">{{$order->customerhippingAddress->first_name ?? Null}} {{$order->customerhippingAddress->first_name ?? Null}}</td>
									</tr>
									<tr>
										<td width="140" style="font-family: 'Open Sans', sans-serif; color: #79769F; font-size: 14px">Address:</td>
										<td width="343" style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">{{$order->customerhippingAddress->street_address ?? Null}} {{$order->customerhippingAddress->suburb ?? Null}}</td>
									</tr>
									<tr>
										<td width="140" style="font-family: 'Open Sans', sans-serif; color: #79769F; font-size: 14px">Email:</td>
										<td width="343" style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px"> {{$order->customerhippingAddress->email ?? Null}}</td>
									</tr>
									<tr>
										<td width="140" style="font-family: 'Open Sans', sans-serif; color: #79769F; font-size: 14px">Phone Number:</td>
										<td width="343" style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">{{$order->customerhippingAddress->mobile ?? Null}}</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr><td height="15"></td></tr>
					</table>
				</td>
			</tr>

		</tr>
        <tr><td height="30"></td></tr>

        {{-- itemss startttt --}}

        <tr>
			<td>
				<table width="495" align="center">
					<tr bgcolor="#FAFAFA" height="40">
						<td width="335" style="font-family: 'Open Sans', sans-serif; color: #79769F; font-size: 14px; padding-left: 15px">Item Description</td>
						<td width="79" style="font-family: 'Open Sans', sans-serif; color: #79769F; font-size: 14px; padding-left: 15px">Unit Price</td>
						<td width="90" style="font-family: 'Open Sans', sans-serif; color: #79769F; font-size: 14px; padding-left: 15px">discount Price</td>
						<td width="90" style="font-family: 'Open Sans', sans-serif; color: #79769F; font-size: 14px; padding-left: 15px">discount Percentage</td>
						<td width="65" style="font-family: 'Open Sans', sans-serif; color: #79769F; font-size: 14px; padding-left: 15px">Total</td>
					</tr>
                    <tr><td height="15"></td></tr>

                  {{-- loop itemss startttt --}}
                  @include('emails.shop.orderSubmittedItems',['order_items'=>$order->orderItems])
          {{-- loop itemss end --}}

				</table>
			</td>
		</tr>
		<tr><td height="15"></td></tr>
		<tr>
			<td>
				<table width="495" align="center">
					<tr height="1" bgcolor="#E6E6E6"><td></td></tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<table width="495" align="center">
					{{-- <tr>
						<td width="209" style="font-family: 'Open Sans', sans-serif; color: #79769F; font-size: 14px; padding-left: 15px"></td>
						<td width="205" style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px; padding-left: 15px">Subtotal</td>
						<td width="65" style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px; padding-left: 15px">$29.95</td>
					</tr> --}}

					<tr>
						<td width="209" style="font-family: 'Open Sans', sans-serif; color: #79769F; font-size: 14px; padding-left: 15px"></td>
						<td width="205" style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px; padding-left: 15px">Grand Total</td>
						<td width="65" style="font-family: 'Open Sans', sans-serif; color: #D91C24; font-size: 14px; padding-left: 15px">${{$order->total}}</td>
					</tr>

				</table>
			</td>
		</tr>

        {{-- item endd --}}

        @include('layouts.edm-footer')

	</table>

</body>
</html>

