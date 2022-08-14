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

<h1>Send a message to the Admin</h1> <br><br>
@if(session()->has('message'))
          <div class="alert alert-success alert-dismissible">
            <button class="close" type="button" data-dismiss="alert">x</button>
            {{session()->get('message')}}
          </div>
        @endif

<form style="border:4px solid red; padding:20px; border-radius:15px" action="{{url('messages')}}" method="POST" enctype="multipart/form-data">

{{ csrf_field() }}
   
    <div style="margin-bottom:33px">
        <label for="a"><span style='color:tomato; font-size:33px'>Full Name:</span></label>
       <input type="text" name="name" placeholder="Enter Full Name" style="width:30%; padding:15px; font-size:22px">
    </div>

    <div style="margin-bottom:33px">
        <label for="a"><span style='color:tomato; font-size:33px'>Message:</span></label>
      <textarea name="message" style="font-size:22px" placeholder="Enter Message....." name="" id="" cols="60" rows="5">
       
      </textarea>
    </div>

    <div style="margin-bottom:33px; text-align:center">
         <input style="font-size:22px; text-align:center" class="btn btn-success" type="submit" value="submit">
    </div>

</form> <br><br> <br><br>










<h1 style="color:green">My Messages</h1> <br><br>





<table id="example" class="table table-bordered" style="width:; background-color:green margin-top:30px">
        <thead>
            <tr style="color:tomato">
                <th style="color:tomato">MESSAGE</th>
                <th style="color:tomato">DATE AND TIME</th>
</tr>
        
<tbody>

@foreach($data3 as $data3)
<tr>
    <td>{{$data3->message}}</td>
    <td>{{$data3->created_at}}</td>

</tr>
@endforeach

        </tbody>
    </table>
<br><br><br>




</div>
@endsection
