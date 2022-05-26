@component('mail::message')
# Message

<strong>Name</strong>
{{ $data['name'] }}

<strong>Email</strong>
{{ $data['email'] }}

<strong>Message</strong>
{{ $data['text'] }}


{{--@component('mail::button', ['url' => ''])--}}
{{--Button Text--}}
{{--@endcomponent--}}

{{--Thanks,<br>--}}
{{--{{ config('app.name') }}--}}
@endcomponent
