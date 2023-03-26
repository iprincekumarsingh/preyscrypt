<div class="table-responsive">
    <h1>
        Latest Users
    </h1>
    <table class="table mb-0">

        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Customer ID</th>
                <th>Phone</th>
                <th>DOB</th>
            </tr>
        </thead>
        <tbody>

            @php

            $count = 0;
            $users = DB::table('users')
            ->where('role', 'user')
            ->orderBy('id', 'desc')->limit(5)->get();

            @endphp
            @foreach($users as $user)
            @php
            $count++;
            @endphp
            <tr>
                <th scope="row">{{ $count }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->customer_id }}</td>
                <td>{{$user->phone}}</td>
                <td>{{ $user->dob }}</td>
            </tr>
            @endforeach


        </tbody>
        <!-- end tbody -->
    </table><!-- end table -->

    {{-- view all link --}}
    <div class="text-end p-2">
        <a href="{{route('hospital.users')}}" class=" btn-primary">View All</a>
    </div>
    


</div>