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
                            Hi {{$coach['first_name']}} {{$coach['last_name']}},
                        </td>
					</tr>
					<tr><td height="15"></td></tr>
					<tr>
						<td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">
                            You have been allocated the following event:
                        </td>
                    </tr>
                    <tr><td height="15"></td></tr>
                    <tr>
						<td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">
                           {{$assigned_event['title']}}
                        </td>
                    </tr>
                    <tr>
						<td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">
                        {{$assigned_event_start_date}} - {{$assigned_event_end_date}}
                        </td>
                    </tr>
                    <tr>
						<td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">
                        {{$assigned_event['start_time']}}    {{$assigned_event['end_time']}}
                    </td>
                    </tr>
                    <tr>
						<td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">
                        {{$assigned_event['location']}}
                        </td>
                    </tr>
					<tr><td height="15"></td></tr>
					<tr>
						<td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">
                            For more information, please login to the N1DP Coach’s portal.
                        </td>
					</tr>
					<tr><td height="15"></td></tr>
					<tr>
                        <td>
                            <table width="180">
                                <tr>
                                    <td align="center" bgcolor="#D91C24" height="40" width="180"><a style="font-family: 'Open Sans', sans-serif; color: #fff; font-size: 11px; text-decoration: none; text-align: center; letter-spacing: 2px" target="" href="{{Config::get('general.front_end_uri')}}"><strong>LOGIN TO PORTAL</strong></a></td>
								</tr>
							</table>
						</td>
					</tr>
                    <tr><td height="15"></td></tr>
                    <tr>
                        <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">
                            If you have any questions, please do not hesitate to contact Marvin Bayer <a href="mailto:marvin@n1dp.com.au">marvin@n1dp.com.au</a>
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




