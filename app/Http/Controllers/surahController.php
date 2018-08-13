<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class surahController extends Controller
{
    public function add(){
    	return view('surah.prepare');
    }

    public function save(Request $request){
    	// return json_encode($request->all());

    	foreach($request->ayat as $key => $ayat){
    		$id = (DB::table('arabic')->max('id')) ? (DB::table('arabic')->max('id') + 1) : 1; 

    		DB::table('arabic')->insert([
    			'id'		=> $id,
    			'surah'		=> $request->surah,
    			'ayat'		=> $ayat,
    			'text'		=> $request->text[$key],
    		]);
    	}

    	return 'berhasil';
    }

    public function insert(Request $request){
        $data = DB::table('arabic')->where('surah', $request->surah)->max('ayat');

        return json_encode($data);
    }
}
