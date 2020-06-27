@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <table class="table"> 
        <thead>
            <td>Amount</td>
            <td>Created</td>
        </thead>
        <tbody>
        @foreach($employee->sales as $sale) 
            <tr> 
                <td> {{$sale->amount}} </td>
                <td> {{$sale->created_at}} </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
