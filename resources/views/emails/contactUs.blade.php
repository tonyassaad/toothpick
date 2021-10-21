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
					<tr>
						<td  width="500" style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">You have New Inquiry from {{$data['first_name']}}
                            {{$data['last_name']}},</td>
					</tr>
                    <tr><td height="15"></td></tr>


                    <tr>
                        <td width="140" style="font-family: 'Open Sans', sans-serif; color: #79769F; font-size: 14px"> Mobile:</td>
                        <td width="343" style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px"> {{$data['mobile']}}</td>
                    </tr>
                    <tr><td height="15"></td></tr>
                <tr>
                        <td width="140" style="font-family: 'Open Sans', sans-serif; color: #79769F; font-size: 14px"> Message:</td>
                        <td width="343" style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px"> {{$data['message']}}</td>
                    </tr>



                    </tr>
					<tr><td height="15"></td></tr>
					<tr>
						<td>
							<table width="180">
								<tr>
									<td align="center" bgcolor="#D91C24" height="40" width="180"><a style="font-family: 'Open Sans', sans-serif; color: #fff; font-size: 11px; text-decoration: none; text-align: center; letter-spacing: 2px" target="" href="https://no1draftpick.adcreatorsdemo.com.au"><strong>SEE MORE EVENTS</strong></a></td>
								</tr>
							</table>
						</td>

					</tr>
					<tr><td height="40"></td></tr>
				</table>
			</td>
		</tr>


        @include('layouts.edm-footer')

	</table>

</body>
</html>

