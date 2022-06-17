<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Autenticador;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\SeriesRepository;

class SeriesController extends Controller
{

    public function __construct(private SeriesRepository $repository)
    {
        $this->middleware(Autenticador::class)->except('index');
    }

    public function index()
    {
      
        $series = Series::query()->orderBy('nome')->get();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {

       $serie = $this->repository->add($request);
        
        return redirect()->route('series.index')->with('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso");
    }

    public function destroy(Series $series)
    {

        $series->delete();

        return redirect()->route('series.index')->with('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso");
    }

    public function edit(Series $series)
    {
        for ($i = 1; $i <= $series->seasonsQty; $i++) {
            $season = $series->seasons()->edit([
                'number' => $i,
            ]);

            for ($j = 1; $j <= $series->episodesQty; $j++) {
                $season->episodes()->edit([
                    'number' => $j,
                ]);
            }
        }
        return view('series.edit')->with('serie', $series);
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();

        return redirect()->route('series.index')->with('mensagem.sucesso', "Serie '{$series->nome}' atualizado");
    }
}
