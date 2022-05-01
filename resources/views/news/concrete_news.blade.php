<div>
    <h2>{{$news['title']}}</h2>
    <img src="{{$news['image']}}" alt="{{$news['description']}}">
    <p>{{$news['description']}}</p>
    <small>created at: {{ $news['created_at']}}</small>
    <a href="{{ route('categories')}}/{{$category}}">Back to news</a>
</div>