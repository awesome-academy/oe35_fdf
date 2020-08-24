
@php
    $stt = 0
@endphp
@foreach($users as $user)
@php
    $stt += 1
@endphp
    <tr>
        <td scope="row">{{$stt}}</td>
        <td scope="row">{{$user->id}}</td>
        <td scope="row">{{$user->name_user}}</td>
        <td scope="row">{{$user->email}}</td>
        <td scope="row">{{$user->address}}</td>
        <td scope="row">{{$user->phone}}</td>
        <td scope="row">
            <a class="btn btn-info" href="{{ route('users.delete', $user->id) }}">{{ trans('message.delete')}}</a>
        </td>
    </tr>
@endforeach
