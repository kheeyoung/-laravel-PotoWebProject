<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
class BoardsController extends Controller
{
    use HasUuids; //uuid
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
        session_start();
        //폼으로 받은 데이터 = request / 입력 받은 값(제목, 내용)을 필수 값으로 지정
        $request->validate([
            'title'=>'required', 
            'contents'=>'required'
        ]);
        $writer_id=auth()->user()->id; //인증으로 부터 사용자의 아이디 가져오기
        $request->merge(['writer_id' => $writer_id]); //글쓴이 아이디 받아와서 추가

        //이미지 처리
        if($request->has('Path')){ //이미지가 첨부 되어 있을 경우
            $imagePath=$request->file('Path')->store('images', 'public'); //파일 저장(이름은 랜덤으로 변함)
            $imagePath=explode('/' , $imagePath);
            $request->merge(['imagePath' => $imagePath[1]]); //바뀐 이름을 저장(이름만 자르기 위해 문자열 자르기 사용)
        }
        Board::create($request->all()); //저장
        return redirect()->route('boards.index');
    }
    //이미지 파일 저장용
 

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
        $user_id=auth()->user()->id; //인증으로 부터 사용자의 아이디 가져오기
        if($board->writer_id==$user_id){ //작성자가 맞으면
            //글 수정 페이지로 이동
            $board=Board::where('id',$board->id)->first();
            return view('boards.edit')->with('board',$board);
        }
        else{ //작성자가 아니면 경고창, 이전 페이지로
            echo "<script>
            alert(\"수정 권한이 없습니다.\");
            history.back();
            </script>";
        }
        
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
        $user_id=auth()->user()->id; //인증으로 부터 사용자의 아이디 가져오기
        if($board->writer_id==$user_id){ //작성자가 맞으면
        //글 삭제
        $board->delete();
        return redirect()->route('boards.index');
        }
        else{ //작성자가 아니면 경고창, 이전 페이지로
            echo "<script>
            alert(\"수정 권한이 없습니다.\");
            history.back();
            </script>";
        }
    }
}
