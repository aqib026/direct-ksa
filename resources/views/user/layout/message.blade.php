<x-mail::message>
Reset Password

The body of your message.

<x-mail::button :url="'https://phpstack-258962-3606531.cloudwaysapps.com/user/resetpassword'">
Reset Now
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
