<select name="{{ $field ?? 'channel_id' }}" id="{{ $field ?? 'channel_id' }}" class="form-control">
@foreach($channels as $channel)
        <option value="{{ $channel->id }}">{{ ucfirst($channel->name )}}</option>
@endforeach
</select>
