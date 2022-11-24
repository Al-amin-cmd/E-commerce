<x-admin.master>


  <div class="container">

    <!-- Header Area End -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">User List</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
          <a href="{{route('user.trash')}}">
            <button type="button" class="btn btn-sm btn-outline-danger">Trash</button>
          </a>
        </div>
      </div>
    </div>
    <div class="table-area ">
      <!-- Table Start  -->

      <table class="table bg-light rounded">
        <thead class="bg-primary text-white">
          <tr>

            <th scope="col">SL</th>
            <th scope="col">Name</th>
            <th scope="col">Role</th>

            <th scope="col"><center>Action</center></th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $users)
          <tr>

            <td>{{ $loop->iteration}}</td>
            <td>{{ $users->name }}</td>
            <td>{{ $users->role->name}}</td>

            <td>
              <center>
              <a class="btn btn-danger btn-sm" href="{{ route('user.destroy',$users->id)}}">remove</a>
              <a class="btn btn-info btn-sm" href="{{route('role.change',$users->id)}}">change</a> 
              <a class="btn btn-primary btn-sm" href="{{route('user.show',$users->id)}}">view</a>
              </center>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>


      <!-- Table End  -->

    </div>
  </div>

</x-admin.master>
