@include('admin.layouts.css')


<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 ">

                        <form action="{{ route('admin.login') }}" method="POST">
                            @csrf
                            <h3 class="mb-5 text-center">Sign in</h3>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}"
                                    class="form-control form-control-lg email" />
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" name="password" id="password" value="{{ old('password') }}"
                                    class="form-control form-control-lg password " />
                                <span class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{ asset('admin/assets/vendor/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<script>
    function isLoading(is_loading) {
        document.getElementById("modal-overlay").style.display = is_loading ? "flex" : "none";
    }

    const Toast = Swal.mixin({
        toast: true,
        icon: "success",
        position: "top-end",
        showConfirmButton: false,
        timer: 7000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });

    const sweetAlert = (icon, title) => {
        Toast.fire({
            icon: icon,
            title: title,
        });
    };

    let messageType = '';

    @if ($message = session('success'))
        messageType = 'success';
    @elseif ($message = session('warning'))
        messageType = 'warning';
    @elseif ($message = session('error'))
        messageType = 'error';
    @elseif ($message = session('info'))
        messageType = 'info';
    @endif

    if (messageType && '{{ $message }}' !== '') {
        Toast.fire({
            icon: messageType,
            title: '{{ $message }}'
        });
    }
</script>