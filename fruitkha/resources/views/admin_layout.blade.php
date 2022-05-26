<!DOCTYPE html>
<html lang="en">
<head>
    @include("admin.common.head")
</head>
<body>

<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
@include('admin.common.nav2')
    @include('admin.common.nav')

@yield('content')

</div>

@include("admin.common.scripts")
</body>
</html>
