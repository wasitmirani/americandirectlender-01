@component('mail::message')
# Introduction
Welcome To Ammerican Direct Lender

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
