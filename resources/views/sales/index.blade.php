@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <a href="{{ route('sales.create') }}" class="btn btn-primary"> <i class="fas fa-cart-plus"></i></a>
    <table class="table"> 
        <thead>
            <td>Employee</td>
            <td>Amount</td>
            <td>Created</td>
            <td>Action</td>
        </thead>
        <tbody>
        @foreach($sales as $sale) 
            <tr>
                <td> {{$sale->employee->full_name}} </td>
                <td> {{$sale->amount}} </td>
                <td> {{$sale->created_at}} </td>
                <td>
                    <form action="{{ route('sales.destroy', $sale->id)}}" method="post">
                        <a href="{{ route('sales.edit', $sale->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
