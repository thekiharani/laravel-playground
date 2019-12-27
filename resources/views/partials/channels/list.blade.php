<ul>
@foreach($channels as $channel)
    <li>{{ ucfirst($channel->name) }}</li>
@endforeach
</ul>
