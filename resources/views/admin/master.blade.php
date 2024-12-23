
<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.partials.head')
</head>

<body>
    
  @include('admin.partials.navbar')    
  @include('admin.partials.sidebar') 
    
  <main class="content">
          
    <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
    <div class="container-fluid px-0">
      <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
        <div class="d-flex align-items-center">
          <!-- Search form -->
          
          <a href="https://themesberg.com/product/laravel/volt-admin-dashboard-template" target="_blank">
            <button
              class="btn mx-1 me-2 btn-secondary" type="button">
              <i
                class="fas fa-arrow-down mx-1">
              </i>
              Download
            </button>
          </a>
        </div>
        <!-- Navbar links -->
        <ul class="navbar-nav align-items-center">
          <li class="nav-item dropdown">
            <a class="nav-link text-dark notification-bell unread dropdown-toggle" data-unread-notifications="true"
              href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
              <svg class="icon icon-sm text-gray-900" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
                </path>
              </svg>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center mt-2 py-0">
              <div class="list-group list-group-flush">
                <a href="#" class="text-center text-primary fw-bold border-bottom border-light py-3">Notifications</a>
                <a href="#" class="list-group-item list-group-item-action border-bottom">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <!-- Avatar -->
                      <img alt="Image placeholder" src="/assets/img/team/profile-picture-1.jpg" class="avatar-md rounded">
                    </div>
                    <div class="col ps-0 ms-2">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <h4 class="h6 mb-0 text-small">Jose Leos</h4>
                        </div>
                        <div class="text-end">
                          <small class="text-danger">a few moments ago</small>
                        </div>
                      </div>
                      <p class="font-small mt-1 mb-0">Added you to an event "Project stand-up" tomorrow at 12:30 AM.</p>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action border-bottom">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <!-- Avatar -->
                      <img alt="Image placeholder" src="/assets/img/team/profile-picture-2.jpg" class="avatar-md rounded">
                    </div>
                    <div class="col ps-0 ms-2">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <h4 class="h6 mb-0 text-small">Neil Sims</h4>
                        </div>
                        <div class="text-end">
                          <small class="text-danger">2 hrs ago</small>
                        </div>
                      </div>
                      <p class="font-small mt-1 mb-0">You've been assigned a task for "Awesome new project".</p>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action border-bottom">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <!-- Avatar -->
                      <img alt="Image placeholder" src="/assets/img/team/profile-picture-3.jpg" class="avatar-md rounded">
                    </div>
                    <div class="col ps-0 m-2">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <h4 class="h6 mb-0 text-small">Roberta Casas</h4>
                        </div>
                        <div class="text-end">
                          <small>5 hrs ago</small>
                        </div>
                      </div>
                      <p class="font-small mt-1 mb-0">Tagged you in a document called "Financial plans",</p>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action border-bottom">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <!-- Avatar -->
                      <img alt="Image placeholder" src="/assets/img/team/profile-picture-4.jpg" class="avatar-md rounded">
                    </div>
                    <div class="col ps-0 ms-2">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <h4 class="h6 mb-0 text-small">Joseph Garth</h4>
                        </div>
                        <div class="text-end">
                          <small>1 d ago</small>
                        </div>
                      </div>
                      <p class="font-small mt-1 mb-0">New message: "Hey, what's up? All set for the presentation?"</p>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action border-bottom">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <!-- Avatar -->
                      <img alt="Image placeholder" src="/assets/img/team/profile-picture-5.jpg" class="avatar-md rounded">
                    </div>
                    <div class="col ps-0 ms-2">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <h4 class="h6 mb-0 text-small">Bonnie Green</h4>
                        </div>
                        <div class="text-end">
                          <small>2 hrs ago</small>
                        </div>
                      </div>
                      <p class="font-small mt-1 mb-0">New message: "We need to improve the UI/UX for the landing page."
                      </p>
                    </div>
                  </div>
                </a>
                <a href="#" class="dropdown-item text-center fw-bold rounded-bottom py-3">
                  <svg class="icon icon-xxs text-gray-400 me-1" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                    <path fill-rule="evenodd"
                      d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                      clip-rule="evenodd"></path>
                  </svg>
                  View all
                </a>
              </div>
            </div>
          </li>

          <li class="nav-item dropdown ms-lg-3">
            <a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              <div class="media d-flex align-items-center">
                <img class="avatar rounded-circle" alt="Image placeholder" src="/assets/img/team/profile-picture-1.jpg">
                <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                  <span
                    class="mb-0 font-small fw-bold text-gray-900">{{Auth::user()->full_name}}</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1">
              <a class="dropdown-item d-flex align-items-center" href="{{route('admin.profile.index')}}">
                <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                    clip-rule="evenodd"></path>
                </svg>
                My Profile
              </a>
            <div role="separator" class="dropdown-divider my-1">

            </div>
              <a href="{{route('auth.logout')}}" class="dropdown-item d-flex align-items-center" >
                <div wire:id="DD5gA1zL01MCdEocaHhg" wire:initial-data="{&quot;fingerprint&quot;:{&quot;id&quot;:&quot;DD5gA1zL01MCdEocaHhg&quot;,&quot;name&quot;:&quot;logout&quot;,&quot;locale&quot;:&quot;en&quot;,&quot;path&quot;:&quot;profile&quot;,&quot;method&quot;:&quot;GET&quot;,&quot;v&quot;:&quot;acj&quot;},&quot;effects&quot;:{&quot;listeners&quot;:[]},&quot;serverMemo&quot;:{&quot;children&quot;:[],&quot;errors&quot;:[],&quot;htmlHash&quot;:&quot;0e6e08b1&quot;,&quot;data&quot;:[],&quot;dataMeta&quot;:[],&quot;checksum&quot;:&quot;1d1f72a7bc9646ebd79f8068263734c8149a962107f8a4207b86db8df1ea2996&quot;}}" wire:click='logout'>

                  <svg class="dropdown-icon text-danger me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                  </svg>
                  Logout
                </div>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </div>
    </nav>
    <title wire:id="Q6hhD7MG6w58mQWgAv3s" wire:initial-data="{&quot;fingerprint&quot;:{&quot;id&quot;:&quot;Q6hhD7MG6w58mQWgAv3s&quot;,&quot;name&quot;:&quot;profile&quot;,&quot;locale&quot;:&quot;en&quot;,&quot;path&quot;:&quot;profile&quot;,&quot;method&quot;:&quot;GET&quot;,&quot;v&quot;:&quot;acj&quot;},&quot;effects&quot;:{&quot;listeners&quot;:[]},&quot;serverMemo&quot;:{&quot;children&quot;:[],&quot;errors&quot;:[],&quot;htmlHash&quot;:&quot;c0d2bc19&quot;,&quot;data&quot;:{&quot;user&quot;:{&quot;first_name&quot;:&quot;Admin&quot;,&quot;last_name&quot;:&quot;User&quot;,&quot;email&quot;:&quot;admin@volt.com&quot;,&quot;gender&quot;:null,&quot;address&quot;:null,&quot;number&quot;:null,&quot;city&quot;:null,&quot;ZIP&quot;:null},&quot;showSavedAlert&quot;:false,&quot;showDemoNotification&quot;:false},&quot;dataMeta&quot;:{&quot;models&quot;:{&quot;user&quot;:{&quot;class&quot;:&quot;App\\Models\\User&quot;,&quot;id&quot;:1,&quot;relations&quot;:[],&quot;connection&quot;:&quot;mysql&quot;,&quot;collectionClass&quot;:null}}},&quot;checksum&quot;:&quot;e5992d94072cd282108be1b2bb34c9091692814b5e70a2377ede8e2a983fbac9&quot;}}">@yield('title')</title>
      
    <div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
          <div style="width: 1250px">
            @if ($errors->any())
              <div class="alert alert-danger alert-dismissible">
                {{-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button> --}}
                  <ul style="list-style: none">
                      @foreach ($errors->all() as $error)
                          <li style="list-style: none">{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>  
            @endif 

            @if( Session::has('success') )
                <div class="alert alert-success alert-dismissible">
                    
                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                    {{ Session::get('success') }}
                </div>
            @endif
            @if( Session::has('error') )
                <div class="alert alert-danger alert-dismissible">
                    
                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                    {{ Session::get('error') }}
                </div>
            @endif
            
            @yield('content')
          </div>
      </div>
    </div>

    <!-- Livewire Component wire-end:Q6hhD7MG6w58mQWgAv3s -->
            
            <div class="theme-settings card bg-gray-800 pt-2 collapse" id="theme-settings">
        <div class="card-body bg-gray-800 text-white pt-4">
            <button type="button" class="btn-close theme-settings-close" aria-label="Close" data-bs-toggle="collapse"
                href="#theme-settings" role="button" aria-expanded="false" aria-controls="theme-settings"></button>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <p class="m-0 mb-1 me-4 fs-7">Open source <span role="img" aria-label="gratitude">💛</span></p>
                <a class="github-button" href="https://github.com/themesberg/volt-laravel-admin-dashboard"
                    data-color-scheme="no-preference: dark; light: light; dark: light;" data-icon="octicon-star"
                    data-size="large" data-show-count="true"
                    aria-label="Star themesberg/volt-bootstrap-5-dashboard on GitHub">Star</a>
            </div>
            <a href="https://themesberg.com/product/laravel/volt-admin-dashboard-template" target="_blank"
                class="btn btn-secondary d-inline-flex align-items-center justify-content-center mb-3 w-100">
                Download
                <svg class="icon icon-xs ms-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M2 9.5A3.5 3.5 0 005.5 13H9v2.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 15.586V13h2.5a4.5 4.5 0 10-.616-8.958 4.002 4.002 0 10-7.753 1.977A3.5 3.5 0 002 9.5zm9 3.5H9V8a1 1 0 012 0v5z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
            <p class="fs-7 text-gray-300 text-center">Available in the following technologies:</p>
            <div class="d-flex justify-content-center">
                <a class="me-3" href="https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard"
                    target="_blank">
                    <img src="/assets/img/technologies/bootstrap-5-logo.svg" class="image image-xs">
                </a>
                <a href="https://demo.themesberg.com/volt-react-dashboard/#/" target="_blank">
                    <img src="/assets/img/technologies/react-logo.svg" class="image image-xs">
                </a>
            </div>
        </div>
    </div>
    <div class="card theme-settings bg-gray-800 theme-settings-expand" id="theme-settings-expand">
        <div class="card-body bg-gray-800 text-white rounded-top p-3 py-2">
            <span class="fw-bold d-inline-flex align-items-center h6">
                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                        clip-rule="evenodd"></path>
                </svg>
                Settings
            </span>
        </div>
    </div>
    @include('admin.partials.footer')
  </main>

</body>

</html>