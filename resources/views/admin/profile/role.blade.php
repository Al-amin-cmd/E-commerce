<x-admin.master>
    <x-slot:title>
        Role edit
        </x-slot>

        @if (session('message'))
        <span class="text-success">{{ session('message') }}</span>
        @endif

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Role</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('role.index') }}">
                    <button type="button" class="btn btn-sm btn-outline-info">
                        <span data-feather="list"></span>
                        List
                    </button>
                </a>
            </div>
        </div>

        <x-forms.errors />

        <div class="container bg-light rounded">
            <form action="{{ route('change.update', $role->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <label>change role</label>
                <select name="role" class="form-control">
                    @foreach ($option as $role )
                    <option value="{{$role->id}}">{{$role->name}}</option>

                    @endforeach
                </select>


                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>

</x-admin.master>