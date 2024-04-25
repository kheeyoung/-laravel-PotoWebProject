<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class BoardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boards=Board::all(); //$boards 변수에 Board(테이블 명) 전부 가져오기
        //board 페이지 출력
        return view('boards.index')->with('lists',$boards); 
        //여기서 view는 resources\view를 의미
        //DB에서 받아온 boards를 list라는 이름으로 뿌리기
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create 페이지 출력
        return view('boards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //폼으로 받은 데이터 = request / 입력 받은 값(제목, 내용)을 필수 값으로 지정
        $request->validate([
            'title'=>'required', 
            'writer_id'=>'required',
            'contents'=>'required'
        ]);
        Board::create($request->all());
        return redirect()->route('boards.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function show(Board $board)
    {
        //글 자세히 보기
        $board=Board::where('id',$board->id)->first();
        return view('boards.show')->with('board',$board);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function edit(Board $board)
    {
        //글 수정 페이지로 이동
        $board=Board::where('id',$board->id)->first();
        return view('boards.edit')->with('board',$board);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Board $board)
    {
        //글 수정
        $request->validate([
            'title'=>'required', 
            'writer_id'=>'required',
            'contents'=>'required'
        ]);
        $board->update($request->all());
        return redirect()->route('boards.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function destroy(Board $board)
    {
        //글 삭제
        $board->delete();
        return redirect()->route('boards.index');
    }
}
