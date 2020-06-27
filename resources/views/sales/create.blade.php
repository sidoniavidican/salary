@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <form action="{{route('sales.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Employee</label>
            <select class="form-control" name="employee_id">      
                @foreach($employees as $employee)
                 <option value="{{$employee->id}}"> {{$employee->first_name}} {{$employee->last_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Amount</label>
            <input class="form-control" type="text"  name="amount">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success"> Add sale </button> 
        </div>
    </form>
</div>
@endsection
