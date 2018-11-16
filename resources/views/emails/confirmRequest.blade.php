<div>
    <h4>Hi {{ $friend->first_name }},</h4>
    <p>{{ $loggedUser->first_name." ".$loggedUser->last_name }} has sent you a friend request on Friend.</p>
    <p>Click below link to confirm</p>
    <a href="{{ route('confirm_request') }}?user={{ $loggedUser->id }}">{{ __('Confirm') }}</a>.
</div>
