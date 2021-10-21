@foreach ($children_event_attendees as $children_event_attendee)
<tr>
    <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px">
        Child Name:
    </td>
    <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px">
        {{$children_event_attendee->first_name}}
    </td>
</tr>
<tr>
<tr>
    <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px">
        Additional Information:
    </td>
    <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px">
        {{$children_event_attendee->message}}
    </td>
</tr>
<tr>
    <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px">
        Date of Birth:
    </td>
    <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px">
    {{\Carbon\Carbon::parse($children_event_attendee->dob)->format('d/m/y')}}
 
    </td>
</tr>

<tr>
    <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px">
        School:
    </td>
    <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 13px">
        {{$children_event_attendee->school_name}} - {{$children_event_attendee->suburb}}
    </td>
</tr>
@endforeach