@extends('layout')

@section('content')
	<dic class="col-sm-8 blog-main">
		<h1>{{$post->title}}</h1>
		@if (count($post->tags))
			<ul>
				@foreach ( $post->tags as $tag )
					<li>
						<a href="/posts/tags/{{ $tag->name }}">
							{{ $tag->name }}
						</a>
					</li>
				@endforeach
			</ul>
		@endif
		{{$post->body}}
		<hr>
		<div class="comments">
			<li class="list-group">
			@foreach ($post->comments as $comment)
				<li>
					<strong>
							{{$comment->created_at->diffForHumans()}}: &nbsp;
					</strong>
					{{$comment->body}}
				</li>
			@endforeach
			</li>
		</div>
		<hr>
		<div class="card">
			<div class="card-block">
				<form method="POST" action="/posts/{{ $post->id }}/comments">
					{{ csrf_field() }}
					<div class="form-group">
						<textarea name="body" placeholder="Your comment here" class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Add Comment</button>
					</div>
				</form>
				@include('partials.errors')
			</div>
		</div>
	</dic>
@endsection