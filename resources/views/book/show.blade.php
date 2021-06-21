@extends('main')

@section('title', 'Beranda')

@section('header')
	@parent
	<hr>
	<p>
		<a href="/book/add" class="float-right btn btn-sm btn-primary mb-3">Tambah Data</a>
	</p>
@endsection

@section('content')
	<table class="table">
		<thead>
			<tr>
				<th>NO</th>
				<th>JUDUL</th>
				<th>PENGARANG</th>
				<th>TAHUN</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
                @foreach ($books as $book)
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $book['title'] }}</td>
                  <td>{{ $book['author'] }}</td>
                  <td>{{ $book['year'] }}</td>
                  <td>
                    <a href="/book/edit/{{ $book['id'] }}" class="btn btn-info btn-sm">EDIT</a> 
                    <a href="/book/delete/{{ $book['id'] }}" class="btn btn-sm btn-danger">HAPUS</a>
                  </td>
                </tr>
                @endforeach
		</tbody>
	</table>
@endsection

@section('footer')
	@parent
	<p><small>{{ date('d F Y') }}</small></p>
@endsection