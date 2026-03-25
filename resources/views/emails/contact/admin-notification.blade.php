@extends('emails.layout')

@section('content')

<div style="display:inline-block; padding:8px 14px; border-radius:999px; background:rgba(220,38,38,0.10); border:1px solid rgba(220,38,38,0.20); color:#f87171; font-size:13px; font-weight:600;">
    {{ __('contact_mail.admin_badge') }}
</div>

<h1 style="margin:22px 0 12px 0; font-size:36px; line-height:1.08; font-weight:800; color:#ffffff;">
    {{ __('contact_mail.admin_title') }}
</h1>

<p style="margin:0 0 24px 0; font-size:16px; line-height:1.9; color:#cbd5e1;">
    {{ __('contact_mail.admin_intro') }}
</p>

<table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="border-collapse:separate; border-spacing:0 14px;">
    <tr>
        <td style="background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.07); border-radius:18px; padding:18px 20px;">
            <div style="font-size:12px; letter-spacing:0.18em; text-transform:uppercase; color:#f87171; font-weight:700; margin-bottom:10px;">{{ __('contact_mail.field_name') }}</div>
            <div style="font-size:18px; color:#ffffff; font-weight:600;">{{ $name }}</div>
        </td>
    </tr>

    <tr>
        <td style="background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.07); border-radius:18px; padding:18px 20px;">
            <div style="font-size:12px; letter-spacing:0.18em; text-transform:uppercase; color:#f87171; font-weight:700; margin-bottom:10px;">{{ __('contact_mail.field_email') }}</div>
            <div style="font-size:18px; color:#ffffff; font-weight:600;">{{ $email }}</div>
        </td>
    </tr>

    <tr>
        <td style="background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.07); border-radius:18px; padding:18px 20px;">
            <div style="font-size:12px; letter-spacing:0.18em; text-transform:uppercase; color:#f87171; font-weight:700; margin-bottom:10px;">{{ __('contact_mail.field_subject') }}</div>
            <div style="font-size:18px; color:#ffffff; font-weight:600;">{{ $subjectLine }}</div>
        </td>
    </tr>

    <tr>
        <td style="background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.07); border-radius:18px; padding:18px 20px;">
            <div style="font-size:12px; letter-spacing:0.18em; text-transform:uppercase; color:#f87171; font-weight:700; margin-bottom:10px;">{{ __('contact_mail.field_message') }}</div>
            <div style="font-size:16px; line-height:1.9; color:#dbe4f0; white-space:pre-line;">{{ $messageText }}</div>
        </td>
    </tr>
</table>

@endsection