
@extends('layouts.app')

@section('content')
	<h1> Liste des articles </h1>
	<div class='container'>
		<table class="table table-striped">
			<tr>
				<td> Titre </td>
			</tr>
				@foreach($articles as $art)
				<tr>
					<td> <a href="{{'/lire/'.$art['id']}}"> {{$art['titre']}} </a></td>
					<td> <a href="modifier/{{$art['id']}}"> Modifier </a></td>
					<td> <a href="liste/{{$art['id']}}"> Supprimer </a> </td>
				</tr>	
			@endforeach	
		</table>

		<a href="ajoutArticle" class="btn btn-primary"> Ajouter un nouveau article </a>
	</div>
@endsection	