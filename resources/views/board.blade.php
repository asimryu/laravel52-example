@extends('app')
@section('content')
<div class="panel panel-success">
	<div class="panel-heading">글쓰기</div>
	<div class="panel-body">

	@if ( count( $errors ) > 0 )
		<div class="alert alert-danger">
			<strong>입력에러!!!</strong>
			<br><br>
			<ul>
				@foreach ( $errors->all() as $error )
					<li> {{ $error }} </li>
				@endforeach
			</ul>
		</div>
	@endif


		<form action="{{ url('board') }}" method="POST">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="title">제목</label>
				<input type="text" name="title" id="title" class="form-control">
			</div>

			<div class="form-group">
				<label for="content">내용</label>
				<textarea name="content" id="content" class="form-control" rows="10"></textarea>
			</div>

			<div class="form-group">
				<label for="writer">글쓴이</label>
				<input type="text" name="writer" id="writer" class="form-control">
			</div>			
			<button type="submit" class="btn btn-default">등록하기</button>
		</form>
	</div>
</div>
@endsection