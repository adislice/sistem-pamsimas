<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Admin</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <style>
    body {
      font-family: 'Lato', sans-serif;
    }
  </style>
  
</head>

<body class="bg-light">
  <div class="d-flex vh-100">
    <aside class="bg-white p-3" style="width: 16rem">
      <h4 class="text-center mb-3">Admin Panel</h4>
      <ul class="list-unstyled d-flex flex-column">
        <li class="menu-item">
          <a href="/admin/" class="menu-link active gap-2 d-flex text-decoration-none rounded py-2 px-3 align-items-center">
            <i class='bx bx-home fs-5'></i> Dashboard
          </a>
        </li>
        
        <li class="menu-item has-sub" x-data="{ open: false }">
          <a href="javascript:void(0);" @click="open = !open" :class="open ? 'expanded' : ''" class="menu-link nav-link menu-sub-toggle d-flex text-decoration-none rounded py-2 px-3 align-items-center">
            <i class='bx bx-category fs-5 me-2'></i> Master Data
          </a>
          <ul class="menu-sub list-unstyled d-flex flex-column" :class="open ? 'open' : ''" :style="open && {height: $el.scrollHeight+`px`}">
            <li class="menu-item">
              <a href="/admin/barang" class="menu-link nav-link d-flex text-decoration-none rounded py-2 px-3 ">
                <i class='bx bx-radio-circle fs-5 me-2'></i> Data Pelanggan
              </a>
            </li>
            <li class="menu-item">
              <a href="/admin/kategori" class="menu-link nav-link d-flex text-decoration-none rounded py-2 px-3">
                <i class='bx bx-radio-circle fs-5 me-2'></i> Data Tarif
              </a>
            </li>
          </ul>
        </li>
        <li class="menu-item">
          <a href="/admin/" class="menu-link d-flex text-decoration-none rounded py-2 px-3 align-items-center">
            <i class='bx bx-home fs-5 me-2'></i> Dashboard
          </a>
        </li>
      </ul>

    </aside>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>
  <script src="//unpkg.com/alpinejs" defer></script>
</body>

</html>