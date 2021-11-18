<div class="ui top fixed menu">
  <div class="item">
    <img src="{{ asset('storage/images/logo_horizontal.png') }}" alt="" class="ui" id="logo-navbar">
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
    @guest
      <div class="ui dropdown item">
        <i class="user circle icon"></i> User
        <i class="dropdown icon"></i>
        <div class="menu">
          <a class="item" href="{{route('login')}}">Login</a>
          <a class="item" href="{{route('register')}}">Register</a>
        </div>
      </div>
    @endguest
    
    {{-- User authenticated --}}
    @auth
      <div class="ui dropdown item">
        <i class="user circle icon"></i> {{auth()->user()->name}}
        <i class="dropdown icon"></i>
        <div class="menu">
          <a class="item" href="{{route('logout')}}">Log out</a>
        </div>
      </div>
      
      <a class="item" href="{{route('app_cart')}}">
        <i class="icon shopping cart"></i><div class="ui teal horizontal label" style="margin: 0 0; margin-left: 3px;">
          <cart-quantity></cart-quantity>
        </div>
      </a>
    @endauth
  </div>

</div>