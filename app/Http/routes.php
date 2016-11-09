<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Board;
use Illuminate\Http\Request;


Route::get('/', function () {
	$boards = Board::orderBy('created_at','desc')->get();
 return view('home',['boardlist'=>$boards]);
});

Route::get('/board', function () {
    return view('board');
});

Route::post('/board', function (Request $request) {
	$validator = Validator::make($request->all(),[
		'title' => 'required|max:255',
		'content' => 'required',
		'writer' => 'required'
	]);

	if( $validator->fails() ){
		return redirect('/board')
									->withInput()
									->withErrors($validator);
	}

	$board = new Board;
	$board->title = $request->title;
	$board->content = $request->content;
	$board->writer = $request->writer;
	$board->save();

	return redirect("/");

});