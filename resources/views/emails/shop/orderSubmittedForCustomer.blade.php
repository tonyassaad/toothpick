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
										<td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">
                                            Dear {{$customerShipping->first_name}},</td>
									</tr>
									<tr><td height="15"></td></tr>
									<tr>
										<td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">Thank you for ordering in the No1 Draft Pick Official Webstore.</td>
									</tr>
									<tr><td height="15"></td></tr>
									<tr>
										<td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">Your payment is successful and we are now in the process of fulfilling your order. Should any of your articles be unavailable we will contact you as soon as possible.</td>
									</tr>
									<tr><td height="15"></td></tr>
									<tr>
										<td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">Once your order is shipped, you will receive an e-mail notification.</td>
									</tr>
									<tr><td height="15"></td></tr>
									<tr>
										<td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">If you have any questions we are more than happy to help you. Please reply to this email, or email us at <a style="color: #D91C24" href="mailto:#D91C24">support@n1draftpick.com.au.</a></td>
									</tr>
									<tr><td height="15"></td></tr>
									<tr>
										<td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">{{$customerShipping->street_address}} ,{{$customerShipping->suburb}}</td>
									</tr>
									<tr><td height="15"></td></tr>

								</table>
							</td>
						</tr>
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

