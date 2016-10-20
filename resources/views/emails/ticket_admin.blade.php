
<td align="center" valign="top" id="m_-4172052036040825163bodyCell">
    <table border="0" cellpadding="0" cellspacing="0" id="m_-4172052036040825163templateContainer">
        <tbody><tr>
            <td align="center" valign="top">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" id="m_-4172052036040825163templateHeader">
                    <tbody><tr>
                        <td valign="top" class="m_-4172052036040825163headerContent">
                            <img src="{{Url('/')}}/front/images/logo.png" style="max-width:600px;padding:20px 20px 0 20px" id="m_-4172052036040825163headerImage"  class="CToWUd">
                        </td>
                    </tr>
                    </tbody></table>
            </td>
        </tr>
        <tr>
            <td align="center" valign="top">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" id="m_-4172052036040825163templateBody">
                    <tbody><tr>
                        <td valign="top" class="m_-4172052036040825163bodyContent">
                            <p>Ticket #<a href="{{Url('/')}}/admin/ticktes/{{$ticket_id}}" target="_blank" ><strong>{{$ticket_id}}</strong></a> has had a new reply posted by <strong>{{$name}}</strong>.</p>
                            <table class="m_-4172052036040825163keyvalue-table" style="border-collapse:collapse">
                                <tbody>
                                <tr>

                                </tr>
                                </tbody>
                            </table>
                            <div class="" style="margin:15px 0 ;padding: 15px ; background-color:#f9f9f9 ; border-radius:4px; ">
                                <p>
                                    {{$replay}}
                                </p>
                            </div>
                            <p>You can respond to this ticket by simply replying to this email or through the admin area at the url below.</p>
                            <p><a href="{{Url('/')}}/admin/ticktes/{{$ticket_id}}" target="_blank" > {{Url('/')}}/admin/ticktes/{{$ticket_id}} </a></p>
                        </td>
                    </tr>
                    </tbody></table>
            </td>
        </tr>
        <tr>
            <td align="center" valign="top">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" id="m_-4172052036040825163templateFooter">
                    <tbody>
                    <tr>
                        <td style="background-color: #F8f8f8; color: grey;font-size: 10px;padding: 20px">
                            <a href="{{Url('/')}}/" target="_blank" > {{Url('/')}} </a>&nbsp;
                            <a href="{{Url('/')}}/admin/" target="_blank" >log in to the admin area</a>&nbsp;
                        </td>
                    </tr>
                    </tbody></table>
            </td>
        </tr>
        </tbody></table>
</td>
