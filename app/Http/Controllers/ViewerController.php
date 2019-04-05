<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Storage;
use Response;
use App\research_papers;

class ViewerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = research_papers::findOrFail($id);

        $filePath = 'storage/abstract/'.$document->abstract;
        // if( ! Storage::exists($filePath) ) {
        //     abort(404);
        // }

        return view('landingpage.viewer', compact('document','filePath'));

        // return view('landingpage.viewer')->with(['fileName'=>$fileName,'filepath'=>$filePath,'pdfContent'=>$pdfContent]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function viewProposal($id){
        $document = DB::table('research_papers')->where('title',$id)->value('proposal');
        $filePath = 'storage/proposal/'.$document;
        return view('landingpage.viewer', compact('document','filePath'));
    }

    public function viewGuide($id){
        $document = 'guidelinesforthesis.pdf';
        $filePath = 'storage/proposal/'.$document;
        return view('landingpage.viewer', compact('document','filePath'));
    }

    public function viewManuscript($id){
        $document = DB::table('research_papers')->where('title',$id)->value('manuscript');
        $filePath = 'storage/manuscript/'.$document;
        return view('landingpage.viewer',compact('document','filePath'));
    }
}
