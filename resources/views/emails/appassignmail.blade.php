@component('mail::message')
# Introduction
Welcome To Ammerican Direct Lender

@component('mail::button', ['url' => ''])
Admin Accepted Your Application
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
