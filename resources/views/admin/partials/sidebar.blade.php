<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">       
        @if(!empty(Auth::user()->profile->profile_pic)) 
        <img src="{{asset('public/storage/profile-pictures/'.Auth::user()->profile->profile_pic)}}" class="img-responsive img-circle" height="10px;" width="10px;" alt="User Image"
        >
        @else
        Image Donot Exist
        @endif
      </div>
      <div class="pull-left info">
        <p>{{Auth::user()->fullname}}</p>        
        <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
      </div>
    </div>     
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <br>
    <ul class="sidebar-menu" data-widget="tree">             
      <li class="header">PAGES</li>        
      <li><a href="{{route('users')}}"><i class="fa fa-user text-aqua"></i> <span>Users</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>