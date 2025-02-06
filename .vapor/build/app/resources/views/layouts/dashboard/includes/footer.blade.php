<footer class="footer position-absolute">
    <div class="row g-0 justify-content-between align-items-center h-100">
        <div class="col-12 col-sm-auto text-center">
            <p class="mb-0 mt-2 mt-sm-0 text-body">Copyright © 2024 Manthan. All Rights Reserved.<span
                    class="d-none d-sm-inline-block"></span><span
                    class="d-none d-sm-inline-block mx-1">|</span><a
                    class="mx-1" href="{{ route('user.dashboard') }}">{{ Auth::user()->name }}'s Dashboard</a></p>
        </div>
        <div class="col-12 col-sm-auto text-center">
            <p class="mb-0 text-body-tertiary text-opacity-85">v1.7.3</p>
        </div>
    </div>
</footer>