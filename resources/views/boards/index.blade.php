@extends('layouts.app')

@section('content')


<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>제목</th>
                <th>작성자</th>
            </tr>
        </thead>
        <tbody>
            <!--lists로 넘어온 정보를 ls로 받기-->
            <!-- < ?php와 @,{ {}}는 같은 의미. { {}}는 echo와 같다.  -->
            @foreach ($lists as $ls) 
                <tr onclick="location.href='{{ route('boards.show', $ls->id) }}'" style="cursor: pointer;">
                    <td>{{ $ls->id }}</td>
                    <td>{{ $ls->title }}</td>
                    <td>{{ $ls->writer_id }}</td>
                </tr>
            @endforeach
        </tbody>
    </table></br>
    <button class="btn btn-dark" type="submit" onclick="location.href='{{ route('boards.create') }}'">글 쓰기</button>
</div>


@endsection