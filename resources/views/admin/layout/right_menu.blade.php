<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li>
            <a href="/admin"><i class="fa fa-tachometer"></i> داشبورد</a>
        </li>
        <li>
            <a href="{{route('admin.user.index')}}"><i class="fa fa-users"></i>کاربران</a>
        </li>
        <li>
            <a href="{{route('admin.category.index')}}"><i class="fa fa-fw fa fa-question-circle"></i> دسته بندی ها</a>
        </li>
        <li>
            <a href="{{route('admin.product.index')}}"><i class="fa fa-fw fa-cubes"></i> محصولات</a>
        </li>
        <li>
            <a href="{{route('admin.shop.index')}}"><i class="fa fa-fw fa fa-question-circle"></i> فروشنده گان</a>
        </li>
        <li>
            <a href="{{route('admin.factor.index')}}"><i class="fa fa-fw fa fa-question-circle"></i>فاکتور ها</a>
        </li>
        <li>
            <a href="/factors"><i class="fa fa-fw fa fa-question-circle"></i>کوپن تخفیف</a>
        </li>
        <li>
            <a href="{{route('admin.wallet.index')}}"><i class="fa fa-credit-card"></i>کیف پول ها</a>
        </li>
        <li>
            <a href="{{route('admin.payment.index')}}"><i class="fa fa-credit-card"></i>تراکنش ها</a>
        </li>
        <li>
            <a href="{{route('admin.cart.index')}}"><i class="fa fa-shopping-basket"></i>سبدهای خرید</a>
        </li>
        <li>
            <a href="{{route('admin.address.index')}}"><i class="fa fa-map-marker"></i>آدرس ها</a>
        </li>
        <li>
            <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-search"></i>صفحه ها<i class="fa fa-fw fa-angle-down pull-right"></i></a>
            <ul id="submenu-1" class="collapse">
                <li><a href="#"><i class="fa fa-angle-double-right"></i> لیست</a></li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i>افزودن</a></li>
            </ul>
        </li>
        <li>
            <a href="{{route('admin.upload.index')}}"><i class="fa fa-fw fa fa-image"></i>رسانه</a>
        </li>
        <li>
            <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-search"></i> تنظیمات <i class="fa fa-fw fa-angle-down pull-right"></i></a>
            <ul id="submenu-2" class="collapse">
                <li><a href="{{route('admin.province.index')}}"><i class="fa fa-angle-double-right"></i>استان</a></li>
                <li><a href="{{route('admin.city.index')}}"><i class="fa fa-angle-double-right"></i>شهر</a></li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i> تنظیمات قالب</a></li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i> تنظیمات اصلی</a></li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i>ساعت تحویل</a></li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i> اسلایدر</a></li>
            </ul>
        </li>
    </ul>
</div>