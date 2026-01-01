@extends('layouts.app')

@section('content')

<div class="container-fluid mt-4">

    <h4 class="mb-4 text-center">Student Details</h4>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>No.</th>
                    <th>Name</th>
                    <th>Registration No.</th>
                    <th>Telephone No.</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @php
                    $students =[
                        [
                            'name'=>'Jamz Fernando',
                            'reg'=>'SEU/IS/21/ICT/024',
                            'tel'=>'045896213',
                            'email'=>'jamz@gmail.com',
                            'status'=>'active'
                        ],
                        [
                            'name'=>'Jamz Fernando',
                            'reg'=>'SEU/IS/21/ICT/024',
                            'tel'=>'045896213',
                            'email'=>'jamz@gmail.com',
                            'status'=>'inactive'
                        ],
                        [
                            'name'=>'Jamz Fernando',
                            'reg'=>'SEU/IS/21/ICT/024',
                            'tel'=>'045896213',
                            'email'=>'jamz@gmail.com',
                            'status'=>'active'
                        ],
                    ];
                @endphp
                @foreach ($students as $index=>$student)
                    
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{$student['name']}}</td>
                    <td class="text-center">{{$student['reg']}}</td>
                    <td class="text-center">{{$student['tel']}}</td>
                    <td>{{$student['email']}}</td>
                    <td class="text-center">
                        <span class="badge bg-{{ $student['status']== 'active' ? 'success' : 'danger' }}">{{ $student['status'] }}</span>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-primary btn-sm">View</button>
                        <button class="btn btn-warning btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
