@foreach($articles as $article)
<br>
@include('sweet::alert')

<div class="container" style="background-color: white; padding: 20px; border-radius: 10px; color: black;">
    <div class="card">
        <div class="card-content">
        	<div class="col s12">
        		<h5>{{ $article->title }}</h5>
                <div class="divider"></div>
                <p style="text-align: justify;">{!! str_limit($article->content, 150) !!} {!! link_to(route("articles.show",$article->id), "Read More") !!}</p>
                {{-- {!! link_to(route("articles.edit",$article->id), "Edit Article", ["class"=>"btn btn-flat green accent-3 waves-effect waves-light white-text"]) !!} --}}
        	</div>
        </div>
    </div>
</div>
@endforeach

<div class="row" style="margin-left: 25px; margin-right: 25px;">
    <nav class="container" style="padding-left: 10px; padding-right: 10px; padding-bottom: 10px; padding-top: 5px;">
        {!! $articles->render() !!}
    <!-- <ul class="pagination">
        <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
        <li class="active"><a href="#!">1</a></li>
        <li class="waves-effect"><a href="#!">2</a></li>
        <li class="waves-effect"><a href="#!">3</a></li>
        <li class="waves-effect"><a href="#!">4</a></li>
        <li class="waves-effect"><a href="#!">5</a></li>
        <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
      </ul>     -->    
    </div>
</nav>