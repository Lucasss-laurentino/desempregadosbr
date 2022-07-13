@component('mail::message')
# Desempregadosbr.com

## Candidato para a vaga: {{ $vagaTitulo }} 

@component('mail::button', ['url' => route('vagas.show', $vagaId)])
Ver vaga no site
@endcomponent

Curriculo de candidatura no formato pdf abaixo, obrigado pela preferência !<br>

@endcomponent