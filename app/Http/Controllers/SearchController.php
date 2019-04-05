<?php

namespace App\Http\Controllers;

use DB;
use App\research_details;
use App\research_papers;
use App\tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;
use Smalot\PdfParser\Parser;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        // $research_paper = DB::table('research_papers')->get();
        // $research_detail = DB::table('research_details')->get();
        // $search = $request->input('search');
        // $result = DB::table('research_details')->join('research_papers','research_details.researchid','=', 'research_papers.id')
        // ->where('researchBody','like','%'.$search.'%')->get();
       
        // return view('landingpage.searchresult')->with('result',$result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
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
        $search = Input::get('search');
        $filter = $request->input('filter');
        $limit = 0;
        $text='';
        $searche = explode(' ', $search);
        $ite = count($searche);
        $result = '';

        for($i=0;$i<$ite;$i++){
            if(!$search == ''){
                if($filter == 'all'){
                    $result = DB::table('research_details')
                    ->join('research_papers','research_details.researchid','=', 'research_papers.id')->where('researchBody','LIKE','%'.$search[$i].'%')
                    ->join('tags','tags.researchid','=','research_details.researchid')
                    ->orWhere('tagname', 'LIKE','%'.$searche[$i].'%')
                    ->orWhere('title', 'LIKE','%'.$searche[$i].'%')
                    ->get();

                    $result = DB::table('research_details')
                    ->join('research_papers','research_details.researchid','=', 'research_papers.id')->where('researchBody','LIKE','%'.$searche[$i].'%')
                    ->join('tags','tags.researchid','=','research_details.researchid')
                    ->orWhere('tagname', 'LIKE','%'.$searche[$i].'%')
                    ->orWhere('title', 'LIKE','%'.$searche[$i].'%')
                    ->get();

                    $result = DB::table('research_details')
                        ->join('research_papers','research_details.researchid','=', 'research_papers.id')->where('researchBody','LIKE','%'.$searche[$i].'%')
                        ->join('tags','tags.researchid','=','research_details.researchid')
                        ->orWhere('tagname', 'LIKE','%'.$searche[$i].'%')
                        ->orWhere('title', 'LIKE','%'.$searche[$i].'%')
                        ->paginate(2);
                    
                    return view('landingpage.searchresult',compact('search','filter'))->withDetails($result)->withQuery($search);
                }elseif($filter == 'title'){
                    $result = DB::table('research_details')
                    ->join('research_papers','research_details.researchid','=', 'research_papers.id')
                    ->join('tags','tags.researchid','=','research_details.researchid')
                    ->orWhere('title', 'LIKE','%'.$searche[$i].'%')
                    ->get();

                    $result = DB::table('research_details')
                    ->join('research_papers','research_details.researchid','=', 'research_papers.id')
                    ->join('tags','tags.researchid','=','research_details.researchid')
                    ->orWhere('title', 'LIKE','%'.$searche[$i].'%')
                    ->get();

                    $result = DB::table('research_details')
                    ->join('research_papers','research_details.researchid','=', 'research_papers.id')
                    ->join('tags','tags.researchid','=','research_details.researchid')
                    ->orWhere('title', 'LIKE','%'.$searche[$i].'%')
                    ->paginate(2);
                    
                    return view('landingpage.searchresult',compact('search','filter'))->withDetails($result)->withQuery($search);
                }
                elseif($filter == 'program'){
                    $result = DB::table('research_details')
                    ->join('research_papers','research_details.researchid','=', 'research_papers.id')
                    ->join('tags','tags.researchid','=','research_details.researchid')
                    ->join('users','users.id','=','research_papers.user_id')
                    ->join('programs','programs.id','=','users.programid')
                    ->where('pname', 'LIKE','%'.$searche[$i].'%')
                    ->get();

                    $result = DB::table('research_details')
                    ->join('research_papers','research_details.researchid','=', 'research_papers.id')
                    ->join('tags','tags.researchid','=','research_details.researchid')
                    ->join('users','users.id','=','research_papers.user_id')
                    ->join('programs','programs.id','=','users.programid')
                    ->where('pname', 'LIKE','%'.$searche[$i].'%')
                    ->get();

                    $result = DB::table('research_details')
                    ->join('research_papers','research_details.researchid','=', 'research_papers.id')
                    ->join('tags','tags.researchid','=','research_details.researchid')
                    ->join('users','users.id','=','research_papers.user_id')
                    ->join('programs','programs.id','=','users.programid')
                    ->where('pname', 'LIKE','%'.$searche[$i].'%')
                    ->paginate(2);
                    
                    return view('landingpage.searchresult',compact('search','filter'))->withDetails($result)->withQuery($search);
                }
                elseif($filter == 'college'){
                    $result = DB::table('research_details')
                    ->join('research_papers','research_details.researchid','=', 'research_papers.id')
                    ->join('tags','tags.researchid','=','research_details.researchid')
                    ->join('users','users.id','=','research_papers.user_id')
                    ->join('colleges','colleges.id','=','users.collegeid')
                    ->where('cname', 'LIKE','%'.$searche[$i].'%')
                    ->get();

                    $result = DB::table('research_details')
                    ->join('research_papers','research_details.researchid','=', 'research_papers.id')
                    ->join('tags','tags.researchid','=','research_details.researchid')
                    ->join('users','users.id','=','research_papers.user_id')
                    ->join('colleges','colleges.id','=','users.collegeid')
                    ->where('cname', 'LIKE','%'.$searche[$i].'%')
                    ->get();

                    // $result = DB::table('research_details')
                    // ->join('research_papers','research_details.researchid','=', 'research_papers.id')
                    // ->join('tags','tags.researchid','=','research_details.researchid')
                    // ->join('users','users.id','=','research_papers.user_id')
                    // ->join('colleges','colleges.id','=','users.collegeid')
                    // ->where('cname', 'LIKE','%'.$searche[$i].'%')
                    // ->paginate(2);
                    
                    return view('landingpage.searchresult',compact('search','filter'))->withDetails($result)->withQuery($search);
                }
                        
                   
            }else{
                return redirect('/');
            }
        }
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
    public function search(Request $request){
        $search = Input::get('search');
        $filter = $request->input('filter');
        $limit = 0;
        $text='';
        $searche = explode(' ', $search);
        $ite = count($searche);
        $result = '';

        for($i=0;$i<$ite;$i++){
            if(!$search == ''){
                if($filter == 'all'){
                    $result = DB::table('research_details')
                    ->join('research_papers','research_details.researchid','=', 'research_papers.id')->where('researchBody','LIKE','%'.$searche[$i].'%')
                    ->join('tags','tags.researchid','=','research_details.researchid')
                    ->join('users','users.id','=','research_papers.user_id')
                    ->join('colleges','colleges.id','=','users.collegeid')
                    ->join('programs','programs.id','=','users.programid')
                    ->orWhere('pname', 'LIKE','%'.$search.'%')
                    ->orWhere('cname', 'LIKE','%'.$search.'%')
                    ->orWhere('tagname', 'LIKE','%'.$search.'%')
                    ->orWhere('title', 'LIKE','%'.$searche[$i].'%')
                    ->orWhere('proposal', 'LIKE','%'.$searche[$i].'%')
                    ->orWhere('manuscript', 'LIKE','%'.$searche[$i].'%')
                    ->get();

                    $result = DB::table('research_details')
                    ->join('research_papers','research_details.researchid','=', 'research_papers.id')->where('researchBody','LIKE','%'.$searche[$i].'%')
                    ->join('tags','tags.researchid','=','research_details.researchid')
                    ->join('users','users.id','=','research_papers.user_id')
                    ->join('colleges','colleges.id','=','users.collegeid')
                    ->join('programs','programs.id','=','users.programid')
                    ->orWhere('pname', 'LIKE','%'.$search.'%')
                    ->orWhere('cname', 'LIKE','%'.$search.'%')
                    ->orWhere('tagname', 'LIKE','%'.$search.'%')
                    ->orWhere('title', 'LIKE','%'.$searche[$i].'%')
                    ->orWhere('proposal', 'LIKE','%'.$searche[$i].'%')
                    ->orWhere('manuscript', 'LIKE','%'.$searche[$i].'%')
                    ->get();

                    $result = DB::table('research_details')
                    ->join('research_papers','research_details.researchid','=', 'research_papers.id')->where('researchBody','LIKE','%'.$searche[$i].'%')
                    ->join('tags','tags.researchid','=','research_details.researchid')
                    ->join('users','users.id','=','research_papers.user_id')
                    ->join('colleges','colleges.id','=','users.collegeid')
                    ->join('programs','programs.id','=','users.programid')
                    ->orWhere('pname', 'LIKE','%'.$search.'%')
                    ->orWhere('cname', 'LIKE','%'.$search.'%')
                    ->orWhere('tagname', 'LIKE','%'.$search.'%')
                    ->orWhere('title', 'LIKE','%'.$searche[$i].'%')
                    ->orWhere('proposal', 'LIKE','%'.$searche[$i].'%')
                    ->orWhere('manuscript', 'LIKE','%'.$searche[$i].'%')
                    ->paginate(10);
                    
                    return view('landingpage.searchresult',compact('search','filter'))->withDetails($result)->withQuery($search);
                }elseif($filter == 'title'){
                    $result = DB::table('research_details')
                    ->join('research_papers','research_details.researchid','=', 'research_papers.id')
                    ->join('tags','tags.researchid','=','research_details.researchid')
                    ->orWhere('title', 'LIKE','%'.$search.'%')
                    ->get();

                    $result = DB::table('research_details')
                    ->join('research_papers','research_details.researchid','=', 'research_papers.id')
                    ->join('tags','tags.researchid','=','research_details.researchid')
                    ->orWhere('title', 'LIKE','%'.$search.'%')
                    ->get();

                    $result = DB::table('research_details')
                    ->join('research_papers','research_details.researchid','=', 'research_papers.id')
                    ->join('tags','tags.researchid','=','research_details.researchid')
                    ->orWhere('title', 'LIKE','%'.$search.'%')
                    ->paginate(10);
                    
                    return view('landingpage.searchresult',compact('search','filter'))->withDetails($result)->withQuery($search);
                }
                elseif($filter == 'program'){
                    $result = DB::table('research_details')
                    ->join('research_papers','research_details.researchid','=', 'research_papers.id')
                    ->join('tags','tags.researchid','=','research_details.researchid')
                    ->join('users','users.id','=','research_papers.user_id')
                    ->join('programs','programs.id','=','users.programid')
                    ->where('pname', 'LIKE','%'.$search.'%')
                    ->get();

                    $result = DB::table('research_details')
                    ->join('research_papers','research_details.researchid','=', 'research_papers.id')
                    ->join('tags','tags.researchid','=','research_details.researchid')
                    ->join('users','users.id','=','research_papers.user_id')
                    ->join('programs','programs.id','=','users.programid')
                    ->where('pname', 'LIKE','%'.$search.'%')
                    ->get();

                    $result = DB::table('research_details')
                    ->join('research_papers','research_details.researchid','=', 'research_papers.id')
                    ->join('tags','tags.researchid','=','research_details.researchid')
                    ->join('users','users.id','=','research_papers.user_id')
                    ->join('programs','programs.id','=','users.programid')
                    ->where('pname', 'LIKE','%'.$search.'%')
                    ->paginate(10);
                    
                    return view('landingpage.searchresult',compact('search','filter'))->withDetails($result)->withQuery($search);
                }
                elseif($filter == 'college'){
                    $result = DB::table('research_details')
                    ->join('research_papers','research_details.researchid','=', 'research_papers.id')
                    ->join('tags','tags.researchid','=','research_details.researchid')
                    ->join('users','users.id','=','research_papers.user_id')
                    ->join('colleges','colleges.id','=','users.collegeid')
                    ->where('cname', 'LIKE','%'.$search.'%')
                    ->get();

                    $result = DB::table('research_details')
                    ->join('research_papers','research_details.researchid','=', 'research_papers.id')
                    ->join('tags','tags.researchid','=','research_details.researchid')
                    ->join('users','users.id','=','research_papers.user_id')
                    ->join('colleges','colleges.id','=','users.collegeid')
                    ->where('cname', 'LIKE','%'.$search.'%')
                    ->get();

                    $result = DB::table('research_details')
                    ->join('research_papers','research_details.researchid','=', 'research_papers.id')
                    ->join('tags','tags.researchid','=','research_details.researchid')
                    ->join('users','users.id','=','research_papers.user_id')
                    ->join('colleges','colleges.id','=','users.collegeid')
                    ->where('cname', 'LIKE','%'.$search.'%')
                    ->paginate(10);
                    
                    return view('landingpage.searchresult',compact('search','filter'))->withDetails($result)->withQuery($search);
                }
                        
                   
            }else{
                return redirect('/');
            }
        }
    }
}
