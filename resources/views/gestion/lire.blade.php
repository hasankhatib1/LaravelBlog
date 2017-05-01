
@extends('layouts.app')

@section('content')
	<div class='container'>
		<div class="form-group">
			<label class="col-sm-2  control-label" > Titre: </label>
			<p> {{$lireArticle['titre']}} </p>
		</div>	

		<div class="form-group">
			<label class="col-sm-2  control-label" > Contenu: </label>
			<p> {{$lireArticle['contenu']}} </p>
		</div>

		<div class="form-group">
			<table class="table table-striped">
				<tr>
					<td> Les commentaires </td>
				</tr>
				@foreach($lireArticle->commentaires as $com)
					<tr>
						<td> {{$com->comment}} </td>
					</tr>	
				@endforeach	
			</table>


			<form action="" method="post">
				{{csrf_field()}}
				<div class="form-group">
					<label class="col-sm-2  control-label" > Commentaire : </label>
					<div class="col-sm-10">
						<textarea rows="4" cols="50" class="form-control" name="commentaire" placeholder="Ajouter un commentaire"></textarea><br/>
					</div>	
				</div>
				<div class="clearfix "></div> 

				<div class="text-center">
					<input type="submit" name="btnSub" class="btn btn-primary" value="Ajouter un commentaire">
				</div>	
			</form>
		</div>	
	</div>
@endsection	