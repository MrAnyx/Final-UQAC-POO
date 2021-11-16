<div class="ui top fixed menu">
  <div class="item">
    e-Walmart
  </div>

  <a class="item" href="{{ route('app_home') }}"><i class="shopping basket icon"></i> Shop</a>

  <div class="ui dropdown item">
    <i class="tags icon"></i> Departments
    <i class="dropdown icon"></i>
    <div class="menu">
      @foreach ($allDepartments as $department)
        <a class="item" href="{{ route('app_department', ['id' => $department->id]) }}">{{$department->name}}</a>
      @endforeach
    </div>
  </div>

  <div class="right menu">
    {{-- User not authenticated --}}
    <div class="ui dropdown item">
      <i class="user circle icon"></i> User
      <i class="dropdown icon"></i>
      <div class="menu">
        <a class="item">Login</a>
        <a class="item">Register</a>
      </div>
    </div>
    
    {{-- User authenticated --}}
    {{-- <div class="ui dropdown item">
      <i class="user circle icon"></i> MrAnyx
      <i class="dropdown icon"></i>
      <div class="menu">
        <a class="item">Log out</a>
      </div>
    </div> --}}

    <a class="item">
      <i class="icon shopping cart"></i><div class="ui teal horizontal label" style="margin: 0 0; margin-left: 3px;">12</div>
    </a>
  </div>

</div>