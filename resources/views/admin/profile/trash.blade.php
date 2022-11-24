<x-admin.master>




    <!-- Header Area End -->
    <div class="table-area ">

        <div class="container-fluid pt-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="cat-list-left">
                        <h4>User List</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="justify-content-end">
                        <a href="{{ route('user.index') }}" class="btn btn-sm btn-outline-info">list</a>

                    </div>
                </div>
            </div>
        </div>

        <!-- Table Start  -->

        <div class="container-fluid pt-4">
            <table class="table bg-light rounded">
                <thead class="bg-primary">
                    <tr>

                        <th scope="col">SL</th>
                        <th scope="col">Name</th>
                        <th scope="col">Role</th>


                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $users)
                        <tr>

                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->role->name }}</td>


                            <td><a class="btn btn-danger btn-sm"
                                    href="{{ route('user.delete', $users->id) }}">remove</a><a
                                    class="btn btn-info btn-sm"
                                    href="{{ route('user.restore', $users->id) }}">restore</a> <a
                                    class="btn btn-primary btn-sm" href="#">view</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        <!-- Table End  -->




</x-admin.master>
