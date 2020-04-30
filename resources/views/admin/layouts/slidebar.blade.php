  <!-- =============================================== -->
         <!-- Left side column. contains the sidebar -->

<aside class="main-sidebar">
            <!-- sidebar -->
            <div class="sidebar">
               <!-- sidebar menu -->
               <ul class="sidebar-menu">
                  <li class="">
                     <a href="{{url('/admin/banners')}}">
                        <i class="fa fa-image"></i><span>Banners</span>
                        <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
                  <li class="active">
                     <a href="{{url('/admin/dashboard')}}"><i class="fa fa-tachometer"></i><span>Dashboard</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-list"></i><span>Categories</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="{{url('/admin/add-category')}}">Add Category</a></li>
                        <li><a href="{{url('/admin/viewcategories')}}">view Categories</a></li>

                     </ul>
                  </li>

                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-product-hunt"></i><span>Product</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="{{url('/admin/add-product')}}">Add product</a></li>
                        <li><a href="{{url('/admin/viewproduct')}}">view product</a></li>
                        
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                        <i class="fa fa-gift"></i><span>Coupons</span>
                        <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="{{url('/admin/add-coupons')}}">Add Coupon</a></li>
                        <li><a href="{{url('/admin/viewcoupon')}}">view Coupon</a></li>

                     </ul>
                  </li>
               </ul>
            </div>
            <!-- /.sidebar -->
         </aside>