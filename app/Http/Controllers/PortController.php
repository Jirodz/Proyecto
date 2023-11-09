<?php

namespace App\Http\Controllers;

use App\Models\Port;
use Illuminate\Http\Request;

class PortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ports = Port::paginate();

        return view('port.index', compact('ports'))
            ->with('i', (request()->input('page', 1) - 1) * $ports->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $port = new Port();
        return view('port.create', compact('port'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'numero_puerto' => 'required|integer|min:1|max:48|unique:ports',
        ]);

        $port = Port::create($request->all());

        return redirect()->route('ports.index')
            ->with('success', 'Port created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $port = Port::find($id);

        return view('port.show', compact('port'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $port = Port::find($id);

        return view('port.edit', compact('port'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Port $port
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Port $port)
    {
        request()->validate([
            'numero_puerto' => 'required|integer|min:1|max:48|unique:ports,numero_puerto,' . $port->id,
        ]);

        $port->update($request->all());

        return redirect()->route('ports.index')
            ->with('success', 'Port updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $port = Port::find($id)->delete();

        return redirect()->route('ports.index')
            ->with('success', 'Port deleted successfully');
    }
}
