@extends('admin.layout.master')
@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">{{ trans('message.manageusers')}}</strong>
                </div>
                <div class="card-body">
                    <table class="table table-striped" >
                        <thead>
                            <tr>
                                <th scope="col">{{ trans('message.stt')}}</th>
                                <th scope="col">{{ trans('message.id')}}</th>
                                <th scope="col">{{ trans('message.nameuser')}}</th>
                                <th scope="col">{{ trans('message.address')}}</th>
                                <th scope="col">{{ trans('message.addresshome')}}</th>
                                <th scope="col">{{ trans('message.phone')}}</th>
                                <th scope="col">{{ trans('message.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($users))
                                @include('admin.users.helper')
                            @endif
                        </tbody>
                    </table>
                    <p>
                        @if(Session::has('message_delete'))
                            {{"Delete Success"}}
                            @if(Session::forget('message_delete'))
                            @endif
                        @endif
                    </p>
                    @if(isset($users))
                        {{ $users->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@stop
