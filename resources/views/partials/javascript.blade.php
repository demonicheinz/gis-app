{{-- Mazer App --}}
<script src="{{ asset("js/app.js") }}"></script>

{{-- Dark Theme --}}
<script src="{{ asset("js/components/dark.js") }}"></script>

{{-- Perfect Scrollbar --}}
<script src="{{ asset("extensions/perfect-scrollbar/perfect-scrollbar.min.js") }}"></script>

{{-- Sweetalert --}}
<script src="{{ asset("extensions/sweetalert2/sweetalert2.min.js") }}"></script>

{{-- Session Storage --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (sessionStorage.getItem('success')) {
            Swal.fire({
                title: 'Berhasil!',
                text: sessionStorage.getItem('success'),
                icon: 'success',
                confirmButtonText: 'OK',
            });
            sessionStorage.removeItem('success');
        }

        if (sessionStorage.getItem('error')) {
            Swal.fire({
                title: 'Gagal!',
                text: sessionStorage.getItem('error'),
                icon: 'error',
                confirmButtonText: 'OK',
            });
            sessionStorage.removeItem('error');
        }
    });
</script>
