<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', config('company.name'))</title>
    <!--[if mso]>
    <style type="text/css">
        body, table, td { font-family: Arial, Helvetica, sans-serif !important; }
    </style>
    <![endif]-->
</head>
<body style="margin:0;padding:0;background-color:#f4f4f5;font-family:'Segoe UI',Roboto,Helvetica,Arial,sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;">
@php
    $brandName = $companyName ?? config('company.name', 'VanTroZ');
    $logoUrl = $logoUrl ?? url('/logo/logo.png');
    $supportEmail = $supportEmail ?? config('company.contact.email');
    $supportPhone = $supportPhone ?? config('company.contact.phone');
@endphp
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f4f4f5;margin:0;padding:0;width:100%;">
    <tr>
        <td align="center" style="padding:28px 16px;">
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="max-width:600px;width:100%;">
                {{-- Logo --}}
                <tr>
                    <td align="center" style="padding:0 0 18px;">
                        <img src="{{ $logoUrl }}" alt="{{ $brandName }}" width="160" style="display:block;height:auto;max-width:160px;border:0;outline:none;text-decoration:none;">
                    </td>
                </tr>

                {{-- Card --}}
                <tr>
                    <td style="background-color:#ffffff;border-radius:16px;overflow:hidden;box-shadow:0 8px 28px rgba(17,24,39,0.08);">
                        {{-- Accent bar --}}
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td style="height:5px;line-height:5px;font-size:0;background:linear-gradient(90deg,#ff6b35 0%,#f7931e 55%,#ff8c42 100%);background-color:#ff6b35;">&nbsp;</td>
                            </tr>
                        </table>

                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td style="padding:28px 28px 8px;">
                                    @yield('content')
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:8px 28px 28px;">
                                    <p style="margin:0 0 6px;font-size:14px;line-height:1.5;color:#6b7280;">
                                        Questions? Reply to this email or contact
                                        <a href="mailto:{{ $supportEmail }}" style="color:#ff6b35;text-decoration:none;font-weight:600;">{{ $supportEmail }}</a>
                                        @if(filled($supportPhone))
                                            · <a href="tel:{{ preg_replace('/[^\d+]/', '', $supportPhone) }}" style="color:#111827;text-decoration:none;font-weight:600;">{{ $supportPhone }}</a>
                                        @endif
                                    </p>
                                    <p style="margin:16px 0 0;font-size:14px;line-height:1.5;color:#111827;">
                                        Thanks,<br>
                                        <strong style="color:#111827;">{{ $brandName }}</strong>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                {{-- Footer --}}
                <tr>
                    <td align="center" style="padding:20px 12px 0;">
                        <p style="margin:0;font-size:12px;line-height:1.5;color:#9ca3af;">
                            &copy; {{ date('Y') }} {{ config('company.name', 'VanTroZ') }}. All rights reserved.
                        </p>
                        <p style="margin:6px 0 0;font-size:11px;line-height:1.4;color:#b0b0b0;">
                            This is an automated message from {{ $brandName }}.
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
