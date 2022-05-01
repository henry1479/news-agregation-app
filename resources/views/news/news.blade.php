<h2>List of the News</h2>
@foreach ($news as $value)
    <article>
        <a href="{{ route('categories')}}/{{$category}}/{{$value['id']}}"><h3>{{ $value['title']}}</h3></a>
        <br/>
        <img src="img/{{$value['image']}}" alt="{{$value['title']}}">
        <br/>
        <p>{{ $value['description']}}</p>
        <small>created at: {{$value['created_at']}}</small>
        <hr>
    </article>
@endforeach
<a href="{{ route('categories') }}"><- Back</a>