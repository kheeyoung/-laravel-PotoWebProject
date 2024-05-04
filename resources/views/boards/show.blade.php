@extends('layouts.app')
@section('content')


<div class="container">
    <table class="table">
        <tr>
            <th>No</th>
            <td>{{ $board->id }}</td>
        </tr>
        <tr>    
            <th>제목</th>
            <td>{{ $board->title }}</td>
        </tr>
        <tr>
            <th>작성자</th>
            <td>{{ $board->writer_id }}</td>
        </tr>
        <tr>
            <th>내용</th>
            <td>{{ $board->contents }}</td>
        </tr>
        <tr>
            <th>첨부파일</th>
            <td>@if ($board->imagePath != null)
                <img src="\storage\images\{{ $board->imagePath }}" class="img-fluid">
                
            @endif</td>
        </tr>
        <tr>
            <th>등록일</th>
            <td>{{ $board->created_at }}</td>
        </tr>
        <tr>
            <th>수정일</th>
            <td>{{ $board->updated_at }}</td>
        </th>
    </table>
    </br>
    <button onclick="location.href='{{ route('boards.edit', $board->id, $board->writer_id) }}'" class="btn btn-dark">수정</button>
    <form action="{{ route('boards.destroy', $board->id,$board->writer_id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-dark">삭제</button>
    </form>
</div>
<div class="container">
    <button class="btn btn-dark" type="submit" onclick="location.href='{{ route('boards.index') }}'">목록</button>
</div>
@endsection