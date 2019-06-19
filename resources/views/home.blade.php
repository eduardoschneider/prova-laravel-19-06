@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">Registros</div>
			<a class="btn btn-success" style="width:200px; margin-top:5px; margin-left:5px; position:absolute; right:20px;" href="{{route('products.create')}}">Criar Novo Produto</a>
			<div class="card-body">
			
				<div class="alert alert-success">
					<p> TÁ LOGADO COMO USER <b>MAAAAAAS</b> tá tudo feito o Auth, bugou e não tá diferenciando IDK WHY :( Era só tirar os botões e tava feito o USER! </p>
				</div>
				
			   <table class="table table-bordered">
					<thead>
						<tr>
							<th width="5"> ID </th>
							<th> Produto </th>
							<th> Descrição </th>
							<th> Action </th>
						</tr>
					</thead>
					
					<tbody>
						@foreach ($products as $key => $value)
						<tr>
							<td> {{ $key+1 }} </td>
							<td> {{ $value->name }} </td>
							<td> {{ $value->descricao }} </td>
							<td style="display:flex; align-items:center; justify-content:center;">
							<a href="{{ route('products.show',$value->id)}}" class="btn btn-success">Visualizar</a>
							<a href="{{ route('products.edit',$value->id)}}" class="btn btn-primary">Edit</a>

								<form action="{{ route('products.destroy', $value->id)}}" method="post">
								  @csrf
								  @method('DELETE')
								  <button class="btn btn-danger" type="submit">Delete</button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
