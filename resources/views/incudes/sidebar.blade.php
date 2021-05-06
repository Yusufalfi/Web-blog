<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Admin</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">AD</a>
      </div>
      <ul class="sidebar-menu">
       
          <li class="nav-item dropdown">
            <a href="" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
          </li>
          <li class="nav-item dropdown">
            <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Post</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href=" {{ route('posts.index')}}">List Post</a></li>
            </ul>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href=" {{ route('posts.hapus')}}">Trash</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-th"></i> <span>Category</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href=" {{ route('category.index')}}">List Category</a></li>
            </ul>
          </li>
     
          <li class="nav-item dropdown">
            <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book-open"></i> <span>Tags</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href=" {{ route('tags.index')}}">List Tags</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Users</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href=" {{ route('users.index')}}">List Users</a></li>
            </ul>
          </li>
     
        </ul>

      
    </aside>
  </div>
