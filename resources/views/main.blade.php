@include('layouts.index')
@section('content')
    <div class="container">
        @include('components.main.header');
    </div>
    @extends('components.main.footer')
    @extends('components.popups.login')
@endsection
