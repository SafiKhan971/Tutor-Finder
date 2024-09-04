<div class="card border-0 shadow mb-4 p-3">
                    <div class="s-body text-center mt-3">

                    @if(Auth::user()->image!='')
                    <img src="{{asset('profile_pic/'.Auth::user()->image)}}" alt="avatar"  class="rounded-circle img-fluid" style="width: 150px;">
                    @else
                    <img src="{{asset('/assets/images/avatar7.png')}}" alt="avatar"  class="rounded-circle img-fluid" style="width: 150px;">
                
                    @endif



                        <!-- <img src="assets/assets/images/avatar7.png" alt="avatar"  class="rounded-circle img-fluid" style="width: 150px;"> -->
                        <h5 class="mt-3 pb-0">{{Auth::user()->name}}</h5>
                        <p class="text-muted mb-1 fs-6">{{Auth::user()->designation}}</p>
                        <div class="d-flex justify-content-center mb-2">
                            <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-primary">Change Profile Picture</button>
                        </div>
                    </div>
                </div>
                <div class="card account-nav border-0 shadow mb-4 mb-lg-0">
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush ">
                            <li class="list-group-item p-3">
                                <i class="fa fa-gear" aria-hidden="true"></i><a class="ms-3" href="{{route('account.profile')}}">Account Settings</a>
                            </li>
                            <li class="list-group-item p-3">
                                <i class="fa fa-graduation-cap" aria-hidden="true"></i><a class="ms-3" href="{{route('account.myTution')}}">My Tutions</a>
                            </li>
                            <li class="list-group-item d-flex p-3">
                                <i class="fa fa-envelope" aria-hidden="true"></i><a class="ms-3" href="{{ route('message.index') }}">Messages</a>
                            </li>  
                            <li class="list-group-item p-3">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i><a class="ms-3" href="{{route('account.logout')}}">Log out</a>
                            </li>
                                                       
                        </ul>
                    </div>
                </div>