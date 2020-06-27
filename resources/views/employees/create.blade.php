@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <form action="{{route('employees.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Firstname</label>
            <input class="form-control " type="text" name="first_name"> 
        </div>
        <div class="form-group">
            <label>Lastname</label>
            <input class="form-control" type="text"  name="last_name">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success"> Add employee </button> 
        </div>
    </form>
</div>
@endsection
