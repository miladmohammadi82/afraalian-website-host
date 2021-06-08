<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title }}</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">



    </head>
    <body>
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
              <!-- Left navbar links -->
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                  <a href="index3.html" class="nav-link">خانه</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                  <a href="#" class="nav-link">تماس</a>
                </li>
              </ul>


              <!-- Right navbar links -->
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
                          class="fa fa-th-large"></i></a>
                </li>
              </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
              <!-- Brand Logo -->
              <a href="" class="brand-link">
                <span class="brand-text font-weight-light">پنل مدیریت</span>
              </a>

              <!-- Sidebar -->
              <div class="sidebar" style="direction: ltr">
                <div style="direction: rtl">
                  <!-- Sidebar user panel (optional) -->
                  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                      <img src="https://www.gravatar.com/avatar/52f0fbcbedee04a121cba8dad1174462?s=200&d=mm&r=g" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                      <a href="#" class="d-block">میلاد محمدی</a>
                    </div>
                  </div>

                  <!-- Sidebar Menu -->
                  <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                      <!-- Add icons to the links using the .nav-icon class
                           with font-awesome or any other icon font library -->
                      <li class="nav-item has-treeview menu-open">
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="{{ route('admin.dashboard.page') }}" class="nav-link">
                              <i class="fas fa-tachometer-alt"></i>&nbsp;
                              <p>داشبورد</p>
                            </a>
                          </li>
                        </ul>
                      </li>

                      <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-cog"></i>
                          <p>
                            مدیریت
                            <i class="right fa fa-angle-left"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="{{ route('showUsers.admin.panel') }}" class="nav-link">
                              <i class="fa fa-circle-o nav-icon"></i>
                              <p>کاربران</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="{{ route('showCategories.admin.panel') }}" class="nav-link">
                              <i class="fa fa-circle-o nav-icon"></i>
                              <p>دسته بندی ها</p>
                            </a>
                          </li>

                          <li class="nav-item">
                            <a href="{{ route('products-comment.admin.panel') }}" class="nav-link">
                              <i class="fa fa-circle-o nav-icon"></i>
                              <p>کامنت محصولات</p>
                            </a>
                          </li>

                        </ul>
                      </li>
                    </ul>
                  </nav>
                  <!-- /.sidebar-menu -->
                </div>
              </div>
              <!-- /.sidebar -->
            </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
              @yield('contentAdmin')
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
              <strong>CopyLeft &copy; 2018 <a href="http://github.com/hesammousavi/">حسام موسوی</a>.</strong>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
              <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
          </div>




          <script src="{{ asset('js/app.js') }}"></script>
          <script src="https://cdn.tiny.cloud/1/pxf948jszl6x80l4egte3aexewg8un97l79z8rsr005yaadq/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


        <script>
            var editor_config = {
            path_absolute : "/",
            directionality: 'rtl',
            selector: "textarea#editor",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern | rtl ltr"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
                } else {
                cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"
                });
            }
            };

            tinymce.init(editor_config);
        </script>

          <script>
            $(".chosen-select").chosen();

            $('#lfm').filemanager('image');
            $('#lfm-gl').filemanager('image');
            $('#lfm-gl2').filemanager('image');
            $('#lfm-gl3').filemanager('image');




          </script>

    </body>
</html>
