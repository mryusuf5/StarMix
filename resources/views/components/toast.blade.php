@if($message = Session::get("success"))
<script defer>
    Toastify({
        text: "{{$message}}",
        duration: 3000,
        destination: "https://github.com/apvarun/toastify-js",
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
