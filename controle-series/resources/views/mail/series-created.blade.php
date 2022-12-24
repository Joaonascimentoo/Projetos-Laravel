@component('mail::message')

    # {{ $nomeSerie }} foi criada.

    A série {{ $nomeSerie }} com {{ $qtdTemporadas }} temporada(s) e {{ $episodiosPorTemporada }} episódio(s) foi criada.

    Acesse aqui:
@component('mail::button',['url' => route('seasons.index', $idSerie)])
    Ver série
@endcomponent
@endcomponent