<header class="main-header">

   <!-- Logo -->
   <a href="{{ url('admin') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">{{ config('app.alias') }}</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>{{ config('app.name') }}</b> {{ config('app.alias') }}</span>
   </a>

   <!-- Header Navbar -->
   <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
         <ul class="nav navbar-nav">


            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
               <!-- Menu Toggle Button -->
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="{{ asset('assets/vendor/admin-lte/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">{{ Auth::user()->name }}</span>
               </a>
               <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                     <img src="{{ asset('assets/vendor/admin-lte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

                     <p>
                        {{ Auth::user()->name }} - {{ ucfirst(Auth::user()->getRoleNames()[0]) }}
                        <small>Registered on {{ Auth::user()->created_at->format('d M, Y') }}</small>
                     </p>
                  </li>

                  <!-- Menu Footer-->
                  <li class="user-footer">
                     <div class="pull-right">
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        </form>
                        <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        Logout
                        </a>
                     </div>
                  </li>
               </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
               <a href="#" data-toggle="control-sidebar"><i class="fa fa-gear"></i></a>
            </li>
         </ul>
      </div>
   </nav>
</header>