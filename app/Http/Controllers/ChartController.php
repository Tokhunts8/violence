<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChartStoreRequest;
use App\Models\Chart;
use App\Models\Section;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $charts = Chart::with(['parent']);
        $count  = $charts->count();
        $charts = $charts->paginate(10);
        return view('charts.index', ['charts' => $charts, 'count' => $count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        $sections = Section::select('id', 'name', 'description')->get();
        return view("charts.create", ["sections" => $sections]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ChartStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ChartStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $chart            = new Chart();
        $chart->name      = $request->name;
        $chart->eName     = $request->eName;
        $chart->value     = $request->value;
        $chart->parent_id = $request->parent_id;

        $chart->save();

        return redirect("admin/chart");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Chart $chart
     * @return \Illuminate\Http\Response
     */
    public function show(Chart $chart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Chart $chart
     * @return \Illuminate\View\View
     */
    public function edit(Chart $chart): \Illuminate\View\View
    {
        $sections = Section::select('id', 'name', 'description')->get();
        return view("charts.edit", ["chart" => $chart, "sections" => $sections]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ChartStoreRequest $request
     * @param \App\Models\Chart $chart
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ChartStoreRequest $request, Chart $chart): \Illuminate\Http\RedirectResponse
    {
        $chart->name      = $request->name;
        $chart->eName     = $request->eName;
        $chart->value     = $request->value;
        $chart->parent_id = $request->parent_id;

        $chart->save();

        return redirect("admin/chart");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Chart $chart
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Chart $chart): \Illuminate\Http\RedirectResponse
    {
        $chart->delete();
        return redirect()->back();
    }
}
