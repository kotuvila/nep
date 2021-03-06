@extends('home')

@section('cont')
<h3 class="p-3 display-4">Crime report handling</h3>
<hr>
<span>
    <h3 class="text-center bg-success text-light">{{session('message')}}</h3>
</span>
<div class="row justify-content-between">
    <div class="col-md-12">
        <h6>Crime information</h6>
        <table class="table table-dark table-striped border-secondary rounded-lg mr-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>crime type</th>
                    <th>description</th>
                    <th>Location</th>
                    <th>Date complained logged</th>
                    <th>Action taken</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$crime->id}}</td>
                    @switch($crime->crime_type)
                    @case('1')
                    <td>Illegal tree cutting</td>
                    @break;
                    @case('2')
                    <td>Illegal mining</td>
                    @endswitch
                    <td>{{$crime->description}}</td>
                    <td>...</td>
                    <td>{{date('d-m-Y',strtotime($crime->created_at))}}</td>
                    @switch($crime->action_taken)
                    @case('0')
                    <td>To be taken</td>
                    @break;
                    @case('1')
                    <td>Investigated and Rejected</td>
                    @break;
                    @case('2')
                    <td>Investigated and action taken</td>
                    @endswitch
                    <td>{{$crime->status}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</br>
<div class="row justify-content-between">
    <div class="col-md-8">
        <h6>Prerequisites</h6>
        <table class="table table-dark table-striped border-secondary rounded-lg mr-4">
            <thead>
                <tr>
                    <th>Requested by</th>
                    <th>status</th>
                    <th>remarks</th>
                </tr>
            </thead>
            <tbody>
            @foreach($Prerequisites as $prerequisite)<tr>
                    <td>{{$prerequisite->remark}}</td>
                    <td>{{$prerequisite->requst_organization}}</td>
                    <td>{{$prerequisite->email}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<hr>
</br>
<div class="row justify-content-between">
    <div class="col-md-8">
    @switch(Auth::user()->role_id)
    @case('3')
        <h6>Assign Manager/Staff</h6>
    @break;
    @case('4')
        <h6>Assign Staff</h6>
    @endswitch
        <table class="table table-dark table-striped border-secondary rounded-lg mr-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th>role</th>
                    <th>email</th>
                    <th>assign</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Users as $user)<tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->role->title}}<td>
                    <td>{{$user->email}}</td>
                    <td><a href="/approval-item/confirmassign/{{$user->id}}/{{$Process_item->id}}" class="text-muted">assign</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
