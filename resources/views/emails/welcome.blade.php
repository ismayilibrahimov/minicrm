@component('mail::message')
# Welcome

Welcome {{ $name }}. You are now our partner.

@component('mail::button', ['url' => 'https://mobilgroup.az/az'])
Mini CRM
@endcomponent

Thanks,<br>
Ismayil Ibrahimov
@endcomponent