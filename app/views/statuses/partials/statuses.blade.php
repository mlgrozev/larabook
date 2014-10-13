@if($statuses->count())
    @foreach($statuses as $status)
        @include ('statuses.partials.status')
    @endforeach
@else
    <p>This user hasn't any posted statuses.</p>
@endif