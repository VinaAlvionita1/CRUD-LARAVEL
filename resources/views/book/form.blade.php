@extends('main')

@section('title', (isset($id) ? 'Edit' : 'Tambah') . ' Buku')

@section('header')
	@parent
	<hr>
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    <hr>
    @endif
    <hr>
@endsection

@section('content')

<form method="POST" action="/book{{isset($id) ? '/'.$id: ''}}">
  @csrf
  @if (isset($id))
    @method('PUT')
  @endif
  <div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">Judul</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="title" name="title" value="{{ $title ?? '' }}" minlength="3" maxlength="120" placeholder="Judul">
    </div>
  </div>
  <div class="form-group row">
    <label for="author" class="col-sm-2 col-form-label">Pengarang</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="author" name="author" value="{{ $author ?? '' }}" minlength="2" maxlength="80" placeholder="Pengarang">
    </div>
  </div>
  <div class="form-group row">
    <label for="year" class="col-sm-2 col-form-label">Tahun</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="year" name="year" value="{{ $year ?? '' }}" minlength="4" maxlength="4" placeholder="Tahun">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-4 offset-sm-2">
      <button class="btn btn-primary" type="submit">SIMPAN DATA</button>
      <a href="/book" class="btn btn-secondary">BATALKAN</a>
    </div>
  </div>
</form>

@endsection

@section('footer')
  @parent
  <p><small>{{ date('d F Y') }}</small></p>
@endsection