<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            Scouts<span>Pro</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item">
                <a href="{{route('ParentDashboard')}}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
                  {{-- <li class="nav-item">
                      <a href="{{ route('dashboard') }}" class="nav-link">
                          <i class="link-icon" data-feather="user"></i>
                          <span class="link-title">Profile</span>
                      </a> --}}
                @php
                $id = Auth::user()->id;
                $profileData = App\Models\User::find($id);
  
            @endphp
            </li>
            <li class="nav-item nav-category">Profile</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button"
                    aria-expanded="false" aria-controls="emails">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">{{ $profileData->name }}</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="emails">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                          <a href="{{ Route('parent.myChild') }}" class="nav-link">My Child</a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ Route('parent.addChild') }}" class="nav-link">Add Child</a>
                      </li>
                        {{-- <li class="nav-item">
                            <a href="pages/email/read.html" class="nav-link">Read</a>
                        </li> --}}
                    </ul>
                </div>
            </li>
  
  
  
  
  </nav>