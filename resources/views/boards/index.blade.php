@extends('boards.layout')

@section('content')
여기에 게시판을 만들겁니다.
<a href="{{ route('boards.create') }}">글 쓰기</a>

<table border="1">
    <tr>
        <th>No</th>
        <th>제목</th>
        <th>작성자</th>
        <th>내용</th>
        <th>첨부 이미지</th>
        <th>등록일</th>
        <th>수정일</th>
        <th>관리</th>
    </tr>
    <!--lists로 넘어온 정보를 ls로 받기-->
    <!-- < ?php와 @,{ {}}는 같은 의미. { {}}는 echo와 같다.  -->
    @foreach ($lists as $ls) 
    <tr>
        <td>{{ $ls->id }}</td>
        <td>{{ $ls->title }}</td>
        <td>{{ $ls->writer_id }}</td>
        <td>{{ $ls->contents }}</td>
        <td>{{ $ls->imagePath }}</td>
        <td>{{ $ls->created_at }}</td>
        <th>{{ $ls->updated_at }}</td>
        <th>보기,수정,삭제</th>
    </tr>
    @endforeach
    

</table>
@endsection