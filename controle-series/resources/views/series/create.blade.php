<x-layout title="Nova Série">
    <form action="{{ route('series.store') }}" method="post">
        @csrf

        <div class="row mb-3">
            <div class="col-8">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" autofocus id="nome" name="nome" class="form-control" value="{{ old('nome') }}">
            </div>
            <div class="col-2">
                <label for="seasonsQty" class="form-label">Temporadas:</label>
                <input type="text" id="seasonsQty" name="seasonsQty" class="form-control" value="{{ old('seasonsQty') }}">
            </div>
            <div class="col-2">
                <label for="episodesQty" class="form-label">Episódios:</label>
                <input type="text" id="episodesQty" name="episodesQty" class="form-control" value="{{ old('episodesQty') }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>

</x-layout>