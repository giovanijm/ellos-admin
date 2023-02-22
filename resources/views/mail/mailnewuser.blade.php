<x-mail::layout>
{{-- Header --}}
<x-slot:header>
<x-mail::header :url="config('app.url')">
    <img style="width: 18rem; heigth: auto" src="/imagem/layout/login/logoSistemaEllos.png" alt="Sistema Ellos"/>
</x-mail::header>
</x-slot:header>

{{-- Body --}}
<h1>Olá {{ $userTo->name }}, seja bem vindo!</h1>
<p>Nós do Sistema Ellos temos orgulho em receber você <b>{{ $userTo->name }}</b>, fique a vontade por usar nosso sistema e a qualquer momento tirar suas dúvidas com a nossa equipe de suporte.</p>
<h2>Muito obrigado!</h2>

<x-mail::button :url="config('app.url')">
    Clique aqui para acessar o sistema
</x-mail::button>

<p style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; line-height: 1.5em; margin-top: 0; color: #b0adc5; font-size: 12px; text-align: center;">
    <b>Observação:</b> E-mail de envio automático por favor não responder.
</p>
{{-- Footer --}}
<x-slot:footer>
<x-mail::footer>
© {{ date('Y') }} {{ config('app.name') }}. @lang('Todos os Direitos Reservados.')
</x-mail::footer>
</x-slot:footer>
</x-mail::layout>
