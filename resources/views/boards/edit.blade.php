@extends('layouts.app')
@section('content')

<h1>글 수정</h1>
<form action="{{ route('boards.update', $board->id) }}" method="post">
    @csrf
    @method('PUT')
    <table border="1">
        <tr>    
            <th>제목</th>
            <td><input type='text' name='title' value="{{ $board->id }}"/></td>
        </tr>
        <tr>
            <th>작성자</th>
            <td><input type='text' name='writer_id' value="{{ $board->writer_id }}"/></td>
        </tr>
        <tr>
            <th>내용</th>
            <td><textarea name='contents'>{{ $board->contents }}</textarea></td>
        </tr>
        <tr>
            <th>첨부파일</th>
            <td><input type='text' name='imagePath' value="{{ $board->imagePath }}"/></td>
        </tr>
    </table>
    <br/>
    <button type="submit">확인</button>
</form>
</br>

<a href="{{ route('boards.index') }}">목록</a>
@endsection