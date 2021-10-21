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
			<td>
				<table width="495" align="center">
					<tr><td height="15"></td></tr>
					<tr>
						<td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px;">Hi {{$parent['first_name']}}
							{{$parent['last_name']}},
						</td>
					</tr>
					<tr>
						<td height="15"></td>
					</tr>
					<tr>
						<td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px;">{{$coupon['message']}} </td>
					</tr>
					<tr>
						<td height="15"></td>
					</tr>
					<tr>
						<td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px;">Your Voucher code: {{$coupon['code']}} </td>
					</tr>
					<tr>
						<td height="15"></td>
					</tr>

					<tr>
						<td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px;"> Expiry Date {{$expiry_date}}</td>
					</tr>
					<tr>
						<td height="15"></td>
					</tr>


					<tr>
						<td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px;">Visit our <a href="{{Config::get('general.website_uri')}}"> website </a> and redeem this voucher to get the discount.</td>
					</tr>


					<tr>
						<td height="15"></td>
					</tr>
					<tr>
						<td>
							<table width="180">
								<tr>
									<td align="center" bgcolor="#D91C24" height="40" width="180"><a style="font-family: 'Open Sans', sans-serif; color: #fff; font-size: 11px; text-decoration: none; text-align: center; letter-spacing: 2px;font-weight:bold;" target="" href="{{Config::get('general.website_uri')}}"><strong>SEE MORE EVENTS</strong></a></td>
								</tr>
							</table>
						</td>

					</tr>
					<tr>
						<td height="40"></td>
					</tr>
				</table>
			</td>
		</tr>


		@include('layouts.edm-footer')

	</table>

</body>

</html>