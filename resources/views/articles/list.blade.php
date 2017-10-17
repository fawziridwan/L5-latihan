@foreach($articles as $article)
<br>
<div class="container" style="background-color: white; padding: 20px; border-radius: 10px; color: black;">
	<div class="col s12">
		<h5>{{ $article->title }}</h5>

        <div class="divider"></div>
        <p style="text-align: justify;">{!! str_limit($article->content, 250) !!}</p>
        <p><strong>{{ $article->writer }}</strong></p>
        <div class="divider"></div>
        <br>
        {!! link_to(route("articles.show",$article->id), "Read More", ["class"=>"btn btn-flat blue accent-3 waves-effect waves-light white-text"]) !!}

        {!! link_to(route("articles.edit",$article->id), "Edit Article", ["class"=>"btn btn-flat green accent-3 waves-effect waves-light white-text"]) !!}
	</div>
</div>
@endforeach