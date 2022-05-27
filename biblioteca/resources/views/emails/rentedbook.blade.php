@component('mail::message')
# Olá, {{ $rentedbook->reader->name }}!

<div class="body">
    <p>O livro "{{ $rentedbook->book->title }}" foi alugado com sucesso. :)</p>
    <p>Somente para lembra-lo, a data de devolução ficou agendado para  <b>{{ $returndate->format('d/m/Y') }}</b>.</p>
    
</div>

Até breve,<br>
{{ config('app.name') }}
@endcomponent
