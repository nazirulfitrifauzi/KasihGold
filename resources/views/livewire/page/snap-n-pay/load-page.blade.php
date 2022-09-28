
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Kasih Gold</title>

  <title>Kasih Gold</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{asset('img/kasihgoldicon.jpg')}}">

  <link rel="stylesheet" href="{{ asset('css/app.css')}}" />

  <link rel="stylesheet" href="{{ asset('dist/apexcharts.css')}}" />
  <script src="{{ asset('dist/apexcharts.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <script src="{{ asset('js/init-alpine.js')}}"></script>
  <script src="{{ asset('js/accounting.js')}}"></script>

  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://unpkg.com/tippy.js@6"></script>

  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="{{ asset('swipper/swipper.css')}}" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    @livewireStyles
    <script>
        // setTimeout(function(){ document.forms['load'].submit(); }, 2000);
        setTimeout(function(){ document.getElementById('btn').click(); }, 2000);
    </script>

</head>

<body>
    <div style="background-color: rgba(255, 202, 3);">
        <div class="flex items-center justify-center h-screen">
            <div>
                <img src="{{ asset('img/load.gif')}}">
            </div>
        </div>
    </div>



        <form method="post" action="https://prod.snapnpay.co/payments/api" name="load">
        <input type="hidden" size=40 name="agency" value="{{session('agency')}}" class="form-control" id="agency"/>
        <input type="hidden" size=40 name="refNo" value="{{session('refNo')}}" class="form-control" id="refNo"/>
        <input type="hidden" size=40 name="amount" value="{{session('amount')}}" class="form-control" id="amount"/>
        <input type="hidden" size=40 name="email" value="{{session('email')}}" class="form-control" id="email"/>
        <input type="hidden" size=40 name="returnUrl" value="https://cscabs.net.my/kasihgold/pay2" class="form-control" id="returnUrl"/>
        <button id="btn" wire:click="buy" type="submit" style="display:none;">Buy</button>

    </form>
</body>

@livewireScripts
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('swipper/swipper.js')}}"></script>

    <script>
        const setup = () => {
        return {
            isSidebarOpen: true,
            isSidebarOpenMobile: false,
            currentSidebarTab: "linksTab",
            isSettingsPanelOpen: false,
            isSubHeaderOpen: false,
        }
    }

    </script>
    <script>
        // tippy('.tooltipbtn', {
        //     content:(reference)=>reference.getAttribute('data-title'),
        //     onMount(instance) {
        //         instance.popperInstance.setOptions({
        //         placement :instance.reference.getAttribute('data-placement')
        //         });
        //     },
        //     allowHTML: true,
        // });
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- echo scripts -->
    <script>
        // var userId = document.querySelector('meta[name="userId"]').content;
        // Echo.private('App.Models.User.' + userId)
        //     .notification((notification) => {
        //         toastr.options =
        //         {
        //             "closeButton": true,
        //             "newestOnTop": true,
        //             "progressBar": true,
        //             "positionClass": "toast-top-right",
        //             "onclick": null,
        //             "showDuration": "300",
        //             "hideDuration": "1000",
        //             "timeOut": "5000",
        //             "extendedTimeOut": "1000",
        //             "showEasing": "swing",
        //             "hideEasing": "linear",
        //             "showMethod": "fadeIn",
        //             "hideMethod": "fadeOut"
        //         }
        //         if (notification.status == 'success') {
        //             toastr.success(notification.message,notification.title);
        //         } else if (notification.status == 'info') {
        //             toastr.info(notification.message,notification.title);
        //         } else if (notification.status == 'warning') {
        //             toastr.warning(notification.message,notification.title);
        //         } else {
        //             toastr.error(notification.message,notification.title);
        //         }
        //     });
    </script>
    <script>
        // var myDate = new Date();
        // var hrs = myDate.getHours();
        // var greet;
        // if (hrs < 12)
        //     greet = 'Good Morning';
        // else if (hrs >= 12 && hrs <= 17)
        //     greet = 'Good Afternoon';
        // else if (hrs >= 17 && hrs <= 24)
        //     greet = 'Good Evening';
        // document.getElementById('lblGreetings').innerHTML = greet + ' {{ Auth()->user()->name }}';
    </script>
    <script>
        // const date = new Date();
        // const formattedDate = date.toLocaleDateString('en-GB', {
        //     day: 'numeric',
        //     month: 'short',
        //     year: 'numeric'
        // }).replace(/ /g, ' ');
        // document.getElementById('getDate').innerHTML = 'Here are your stats for Today, ' + formattedDate;
    </script>
    @stack('js')
</html>