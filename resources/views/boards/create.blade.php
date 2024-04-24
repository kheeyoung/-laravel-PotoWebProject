@extends('boards.layout')

@section('content')
글 쓰기
<form action="{{ route('boards.store') }}" method="post">
    @csrf <!--form 보안 기능 -->
<table border="1">
    <tr>
        <th>제목</th>
        <td>
            <input type="text" name="title" value=""/>
        </td>
    </tr>
    <tr>
        <th>작성자</th>
        <td>
            <input type="text" name="writer_id" value=""/>
        </td>
    </tr>
    <tr>
        <th>내용</th>
        <td>
            <textarea name="contents" rows="5"></textarea>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <button type="submit">저장</button>
        </td>
    </tr>
</table>
</form>

@endsection