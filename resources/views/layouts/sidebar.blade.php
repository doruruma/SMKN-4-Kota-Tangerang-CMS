  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center bg-white justify-content-center mb-1" href="{{ url('/') }}" style="color:#28479c">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">LPC<sup>3</sup></div>
      </a>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item dashboard">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tsachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Heading -->
      <div class="sidebar-heading">
        Content Management
      </div>

      <!-- Nav Item - Posts Collapse Menu -->
      <li class="nav-item posts">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePost" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fas-cog"></i>
          <span>Posts</span>
        </a>
        <div id="collapsePost" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Posts Menu</h6>
            <a class="collapse-item" href="{{ url('/posts') }}">Posts Data</a>
            <a class="collapse-item" href="{{ url('/posts/add') }}">Add Posts</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item pages">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wsrench"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pages Menu</h6>
            <a class="collapse-item" href="utilities-color.html">Pages Data</a>
            <a class="collapse-item" href="utilities-border.html">Add Pages</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Media Collapse Menu -->
      <li class="nav-item media">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMedia" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wsrench"></i>
          <span>Media</span>
        </a>
        <div id="collapseMedia" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Media Menu</h6>
            <a class="collapse-item" href="utilities-color.html">Media Data</a>
            <a class="collapse-item" href="utilities-border.html">Add Media</a>
          </div>
        </div>
      </li>

      <!-- Heading -->
      <div class="sidebar-heading">
        School Admin
      </div>

      <!-- Nav Item - Official Collapse Menu -->
      <li class="nav-item official">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOfficial" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wsrench"></i>
          <span>Official</span>
        </a>
        <div id="collapseOfficial" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Media Menu</h6>
            <a class="collapse-item" href="utilities-color.html">Official Data</a>
            <a class="collapse-item" href="utilities-border.html">Add Official</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Teacher Collapse Menu -->
      <li class="nav-item teacher">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTeacher" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wsrench"></i>
          <span>Teacher</span>
        </a>
        <div id="collapseTeacher" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Media Menu</h6>
            <a class="collapse-item" href="utilities-color.html">Teacher Data</a>
            <a class="collapse-item" href="utilities-border.html">Add Teacher</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Major Collapse Menu -->
      <li class="nav-item major">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMajor" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wsrench"></i>
          <span>Major</span>
        </a>
        <div id="collapseMajor" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Media Menu</h6>
            <a class="collapse-item" href="utilities-color.html">Major Data</a>
            <a class="collapse-item" href="utilities-border.html">Add Major</a>
          </div>
        </div>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->