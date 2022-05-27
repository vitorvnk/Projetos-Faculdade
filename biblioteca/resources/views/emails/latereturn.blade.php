@component('mail::message')
# Olá, {{ $rentedbook->reader->name }}!

<div class="body">
    <p>Percebemos que a data de devolução <b>{{ $returndate->format('d/m/Y') }}</b> do livro <b>"{{ $rentedbook->book->title }}"</b>  acabou vencendo, 
        por esse motivo orientamos que vá em uma de nossas unidades para prolongar a data ou efetuar a devolução.</p>
    </div>
</div>

Até breve,<br>
{{ config('app.name') }}
@endcomponent
