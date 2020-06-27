@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <form action="{{route('employees.update', $employee->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>First name</label>
            <input class="form-control" name="description" value="{{$employee->first_name}}">
        </div>
        <div class="form-group">
            <label>Last name</label>
            <input class="form-control" name="description" value="{{$employee->last_name}}"> 
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success"> Edit employee </button> 
        </div>
    </form>
</div>
@endsection
