<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionStoreRequest;
use App\Models\Section;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $sections = Section::with(['children', 'types'])->where('parent_id', '=', null)->orderBy('page', 'asc')->orderBy('order', 'asc');
        $count    = $sections->count();
        $sections = $sections->paginate(10);
        return view('section.index', ['sections' => $sections, 'count' => $count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        $sections = Section::select('id', 'name', 'description')->get();
        $types    = DB::table('types')->get();
        return view("section.create", ["sections" => $sections, "types" => $types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SectionStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $section               = new Section();
        $section->name         = $request->name;
        $section->description  = $request->description;
        $section->eName        = $request->eName;
        $section->eDescription = $request->eDescription;
        $section->order        = $request->order;
        $section->url          = $request->url;
        $section->parent_id    = $request->parent_id;
        $section->page         = $request->page;
        $section->type         = $request->type;

        $section->save();

        return redirect("admin/section");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Section $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Section $section
     * @return \Illuminate\View\View
     */
    public function edit(Section $section): \Illuminate\View\View
    {
        $sections = Section::select('id', 'name', 'description')->where('id', '<>', $section->id)->get();
        $types    = DB::table('types')->get();
        return view("section.edit", ["section" => $section, "sections" => $sections, "types" => $types]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Section $section
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SectionStoreRequest $request, Section $section): \Illuminate\Http\RedirectResponse
    {
        $section->name         = $request->name;
        $section->description  = $request->description;
        $section->eName        = $request->eName;
        $section->eDescription = $request->eDescription;
        $section->order        = $request->order;
        $section->url          = $request->url;
        $section->parent_id    = $request->parent_id;
        $section->page         = $request->page;
        $section->type         = $request->type;

        $section->save();

        return redirect("admin/section");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Section $section
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Section $section): \Illuminate\Http\RedirectResponse
    {
        $section->delete();
        return redirect()->back();
    }
}
