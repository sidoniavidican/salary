@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <a href="{{ route('employees.create') }}" class="btn btn-primary"> <i class="fas fa-user-plus"></i></a>
    <table class="table"> 
        <thead>
            <td>Firstname</td>
            <td>Lastname</td>
            <td>Total sales this month</td>
            <td>Total sales</td>
            <td>Bonus</td>
            <td>Action</td>
        </thead>
        <tbody>
        @foreach($employees as $employee) 
            <tr>
                <td> {{$employee->first_name}} </td>
                <td> {{$employee->last_name}} </td>
                <td> {{$employee->month_sales}} </td>
                <td> {{$employee->total_sales}} </td>
                <td> {{$employee->bonus}} </td>
                <td>
                    <form action="{{ route('employees.destroy', $employee->id)}}" method="post">
                        <a href="{{ route('employees.show', $employee->id)}}" class="btn btn-info"><i class="fas fa-list"></i></a>
                        <a href="{{ route('employees.edit', $employee->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
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
