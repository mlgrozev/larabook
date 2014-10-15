@forelse($statuses as $status)
    @include ('statuses.partials.status')
@empty
@endforelse