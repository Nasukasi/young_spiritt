@extends('user_template.layouts.template')
@section('title_page')
    Profile
@endsection
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="box_main">
                <ul>
                    <li><a href="{{route('userprofile')}}">Dashbord</a></li>
                    <li><a href="{{route('pendingorders')}}">Pending Orders</a></li>
                    <li><a href="{{route('history')}}">History</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </ul>
            </div>

        </div>
        <div class="col-lg-8">
            <div class="box_main">
                @yield('profilecontent')

            </div>
        </div>
    </div>
</div>
@endsection
