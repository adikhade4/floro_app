@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-md-12">
   <div class="card">
      <div class="card-header">
         <div>
            <span class="float-sm-left h5">
            User Management
            </span>
            <div class="my-4">
               <form action="/search" method="GET">
                  <div class="input-group">
                     <input class="form-control mr-sm-4" type="search" placeholder="Search by User Name,Email" name="search" aria-label="Search">
                     <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
               </form>
               </div>
               <a class="btn btn-primary mt-2 float-sm-right" style="margin-left: 10px;" href="/create" >
               Create User Account
               </a>
               {{-- <button type="button" class="btn btn-primary" href="/users/create">Primary</button> --}}
               <a class="btn btn-primary mt-2 float-sm-right" href="{{ route('export_excel.excel') }}">
               Export Users
               </a>
            </div>
         </div>
         <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
               {{ session('status') }}
            </div>
            @endif
            <form action="/home" method="GET">
               <div class="table-list-container table-responsive">
                  <table class="table table-striped table-hover">
                     <div class="search-bar col-sm-12 col-lg-6">
                        <thead class="table-head">
                           <tr>
                              <th scope="col">@sortablelink('username')</th>
                              <th scope="col">@sortablelink('firstname')</th>
                              <th scope="col">@sortablelink('lastname')</th>
                              <th scope="col">@sortablelink('email')</th>
                              <th scope="col">Created at</th>
                              <th scope="col">Last Login at</th>
                              <th scope="col">Actions</th>
                           </tr>
                        </thead>
                        @foreach ($user as $userm) 
                        <tbody>
                           <tr>
                              <td>{{$userm->username}}</td>
                              <td>{{$userm->firstname}}</td>
                              <td>{{$userm->lastname}}</td>
                              <td>{{$userm->email}}</td>
                              <td>{{$userm->created_at}}</td>
                              <td>{{$userm->updated_at}}</td>
                              <td> 
                                 <a href="/user/{{$userm->id }}/edit" class="btn btn-primary">Edit</a>
                                 <a href="/user/{{$userm->id}}" class="btn btn-danger">Delete</a>
                           </tr>
                        </tbody>
                        @endforeach
                  </table>
                  {{$user->links()}}
                  </div>
            </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection