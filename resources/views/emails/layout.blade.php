<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KK-BOOST</title>
</head>
<body style="margin:0; padding:0; background-color:#05070b; font-family:Arial, Helvetica, sans-serif; color:#ffffff;">

    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color:#05070b; margin:0; padding:40px 0;">
        <tr>
            <td align="center">
                <table role="presentation" width="680" cellspacing="0" cellpadding="0" style="width:680px; max-width:680px; background:linear-gradient(180deg,#0a0d14 0%,#090c13 100%); border:1px solid rgba(255,255,255,0.08); border-radius:24px; overflow:hidden; box-shadow:0 20px 60px rgba(0,0,0,0.40);">

                    <tr>
                        <td style="padding:28px 32px; border-bottom:1px solid rgba(255,255,255,0.06); background:linear-gradient(90deg,rgba(220,38,38,0.16),rgba(249,115,22,0.10),rgba(5,7,11,0));">
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="left" style="width:72px;">
                                        <div style="width:54px; height:54px; border-radius:14px; background:#0f172a; border:1px solid rgba(255,255,255,0.08); text-align:center; line-height:54px; font-weight:700; color:#ffffff;">
                                            KK
                                        </div>
                                    </td>
                                    <td align="left">
                                        <div style="font-size:24px; font-weight:700; letter-spacing:0.16em; color:#ffffff;">
                                            KK-BOOST
                                        </div>
                                        <div style="font-size:12px; letter-spacing:0.28em; color:#94a3b8; text-transform:uppercase; margin-top:6px;">
                                            INDIVIDUAL CHIPTUNING
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:36px 32px;">
                            @yield('content')
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:24px 32px; border-top:1px solid rgba(255,255,255,0.06); font-size:13px; line-height:1.8; color:#94a3b8;">
                            {{ __('contact_mail.layout_footer_1') }} <strong style="color:#ffffff;">KK-BOOST</strong>.<br>
                            {{ __('contact_mail.layout_footer_2') }}
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>