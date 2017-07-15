@extends('main')

@section('title',' | Create New Post')

@section('stylesheet')
	{!!  Html::style('css/parsley.css') !!}
@endsection

@section('content')
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1> Додади нов пост </h1>
			<hr> 
			{!! Form::open(array('route' => 'posts.store','data-parsley-validate'=>'')) !!}
				{{Form::label('title','Наслов:')}}
				{{Form::text('title',null,array('class'=>'form-control','required'=>'','max-length'=>'255'))}}

				{{Form::label('body','Текст: ')}}
				{{Form::textarea('body',null,array('class'=>'form-control','required'=>'s'))}}

				{{Form::submit('Додади', array('class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top: 20px;'))}}

			{!! Form::close() !!}

		</div>
	</div>

@endsection

@section('scripts')
	{!! Html::script('js/parsley.min.js')!!}
@endsection

