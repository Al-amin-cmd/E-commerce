<x-admin.master>
<div class="container">
          <!-- Breadcrumb -->
          <!-- /Breadcrumb -->
    
          <div class="row">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>{{$user->name}}</h4>
                      <p class="text-secondary mb-1">{{$user->profile? $user->profile->biodata:''}}</p>
                      <p class="text-muted font-size-sm">{{$user->profile? $user->profile->present_address:''}}</p>
                      <button class="btn btn-primary">Follow</button>
                      <button class="btn btn-outline-primary">Message</button>
                    </div>
                  </div>
                </div>
              </div>
              </div>
              
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-primary">
                      {{$user->name}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-primary">
                    {{$user->email}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Present</h6>
                    </div>
                    <div class="col-sm-9 text-dark">
                    {{$user->profile?$user->profile->present_address:''}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Permanent</h6>
                    </div>
                    <div class="col-sm-9 text-primary">
                    {{$user->profile?$user->profile->permanent_address:''}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Birth</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$user->profile? $user->profile->dob:''}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                     
                    </div>
                  </div>
                </div>
              </div>

              


            </div>
          </div>

        </div>
</x-admin.master>