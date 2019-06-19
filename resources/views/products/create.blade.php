@extends('products.layout')

@section('content')
<style>
  .puxa {
    margin-top: 40px;
  }
</style>
<div class="card puxa">
  <div class="card-header">
    CRIAR
  </div>
  <div class="card-body">
	<form method="post" action="{{ route('products.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Produto:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="descricao">Descricao :</label>
              <input type="text" class="form-control" name="descricao"/>
          </div>

          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection