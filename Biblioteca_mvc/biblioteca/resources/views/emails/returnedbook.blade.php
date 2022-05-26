@component('mail::message')
# Olá, {{ $rentedbook->reader->name }}!

<div class="body">
    <p>O livro "{{ $rentedbook->book->title }}" foi devolvido com sucesso.</p>
    <p>Sempre estaremos disponíveis caso queira novos livros, conte com a gente! :D</p>
</div>

Até breve,<br>
{{ config('app.name') }}
@endcomponent
