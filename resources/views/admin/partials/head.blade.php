<!-- Favicons -->
<link rel="apple-touch-icon" href="{{asset('assets/img/favicon/apple-touch-icon.png')}}" sizes="180x180">
<link rel="icon" href="{{asset('assets/img/favicon/favicon-32x32.png')}}" sizes="32x32" type="image/png">
<link rel="icon" href="{{asset('assets/img/favicon/favicon-16x16.png')}}" sizes="16x16" type="image/png">

<link rel="mask-icon" href="{{asset('assets/img/favicon/safari-pinned-tab.svg')}}" color="#563d7c">
<link rel="icon" href="{{asset('assets/img/favicon/favicon.ico')}}">
<meta name="msapplication-config" content="{{asset('assets/img/favicons/browserconfig.xml')}}">
<meta name="theme-color" content="#563d7c">
<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
{{-- csrf --}}
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Apex Charts -->
<link type="text/css" href="/vendor/apexcharts/apexcharts.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<!-- Datepicker -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/css/datepicker.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/css/datepicker-bs4.min.css">

<!-- Fontawesome -->
<link type="text/css" href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

<!-- Sweet Alert -->
<link type="text/css" href="/vendor/sweetalert2/sweetalert2.min.css" rel="stylesheet">

<!-- Notyf -->
<link type="text/css" href="/vendor/notyf/notyf.min.css" rel="stylesheet">

<!-- Volt CSS -->
<link type="text/css" href="/css/volt.css" rel="stylesheet">

<!-- Livewire Styles -->
<style >
[wire\:loading], [wire\:loading\.delay], [wire\:loading\.inline-block], [wire\:loading\.inline], [wire\:loading\.block], [wire\:loading\.flex], [wire\:loading\.table], [wire\:loading\.grid], [wire\:loading\.inline-flex] {
    display: none;
}

[wire\:loading\.delay\.shortest], [wire\:loading\.delay\.shorter], [wire\:loading\.delay\.short], [wire\:loading\.delay\.long], [wire\:loading\.delay\.longer], [wire\:loading\.delay\.longest] {
    display:none;
}

[wire\:offline] {
    display: none;
}

[wire\:dirty]:not(textarea):not(input):not(select) {
    display: none;
}

input:-webkit-autofill, select:-webkit-autofill, textarea:-webkit-autofill {
    animation-duration: 50000s;
    animation-name: livewireautofill;
}

@keyframes livewireautofill { from {} }
</style>

<!-- Livewire Scripts -->

{{-- <script src="/livewire/livewire.js?id=90730a3b0e7144480175" data-turbo-eval="false" data-turbolinks-eval="false" ></script> --}}
<script data-turbo-eval="false" data-turbolinks-eval="false" >
if (window.livewire) {
    console.warn('Livewire: It looks like Livewire\'s @livewireScripts JavaScript assets have already been loaded. Make sure you aren\'t loading them twice.')
}

// window.livewire = new Livewire();
// window.livewire.devTools(true);
window.Livewire = window.livewire;
window.livewire_app_url = '';
window.livewire_token = 'nOSiTvfAjR40u8dioVhrGW1ghClcrbPIXOLxVX6A';

/* Make sure Livewire loads first. */
if (window.Alpine) {
    /* Defer showing the warning so it doesn't get buried under downstream errors. */
    document.addEventListener("DOMContentLoaded", function () {
        setTimeout(function() {
            console.warn("Livewire: It looks like AlpineJS has already been loaded. Make sure Livewire\'s scripts are loaded before Alpine.\\n\\n Reference docs for more info: http://laravel-livewire.com/docs/alpine-js")
        })
    });
}

/* Make Alpine wait until Livewire is finished rendering to do its thing. */
window.deferLoadingAlpine = function (callback) {
    window.addEventListener('livewire:load', function () {
        callback();
    });
};

let started = false;

window.addEventListener('alpine:initializing', function () {
    if (! started) {
        window.livewire.start();

        started = true;
    }
});

document.addEventListener("DOMContentLoaded", function () {
    if (! started) {
        // window.livewire.start();

        started = true;
    }
});
</script>

<!-- Core -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

<!-- Vendor JS -->
<script src="/assets/js/on-screen.umd.min.js"></script>

<!-- Slider -->
<script src="/assets/js/nouislider.min.js"></script>

<!-- Smooth scroll -->
<script src="/assets/js/smooth-scroll.polyfills.min.js"></script>

<!-- Apex Charts -->
<script src="/vendor/apexcharts/apexcharts.min.js"></script>

<!-- Charts -->
<script src="/assets/js/chartist.min.js"></script>
<script src="/assets/js/chartist-plugin-tooltip.min.js"></script>

<!-- Datepicker -->
<script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/js/datepicker.min.js"></script>

<!-- Sweet Alerts 2 -->
<script src="/assets/js/sweetalert2.all.min.js"></script>

<!-- Moment JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

<!-- Notyf -->
<script src="/vendor/notyf/notyf.min.js"></script>

<!-- Simplebar -->
<script src="/assets/js/simplebar.min.js"></script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Volt JS -->
<script src="/assets/js/volt.js"></script>

{{-- Check Delete --}}
<script>
    function confirmDelete(){
        return confirm('Are you sure you want to delete');
    }
</script>


{{-- Jquery JS --}}
<script src="{{asset('/assets/js/jquery.min.js')}}"></script>

<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>

<script type="text/javascript" src="{{asset('search/search.js')}}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="{{asset('/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<style>
    .dataTables_paginate a {
    padding: 6px 9px !important;
    background: #ddd !important;
    border-color: #ddd !important;
    }
</style>