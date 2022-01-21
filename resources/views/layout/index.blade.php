@include('layout.header')
@include('layout.messages')

<center> <h1>{{trans('admin.news')}}</h1> </center>
@yield('content')




@include('layout.footer')