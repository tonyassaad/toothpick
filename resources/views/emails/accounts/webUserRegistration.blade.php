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
                    <tr>
                        <td height="15"></td>
                    </tr>
                    <tr>
                        <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">
                            Hi {{$user->first_name}},</td>
                    </tr>
                    <tr>
                        <td height="15"></td>
                    </tr>
                    <tr>
                        <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">
                            Thank you for registering to our No1 Draft Pick portal and welcome to the N1DP family!
                        </td>
                    </tr>
                    <tr>
                        <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">
                            Click <a href="{{$messageBody['confirm_account_link']}}">here</a> to verify your email address and confirm your account.
                        </td>
                    </tr>
                    <tr>
                        <td height="15"></td>
                    </tr>
                    <tr>
                        <td style="font-family: 'Open Sans', sans-serif; color: #262262; font-size: 14px">
                            See you on the court!
                        </td>
                    </tr>
                    <tr>
                        <td height="15"></td>
                    </tr>
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