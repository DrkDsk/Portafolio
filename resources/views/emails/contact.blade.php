<x-mail::message>

<br>Hola, soy: {{ $name }},
    <br>{{$message}}
    <br>Te puedes comunicar conmigo al correo: {{$emailFrom}}


<x-mail::button :url="''">
Button Text
</x-mail::button>

</x-mail::message>
