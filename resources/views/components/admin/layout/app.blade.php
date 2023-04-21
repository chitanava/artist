<!DOCTYPE html>
<html data-theme="cupcake" lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=La+Belle+Aurore&family=Poppins:ital,wght@0,400;0,600;1,400;1,600&display=swap"
  rel="stylesheet">
  @vite(['resources/css/back.css', 'resources/js/back.js'])
  @livewireStyles
  <style>
    [x-cloak] {
      display: none;
    }
  </style>
  <title>@isset($title) {{ $title }} - @endisset Admin</title>
</head>
<body
  class="no-animation"
    x-init="() => {
      window.addEventListener('load', function() {
        setTimeout(() => {
          document.body.classList.remove('no-animation');
        }, 500)
      })
    }"
>
  <div class="drawer drawer-mobile">
    <input id="my-drawer" type="checkbox" class="drawer-toggle"/>
    <div class="drawer-content">
      <div class="flex flex-col gap-8">
        <x-admin.header>
          {{ $breadcrumbs ?? '' }}
        </x-admin.header>

        <main class="w-full max-w-7xl mx-auto px-6 gap-8 mb-8 flex flex-col">
          @if (session('status'))
            <div 
              x-data="{
                show: true,
                _t: undefined,
                timeout(){
                  this._t = setTimeout(() => this.show = false, 5000);
                }
              }",
              x-init="
                timeout();
              " 
              x-on:mouseenter="clearTimeout(_t)"
              x-on:mouseleave="timeout()"
              x-show="show"
              x-cloak
              class="alert alert-success shadow-sm">
              <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-5 w-5" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span class="text-sm">{{ session('status') }}</span>
              </div>
            </div>
          @endif

          {{ $slot }}
        </main>
      </div>
    </div>
    <div class="drawer-side">
      <label for="my-drawer" class="drawer-overlay"></label>
      <x-admin.sidebar></x-admin.sidebar>
    </div>
  </div>

  {{ $modal ?? '' }}

  @livewireScripts
  @stack('footer-scripts')
</body>
</html>