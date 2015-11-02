<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    /**
     * Get a new documents controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $docs = $request->user()->documents()
            ->orderBy('id', 'desc')
            ->get();

        return view('documents.index', compact('docs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $doc = new Document([
            'name'    => 'New document',
            'content' => "# My new document\nHello world!",
        ]);

        $request->user()->documents()->save($doc);

        return redirect()->route('documents.edit', $doc->uuid);
    }

    /**
     * Display the specified resource.
     *
     * @param  string $uuid
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $doc = Document::byUuid($uuid);

        return view('documents.show', compact('doc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $uuid
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $uuid)
    {
        $doc = $request->user()->documents()
            ->uuid($uuid)
            ->firstOrFail();

        return view('documents.edit', compact('doc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  string $uuid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        $document = $request->user()->documents()
            ->uuid($uuid)
            ->firstOrFail();

        $document->name = $request->get('name');
        $document->content = $request->get('content');

        $document->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $uuid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $uuid)
    {
        $request->user()->documents()->uuid($uuid)->delete();

        return redirect()->route('documents.index');
    }
}
