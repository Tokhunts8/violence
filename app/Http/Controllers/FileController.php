<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileStoreRequest;
use App\Models\File;
use App\Models\Section;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $files = File::with(['parent']);
        $count = $files->count();
        $files = $files->paginate(10);
        return view('file.index', ['count' => $count, 'files' => $files]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        $sections = Section::select('id', 'name', 'description')->get();
        return view("file.create", ["sections" => $sections]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FileStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $file            = new File();
        $file->order     = $request->order;
        $file->parent_id = $request->parent_id;

        if ($request->file) {
            $imageName  = time() . '.' . $request->file->getClientOriginalExtension();
            $file->file = 'images/sections/' . $imageName;
            $request->file->move(public_path('images/sections'), $imageName);
        }

        if ($request->eFile) {
            $imageName   = time() . '1.' . $request->eFile->getClientOriginalExtension();
            $file->eFile = 'images/sections/' . $imageName;
            $request->eFile->move(public_path('images/sections'), $imageName);
        }

        if ($request->preview) {
            $imageName     = time() . '2.' . $request->preview->getClientOriginalExtension();
            $file->preview = 'images/sections/' . $imageName;
            $request->preview->move(public_path('images/sections'), $imageName);
        }

        if ($request->ePreview) {
            $imageName      = time() . '3.' . $request->ePreview->getClientOriginalExtension();
            $file->ePreview = 'images/sections/' . $imageName;
            $request->ePreview->move(public_path('images/sections'), $imageName);
        }

        $file->save();
        return redirect("admin/file");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\File $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\File $file
     * @return \Illuminate\View\View
     */
    public function edit(File $file): \Illuminate\View\View
    {
        $sections = Section::select('id', 'name', 'description')->get();
        return view("file.edit", ["sections" => $sections, "file" => $file]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\File $file
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(FileStoreRequest $request, File $file): \Illuminate\Http\RedirectResponse
    {
        $file->order     = $request->order;
        $file->parent_id = $request->parent_id;

        if ($request->file) {
            $imageName  = time() . '.' . $request->file->getClientOriginalExtension();
            $file->file = 'images/sections/' . $imageName;
            $request->file->move(public_path('images/sections'), $imageName);
        }
        if ($request->eFile) {
            $imageName   = time() . '1.' . $request->eFile->getClientOriginalExtension();
            $file->eFile = 'images/sections/' . $imageName;
            $request->eFile->move(public_path('images/sections'), $imageName);
        }

        if ($request->preview) {
            $imageName     = time() . '2.' . $request->preview->getClientOriginalExtension();
            $file->preview = 'images/sections/' . $imageName;
            $request->preview->move(public_path('images/sections'), $imageName);
        }

        if ($request->ePreview) {
            $imageName      = time() . '3.' . $request->ePreview->getClientOriginalExtension();
            $file->ePreview = 'images/sections/' . $imageName;
            $request->ePreview->move(public_path('images/sections'), $imageName);
        }

        $file->save();
        return redirect("admin/file");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\File $file
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(File $file): \Illuminate\Http\RedirectResponse
    {
        $file->delete();
        return redirect()->back();
    }
}
