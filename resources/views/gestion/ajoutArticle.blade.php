
@extends('layouts.app')

@section('content')
	<h1> Ajouter un article </h1>

		@if(count($errors)>0)
			<div class="container">
				<div class="alert alert-warning">
					<ul>
						@foreach($errors->all() as $err)
							<li> {{$err }}</li>
						@endforeach
					</ul>
				</div>
			</div>		
		@endif	


		
	<div class='container'>
		<form action="" method="post">
			{{csrf_field()}}
			<div class="form-group">
				<label class="col-sm-2  control-label" > Titre </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="titre" required placeholder="Titre de l'article" value="{{Request::old('titre')}}"><br/>
				</div>
			</div> 

			<div class="form-group">
				<label class="col-sm-2  control-label" > Contenu </label>
				<div class="col-sm-10">
					<textarea rows="4" cols="50" class="form-control" name="contenu" placeholder="Contenu de l'article">{{Request::old('contenu')}}</textarea><br/>
				</div>	
			</div>
			<div class="clearfix "></div> 

			<div class="text-center">
				<input type="submit" name="btnSub" class="btn btn-primary" value="Ajouter">
			</div>	
		</form>
	</div>
@endsection	
