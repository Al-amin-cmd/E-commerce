<x-admin.master>
    <div class="container">

        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header text-white bg-primary">
                    <h5>Profile Edit</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('profile.update',$user->profile->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col">
                                <div class="form-group ">
                                    <input type="text" name="name" placeholder="name" id="name" class="form-control" value="{{$user->name}}">
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">

                                    <input type="email" name="email" placeholder="Email" class="form-control" value="{{$user->email}}">

                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <div class="form-group ">
                                    <input type="text" name="present_address" id="name" class="form-control" placeholder="present_address" value="{{$user->profile->present_address}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group ">
                                    <input type="text" name="permanent_address" id="name" class="form-control" placeholder="permanent_address" value="{{$user->profile->permanent_address}}">
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <div class="form-group ">
                                    <input type="text" name="facebook_url" id="name" class="form-control" placeholder="facebook_url" value="{{$user->profile->facebook_url}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group ">
                                    <input type="text" name="tweeter_url" id="name" class="form-control" placeholder="twitter_url" value="{{$user->profile->tweeter_url}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group ">
                                    <input type="text" name="biodata" id="name" class="form-control" placeholder="Biodata" value="{{$user->profile->biodata}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">

                                    <input type="text" name="dob" class="form-control" placeholder="Date of Birth" onfocus="(this.type='date')" />
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-2">

                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-2">
                                    <button type="submit" class="btn btn-block btn-dark form-control">Register Now</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-admin.master>