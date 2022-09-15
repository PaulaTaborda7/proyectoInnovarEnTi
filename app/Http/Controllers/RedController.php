<?php

namespace App\Http\Controllers;

use App\Models\Red;
use Illuminate\Http\Request;

/**
 * Class RedController
 * @package App\Http\Controllers
 */
class RedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reds = Red::paginate();

        return view('red.index', compact('reds'))
            ->with('i', (request()->input('page', 1) - 1) * $reds->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $red = new Red();
        return view('red.create', compact('red'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Red::$rules);

        $red = Red::create($request->all());

        return redirect()->route('reds.index')
            ->with('success', 'Red created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $red = Red::find($id);

        return view('red.show', compact('red'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $red = Red::find($id);

        return view('red.edit', compact('red'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Red $red
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Red $red)
    {
        request()->validate(Red::$rules);

        $red->update($request->all());

        return redirect()->route('reds.index')
            ->with('success', 'Red updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $red = Red::find($id)->delete();

        return redirect()->route('reds.index')
            ->with('success', 'Red deleted successfully');
    }
}
