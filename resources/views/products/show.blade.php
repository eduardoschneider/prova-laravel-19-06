@extends('products.layout')

@section('content')
<style>
  .puxa {
    margin-top: 40px;
  }
</style>
<div class="card puxa">
  <div class="card-header">
    VISUALIZAR
  </div>
  <div class="card-body">
      <form method="post" action="{{ route('products.update', $produto->id) }}">
        @method('PATCH')
        @csrf
          <div class="form-group">
              <label for="name">Produto:</label>
              <input type="text" class="form-control" name="name" value='{{ $produto->name }}' readonly/>
          </div>
          <div class="form-group">
              <label for="descricao">Descricao :</label>
              <input type="text" class="form-control" name="descricao" value='{{ $produto->descricao }}' readonly/>
          </div>
      </form>
  </div>
</div>
@endsection