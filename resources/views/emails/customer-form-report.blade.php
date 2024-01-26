@component('mail::message')
    # Customer Form Report

    Here is the customer form report:

    @foreach ($formData as $field => $value)
        @if($field=="document")
            @foreach ($value as $key => $document)
                - {{ $field }}:  <img src=" . {{asset('image') . '/' . $document }} . " />

            @endforeach
        @else
            - {{ $field }}: {{ $value }}
        @endif
    @endforeach

    Thanks,

@endcomponent
