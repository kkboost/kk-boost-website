@extends('emails.layout')

@section('content')

<div style="display:inline-block; padding:8px 14px; border-radius:999px; background:rgba(220,38,38,0.10); border:1px solid rgba(220,38,38,0.20); color:#f87171; font-size:13px; font-weight:600;">
    {{ __('contact_mail.customer_badge') }}
</div>

<h1 style="margin:22px 0 12px 0; font-size:36px; line-height:1.08; font-weight:800; color:#ffffff;">
    {{ __('contact_mail.customer_title') }}
</h1>

<p style="margin:0 0 18px 0; font-size:16px; line-height:1.9; color:#cbd5e1;">
    {{ __('contact_mail.customer_greeting', ['name' => $name]) }}
</p>

<p style="margin:0 0 18px 0; font-size:16px; line-height:1.9; color:#cbd5e1;">
    {!! __('contact_mail.customer_intro', ['subject' => '<strong style="color:#ffffff;">“'.$subjectLine.'”</strong>']) !!}
</p>

<p style="margin:0 0 18px 0; font-size:16px; line-height:1.9; color:#cbd5e1;">
    {{ __('contact_mail.customer_text') }}
</p>

<div style="margin-top:28px; padding:22px 24px; border-radius:18px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.07);">
    <div style="font-size:12px; letter-spacing:0.18em; text-transform:uppercase; color:#f87171; font-weight:700; margin-bottom:10px;">
        KK-BOOST
    </div>
    <div style="font-size:18px; line-height:1.8; color:#ffffff; font-weight:600;">
        {{ __('contact_mail.customer_box_text') }}
    </div>
</div>

<div style="margin-top:30px;">
    <a href="https://kk-boost.de"
       style="display:inline-block; padding:14px 24px; border-radius:14px; background:linear-gradient(90deg,#dc2626,#ef4444,#f97316); color:#ffffff; text-decoration:none; font-size:15px; font-weight:700;">
        {{ __('contact_mail.customer_button') }}
    </a>
</div>

@endsection