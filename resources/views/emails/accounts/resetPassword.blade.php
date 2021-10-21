<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body bgcolor="#F9F9FC">
	<table width="600" align="center">
        @include('layouts.edm-header')

		<tr>
			<td>
				<table width="495" align="center">
                    <tr><td height="15"></td></tr>
					<tr>
						<td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">
                            Hi {{$user['first_name']}} {{$user['last_name']}},
                        </td>
					</tr>
                    <tr><td height="15"></td></tr>
					<tr>
						<td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">
                            A password reset has been requested.
                        </td>
                    </tr>
					<tr>
						<td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">
                            To reset your N1DP account password, follow the link below.
                        </td>
                    </tr>
                    <tr><td height="15"></td></tr>
                    <tr>
                        <td>
                            <table width="180">
                                <tr>
                                    <td align="center" bgcolor="#D91C24" height="40" width="180"><a style="font-family: 'Open Sans', sans-serif; color: #fff; font-size: 11px; text-decoration: none; text-align: center; letter-spacing: 2px" target="" href="{{$resetlink}}"><strong>RESET PASSWORD</strong></a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr><td height="15"></td></tr>
                    <tr>
						<td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">
                            Kindest regards,
                        </td>
					</tr>
                    <tr>
						<td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">
                            N1DP
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

