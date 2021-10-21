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
						<td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">Hi {{$member['first_name']}}
                            {{$member['last_name']}},</td>
					</tr>
					<tr><td height="15"></td></tr>
					<tr>
                        <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">
                            This email is to confirm that our {{$canceledEvent->title}} has been cancelled.
                        </td>
					</tr>
					<tr><td height="15"></td></tr>
					<tr>
						<td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">
                           {{$canceledEvent->booking_code}}
                        </td>
					</tr>
					<tr>
						<td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">
                           {{$canceledEvent->title}}
                        </td>
					</tr>
					<tr>
						<td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">
						{{$canceledEvent->start_date}} to	{{$canceledEvent->end_date}}
                        </td>
					</tr>
					<tr>
						<td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">
							{{$canceled_event_start_time}}   {{$canceled_event_end_time}} 
                        </td>
					</tr>
					<tr>
						<td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">
						{{$canceledEvent->location}}
                        </td>
					</tr>
					<tr><td height="15"></td></tr>
					<tr>
                        <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">
                            Your registration has been credited, and an email will be sent shortly to confirm your credit voucher for use on our online store or any future event.
                        </td>
                    </tr>
                    <tr><td height="15"></td></tr>
					<tr>
                        <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">
                            Thank you for your continuous support and we look forward to seeing you back on the court!
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

