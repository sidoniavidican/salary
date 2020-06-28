@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h4>Employee {{$sale->employee->full_name}}</h4>
    <h5>Sale {{$sale->id}}  </h5>
    <form action="{{route('sales.update', $sale->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Amount</label>
            <input class="form-control" name="amount" value="{{$sale->amount}}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success"> Edit sale </button> 
        </div>
    </form>
</div>
@endsection
