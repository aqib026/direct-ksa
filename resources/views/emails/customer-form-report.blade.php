@component('mail::message')
# Customer Form Report

Here is the customer form report:

@foreach ($formData as $field => $value)
- {{ $field }}: {{ $value }}
@endforeach

Thanks,

@endcomponent
