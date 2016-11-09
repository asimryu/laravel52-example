@extends('app')

@section('content')
<!-- app.blade.php의 @yield('content')에 표시 -->
<h1>This is Home Page</h1>
<a class="btn btn-success btn-lg" href="{{ url('board') }}">글쓰기</a>
<table class="table">
	<thead>
		<th>번호</th>
		<th>제목</th>
		<th>글쓴이</th>
		<th>날짜</th>
	</thead>
	<tbody>
		@foreach($boardlist as $row)
		<tr>
			<td>{{ $row->id }}</td>
			<td>{{ $row->title }}</td>
			<td>{{ $row->writer }}</td>
			<td>{{ $row->created_at }}</td>
		</tr>
		@endforeach
	</tbody>
</table>

@endsection