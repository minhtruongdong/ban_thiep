@extends('admin.master')
@section('content')
<div>
    <h1>CREATE USER</h1>
    <form action="{{route('admin.user.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow components-section">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-lg-4 col-sm-6">
                                <!-- Form -->
                                <div class="mb-4">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="{{old('email')}}">
                                </div>
                                <!-- End of Form -->    
                                <!-- Form -->
                                <div class="mb-3">
                                    <label for="firstName">Full name</label>
                                    <input type="text" class="form-control"  value="Mark" name="full_name" value="{{old('full_name')}}" required>             
                                </div>
                                <!-- End of Form -->
    
                                
                            </div>
    
                            {{-- -------------------------------------------------------------------------------------------------------- --}}
    
                            <div class="col-lg-4 col-sm-6">
                                <!-- Form -->
                                <div class="mb-4">
                                    <label for="exampleInputIconPassword">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="exampleInputIconPassword" placeholder="Password" aria-label="Password" name="password" value="{{old('password')}}">
                                        <span class="input-group-text" id="basic-addon3">
                                            <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                                        </span>
                                    </div>
                                </div>
                                <!-- End of Form -->
                                <!-- Form -->
                                <div class="mb-3">
                                    <label >Phone</label>
                                    <input type="text" class="form-control" value="0123......" name="phone" value="{{old('phone')}}" required>             
                                </div>
                                <!-- End of Form -->
                                
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="mb-4">
                                <label for="exampleInputIconPassword">Confirm Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder="Password" name="password_confirmation">
                                    <span class="input-group-text" id="basic-addon3">
                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                                    </span>
                                </div>
                                </div>
                                <div class="mb-4">
                                    <label class="my-1 me-2" for="country">Level</label>
                                    <select class="form-select" id="country" aria-label="Default select example" name="level">
                                        <option selected>Open this select menu</option>
                                        <option value="1" {{old('level') == 1 ? 'selected' : ''}}>Admin</option>
                                        <option value="2" {{old('level') == 2 ? 'selected' : ''}}>Member</option>
                                        
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="my-1 me-2" for="country">Status</label>
                                    <select class="form-select" id="country" aria-label="Default select example" name="status">
                                        <option selected>Open this select menu</option>
                                        <option value="1" {{old('status') == 1 ? 'selected' : '' }}>Show</option>
                                        <option value="2" {{old('status') == 2 ? 'selected' : '' }}>Hidde</option>
                                    </select>
                                </div>
                            </div>




                            <button class="btn mx-1 me-2 btn-secondary" type="submit">
                                Create
                            </button>
                        </div>
                            {{-- -------------------------------------------------------------------------------------------------------- --}}
                            
                        
                        
                        <div class="row mb-5 mb-lg-5">
                            <div class="col-lg-3 col-md-6">
                                <!-- Checkboxes -->
                                <div class="mb-3">
                                    <span class="h6 fw-bold">Checkboxes Round</span>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck10">
                                    <label class="form-check-label" for="defaultCheck10">
                                    Default checkbox
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck20" disabled>
                                    <label class="form-check-label" for="defaultCheck20">
                                    Disabled checkbox
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 mt-4 mt-md-0">
                                <!-- Radio -->
                                <fieldset>
                                    <legend class="h6">Radios</legend>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                        Default radio
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                        <label class="form-check-label" for="exampleRadios2">
                                        Second default radio
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3" disabled>
                                        <label class="form-check-label" for="exampleRadios3">
                                        Disabled radio
                                        </label>
                                    </div>
                                    <!-- End of Radio -->
                                </fieldset>
                            </div>
                            <div class="col-lg-3 col-sm-6 mt-4 mt-md-0">
                                <div class="mb-3">
                                    <span class="h6 fw-bold">Switches</span>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Default switch input</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch input</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDisabled" disabled>
                                    <label class="form-check-label" for="flexSwitchCheckDisabled">Disabled switch input</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckCheckedDisabled" checked disabled>
                                    <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">Disabled checked switch input</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection