<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Bootstrap core CSS-->
  <link href="{{ asset("css/bootstrap.css")}}" rel="stylesheet">

  <!-- Icons -->
  <link href="{{ asset('/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
  
  <!-- Custom styles for this template-->
  <link href="{{ asset('admin/sb-admin.css') }}" rel="stylesheet">

   <!-- Styles -->
   <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<body class="fixed-nav text-right" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-light  bg-secondary fixed-top" id="mainNav">
        <div class="container">
        
         @include('partials.navbar')


         <ul class="navbar-nav navbar-sidenav h-auto" id="exampleAccordion">
            <li class="nav-item mt-5" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">الإحصائيات</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" >
                <a class="nav-link" href="{{ route('category.index') }}">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">التصنيفات</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right">
                <a class="nav-link" href="{{ route('user.index') }}">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">المستخدمين</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="المنشورات">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePosts" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-wrench"></i>
                    <span class="nav-link-text">المنشورات</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapsePosts">
                    <li>
                        <a href="{{ route('posts.index') }}">جميع المنشورات</a>
                    </li>
                    <li>
                        <a href="{{ route('posts.create') }}">إضافة منشور</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="الأدوار">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseRoles" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-wrench"></i>
                    <span class="nav-link-text">الأدوار</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseRoles">
                    <li>
                        <a href="">الأدوار</a>
                    </li>
                    <li>
                        <a href="#">إضافة دور</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right">
                <a class="nav-link" href="{{ route('permissions') }}">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text"> الصلاحيات</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePages" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-file"></i>
                    <span class="nav-link-text">الصفحات</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapsePages">
                    <li>
                        <a href="{{ route('page.index') }}"> الصفحات</a>
                    </li>
                    <li>
                        <a href="{{  route('page.create') }}"> إضافة صفحة جديدة</a>
                    </li>
                </ul>
            </li>
        </ul>
            </div>
        <div>
  </nav>

  <!-- /.content-wrapper-->
  <div class="content-wrapper">
      <!-- /.container-fluid-->
      <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb mt-5">
              <li class="breadcrumb-item">
                  <a href="/dashboard">لوحة التحكم </a>
              </li>
              <li class="breadcrumb-item active">
                  @yield('breadcrumb')
              </li>
          </ol>
         @yield('content')
       </div>
   </div>

   <footer class="bg-secondary text-center p-4">
        <a href="https://academy.hsoub.com">
           <img style="width:100px" src="https://academy.hsoub.com/uploads/monthly_2016_01/SiteLogo-346x108.png.dd3bdd5dfa0e4a7099ebc51f8484032e.png" alt="أكاديمية حسوب">
        </a>
    </footer>
  </div>
  <script src="{{ asset("js/jquery-3.5.1.slim.min.js") }}"></script>
  <script src="{{ asset("js/popper.min.js") }}"></script>
  <script src="{{ asset("js/bootstrap.js") }}"></script>
  @yield('script')
</body>

</html>
