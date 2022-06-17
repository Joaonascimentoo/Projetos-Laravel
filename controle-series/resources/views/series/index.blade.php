<x-layout title="Séries">
    <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar</a>

    @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{ $mensagemSucesso }}
    </div>
    @endisset

    <ul class="list-group">
        @foreach ($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            @auth<a href="{{ route ('seasons.index', $serie->id) }}">@endauth
                {{ $serie->nome }}
            @auth</a>@endauth
            @auth
            <span class="d-flex">
                <a href="{{ route('series.edit',$serie->id)}}" class="btn- btn-primary btn-sm">
                    E
                </a>
            </span>

            <form action="{{ route('series.destroy',$serie->id) }}" method="post" class="ms-2">
                @csrf
                @method ('DELETE')

                <button class="btn btn-danger btn-sm">
                    X
                </button>
            </form>
            @endauth
        </li>
        @endforeach
    </ul>

</x-layout>