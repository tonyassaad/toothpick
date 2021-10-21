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
						<td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">Hi {{$member['first_name']}},</td>
					</tr>
					<tr><td height="15"></td></tr>
					<tr>
                    <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">
                        N1DP would like to invite you to our {{$event->title}}
                    </td>
					</tr>
					<tr><td height="15"></td></tr>
					<tr>
                        <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">
						{{$event_start_date ?? Null }} to	{{$event_end_date ?? Null}}    
                        </td>
					</tr>
					<tr>
                        <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">
						{{$event_start_time ?? Null}} to	{{$event_end_time ?? Null}}           
                        </td>
					</tr>
					<tr>
                        <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">
						{{$event->location}} - {{$event->venue}}
                        </td>
					</tr>

					
					<tr><td height="15"></td></tr>
					<tr>
                        <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">
					 {{$mail_body ?? Null}}
                        </td>
					</tr>
				 
					<tr><td height="15"></td></tr>
					<tr>
                        <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">
                            For more information, please check event details from our website
                        </td>
					</tr>
                    <tr><td height="15"></td></tr>
					@if($include_link_to_event==='true' || $include_link_to_event===true)
					<tr>
                        <td>
                            <table width="180">
                                <tr>
                                    <td align="center" bgcolor="#D91C24" height="40" width="180"><a style="font-family: 'Open Sans', sans-serif; color: #fff; font-size: 11px; text-decoration: none; text-align: center; letter-spacing: 2px" target="" href="{{Config::get('general.website_uri')}}/events/category/event_detail/{{$event->id}}"><strong>SEE EVENT DETAILS</strong></a></td>
								</tr>
							</table>
						</td>
					</tr>
					@endif
                    <tr><td height="15"></td></tr>
					<tr>
						<td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">
                            Thank you for your continuous support!
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

