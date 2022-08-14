@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! Welcome Back.
                </div>
            </div>
        </div>
    </div> <br> <br><br>

    <h1 style="text-align:center; text-decoration:; font-size:30px; color:green">ALL USERS</h1>
        <br>

        @if(session()->has('message'))
          <div class="alert alert-success alert-dismissible">
            <button class="close" type="button" data-dismiss="alert">x</button>
            {{session()->get('message')}}
          </div>
        @endif <br>

        <div>

       

     
        <form class="form-inline" action="{{url('search_user_by_status')}}" method="get" style="float:right; padding-top:15px">
        
            <div class="form-group">
                <label style="font-size:22px; color:blue" for="aa">Search by Status:</label> &nbsp; <br> <br>
            <input type="search" style="" class="form-control mr-2" placeholder="Active or Pending" name="search">
            </div>

            <div class="form-group">
            <input type="submit" value="Search" style="background-color:green" class="btn btn-success">
            </div>
          </form>
          </div>

<table id="example" class="table table-bordered" style="width:; background-color:green margin-top:30px">
        <thead>
            <tr style="color:tomato">
                <th style="color:tomato">FULL NAME</th>
                <th style="color:tomato">EMAIL</th>
                <th style="color:tomato">PHONE</th>
                <th style="color:tomato">STATUS</th>
                <th style="color:tomato">ACTIVATE</th>
                <th style="color:tomato">DEACTIVATE</th>
                <th style="color:tomato">DELETE</th>
</tr>
</thead>
<tbody>

@foreach($data as $data)
<tr>
    <td>{{$data->name}}</td>
    <td>{{$data->email}}</td>
    <td>{{$data->phone}}</td>
    <td>{{$data->status}}</td>
    <td style="color:white"><a class="btn btn-success" href="{{url('activate_user', $data->id)}}">Activate</a></td>
    <td style="color:white"><a class="btn btn-info" href="{{url('deactivate_user', $data->id)}}">Deactivate</a></td>
    <td style="color:white"><a onclick="return confirm('Are you sure you want to delete this User?')" class="btn btn-danger" href="{{url('delete_user', $data->id)}}">Delete</a></td>
</tr>
@endforeach

        </tbody>
    </table>











    <h1 style="text-align:center; margin-top:10%; text-decoration:; font-size:30px; color:green">ALL MESSAGES</h1>
        <br>


    



        <table id="examplee" class="table table-bordered" style="width:; background-color:green margin-top:30px">
        <thead>
            <tr style="color:tomato">
                <th style="color:tomato">USER NAME</th>
                <th style="color:tomato">MESSAGE</th>
                <th style="color:tomato">DATE AND TIME</th>
                </tr>
</thead>

     
<tbody>

@foreach($data2 as $data2)
<tr>
    <td>{{$data2->name}}</td>
    <td>{{$data2->message}}</td>
    <td>{{$data2->created_at}}</td>
</tr>
@endforeach

        </tbody>
    </table>

<br><br><br>


</div>
@endsection
