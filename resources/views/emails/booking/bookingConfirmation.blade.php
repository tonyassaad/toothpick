<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
</head>
​

<body bgcolor="#F9F9FC">
    <table width="600" align="center">
        @include('layouts.edm-header')
        ​
        ​
        <tr>
            <td>
                <table width="100%" bgcolor="#EEF0F1" align="center">
                    <tr align="center">
                        <td>
                            <table width="495">
                                <tr>
                                    <td height="5"></td>
                                </tr>
                                <tr align="center">
                                    <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px">
                                        BOOKING DETAILS - {{$booking_details->booking_code}}
                                    </td>
                                </tr>
                                <tr>
                                    <td height="5"></td>
                                </tr>
                                <tr align="center">
                                    <td style="font-family: 'Open Sans', sans-serif; font-weight: bold; color: #262262; font-size: 16px; white-space: nowrap;">
                                        {{$booking_details->event->title}}
                                    </td>
                                </tr>
                                <tr>
                                    <td height="5"></td>
                                </tr>
                                <tr align="center">
                                    <td>
                                        <table width="100%">
                                            <tr>
                                                <td width="50" style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px">
                                                    Dates:
                                                </td>
                                                <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px">
                                                    {{$event_start_date}} To {{$event_end_date}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="50" style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px">
                                                    Venue:
                                                </td>
                                                <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px">
                                                    {{$booking_details->event->venue}}, {{$booking_details->event->location}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="50" style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px">
                                                    Time:
                                                </td>
                                                <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px">
                                                    {{$event_start_time}} - {{$event_end_time}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="5"></td>
                                            </tr>
                                            ​
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                ​
                ​
                <table width="100%" align="center">
                    <tr align="center">
                        <td>
                            <table width="495">
                                <tr>
                                    <td height="5"></td>
                                </tr>
                                <tr align="center">
                                    <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px">
                                        PURCHASER INFORMATION
                                    </td>
                                </tr>
                                <tr>
                                    <td height="5"></td>
                                </tr>
                                <tr align="center">
                                    <td>
                                        <table width="100%">
                                            <tr>
                                                <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px">
                                                    Purchaser Name: </td>
                                                <td>
                                                    ​
                                                    {{$booking_details->parent->first_name }} {{$booking_details->parent->last_name}}

                                                </td>
                                            </tr>
                                            ​
                                            <tr>
                                                <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px">
                                                    Purchaser Email: </td>
                                                <td> {{$booking_details->parent->email }}</td>
                                            </tr>

                                            <tr>
                                                <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px">
                                                    Purchaser Mobile: </td>
                                                <td> {{$booking_details->parent->mobile}}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="5"></td>
                                </tr>
                                ​
                            </table>
                        </td>
                    </tr>
                    ​
                </table>

                <table width="100%" align="center">
                    <tr align="center">
                        <td>
                            <table width="495">
                                <tr>
                                    <td height="5"></td>
                                </tr>
                                <tr align="center">
                                    <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px">
                                        ATTENDEE INFORMATION
                                    </td>
                                </tr>
                                <tr>
                                    <td height="5"></td>
                                </tr>
                                <tr align="center">
                                    <td>
                                        <table width="100%">
                                            {{-- loop attenddes startttt --}}
                                            @include('emails.booking.bookingConfirmationAttendees',['children_event_attendees'=> $children_event_attendees])
                                            {{-- loop attenddes end --}}
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="5"></td>
                                </tr>
                                ​
                            </table>
                        </td>
                    </tr>
                    ​
                </table>
                <table width="100%" bgcolor="#EEF0F1" align="center">
                    <tr align="center">
                        <td>
                            <table width="495">
                                <tr>
                                    <td height="5"></td>
                                </tr>
                                <tr align="center">
                                    <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px">
                                        TAX INVOICE - {{$booking_details->eventBookingPayment->id}}
                                    </td>
                                </tr>
                                <tr align="center">
                                    <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 10px">
                                        NO1 DRAFT PICK PTY LTD - ABN 71 166 532 303
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

                                            <tr>
                                                <td width="80%" style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px; text-align: left;">
                                                    {{$booking_details->event->title}}
                                                </td>
                                                <td width="10%" style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px; text-align: left;">
                                                    {{count($booking_details->bookingDetails)}}
                                                </td>
                                                <td width="10%" style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px; text-align: left;">
                                                $ {{$event_amount}}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td height="10"></td>
                                            </tr>

                                            <tr>
                                                <td width="80%" style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px; text-align: left;">
                                                    Subtotal:
                                                </td>
                                                <td width="10%" style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px; text-align: left;">
                                                </td>
                                                <td width="10%" style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px; text-align: left;">
                                                    $ {{$booking_details->eventBookingPayment->sub_total}}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td width="80%" style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px; text-align: left;">
                                                    Discount:
                                                </td>
                                                <td width="10%" style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px; text-align: left;">
                                                </td>
                                                <td width="10%" style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px; text-align: left;">
                                                    $ {{$booking_details->eventBookingPayment->discount}}
                                                </td>
                                            </tr>

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
                                                    $ {{$booking_details->eventBookingPayment->total_dollar}}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td height="10"></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        @include('layouts.edm-footer')

    </table>
</body>

</html>