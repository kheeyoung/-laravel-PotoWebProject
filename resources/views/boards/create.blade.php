@extends('layouts.app')

@section('content')


<div class="container">
    <h3>글 쓰기</h3></br>
    <form action="{{ route('boards.store') }}" method="post">
        @csrf <!--form 보안 기능 -->
        <div class="mb-3">
            <label for="title" class="form-label">제목</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="contents" class="form-label">내용</label>
            <textarea class="form-control" id="contents" rows="3" name="contents"></textarea>
        </div>
        <button class="btn btn-dark" type="submit">저장</button>

    </form>
</div>
@endsection