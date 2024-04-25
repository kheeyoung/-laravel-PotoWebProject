@extends('boards.layout')
@section('content')

<a href="{{ route('boards.index') }}">목록</a>

<table border="1">
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
        <td>{{ $board->imagePath }}</td>
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
<button onclick="location.href='{{ route('boards.edit', $board->id) }}'">수정</button>
<form action="{{ route('boards.destroy', $board->id) }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit">삭제</button>
</form>
@endsection