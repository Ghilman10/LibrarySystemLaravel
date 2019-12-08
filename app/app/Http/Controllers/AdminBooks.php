<?php

namespace App\Http\Controllers;

use App\Rack;
use App\Book;
use DB;

use Illuminate\Http\Request;

class AdminBooks extends Controller
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
        $racks = Rack::all();
        $books = Book::all();
        
        $r_name_req = $request->get('rack_name');
        $count=0;
        foreach($racks as $r1 )
        {
            if($r_name_req == $r1->name)
            {
                $rack_name_id = $r1->id;
                $count=1;                
            }
            
        }
        if($count==0)
        {
            return redirect('admin/books/error');
        }

        // Entering data in book table
        Book::create([
            'title' => $request->get('title'),
            'author' => $request->get('author'),
            'year' => $request->get('year'),
            'rack_id' => $rack_name_id,
            
            ]);
    
// getting count of rack name 

            $employees = DB::table('books')
        ->select('rack_id', DB::raw('count(*) as total'))
        ->groupBy('rack_id')
        ->get();

        $max_id =  Book::max('id');
        foreach($employees as $ci1)
        { 
            
            $id_count =  $ci1->total;
            if($id_count > 10)
            {
                $books = Book::find($max_id)->delete();
                return redirect('admin/books/exceedserror');      
            }
        }  


            
            return redirect('admin/books');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $books = DB::table('books')
            ->join('racks', 'books.rack_id', '=', 'racks.id')
            ->select('books.*', 'racks.name')
            ->get();

        return view('admin-books',compact('books'));
    }

    public function showbooks_client($id)
    {
        $books = DB::table('books')->where('rack_id', $id)->get();
        return view('client-books',compact('books'));
    }

    public function search_books(Request $request)
    {
        //echo "YYYY";
        $searched = $request->get('search_book');
     // echo $searched;
        $books = DB::table('books')->where('title', $searched)->orWhere('author', $searched)
            ->orWhere('year', $searched)->get();

         return view('search-results',compact('books'));
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
        $books = Book::find($id)->delete();
        return redirect('admin/books');
    }
}
