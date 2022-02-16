<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use App\Models\Marca;
use Illuminate\Http\Request;

/**
 * Class AutoController
 * @package App\Http\Controllers
 */
class AutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autos = Auto::paginate();

        return view('auto.index', compact('autos'))
            ->with('i', (request()->input('page', 1) - 1) * $autos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $auto = new Auto();
        $marcas= Marca::pluck('nombre','id');
        return view('auto.create', compact('auto','marcas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Auto::$rules);
        $datos=request();
        if($request->hasFile('foto'))
        {
            $datos['Foto']=$request->file('foto')->store('uploads','public');
           
        }
        $auto = Auto::create($datos->all());

        return redirect()->route('autos.index')
            ->with('success', 'Auto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $auto = Auto::find($id);

        return view('auto.show', compact('auto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $auto = Auto::find($id);
        $marcas=Marca::pluck('nombre','id');
        return view('auto.edit', compact('auto','marcas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Auto $auto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auto $auto)
    {
        request()->validate(Auto::$rules);

        $auto->update($request->all());

        return redirect()->route('autos.index')
            ->with('success', 'Auto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $auto = Auto::find($id)->delete();

        return redirect()->route('autos.index')
            ->with('success', 'Auto deleted successfully');
    }
}
