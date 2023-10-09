@if($message = Session::get("success"))
<script defer>
    Toastify({
        text: "{{$message}}",
        duration: 3000,
        newWindow: true,
        gravity: "top",
        position: "center",
        stopOnFocus: true,
        style: {
            background: "linear-gradient(to right, #CEB66D, #BEA05C)",
        },
    }).showToast();
</script>
@endif

@if($message = Session::get("error"))
    <script defer>
        Toastify({
            text: "{{$message}}",
            duration: 3000,
            newWindow: true,
            gravity: "top",
            position: "center",
            stopOnFocus: true,
            style: {
                background: "linear-gradient(to right, #ED213A, #93291E)",
            },
        }).showToast();
    </script>
@endif
