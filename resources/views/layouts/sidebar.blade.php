 <!-- Sidebar -->
 <div>
     <div class="d-flex flex-column flex-shrink-0 p-3 bg-dark text-white" style="width: 280px; height: 100vh; position: sticky; top: 0; background-color: #474F7A;">
         <a href="/admin" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
             <svg class="bi pe-none me-2" width="40" height="32">
                 <use xlink:href="#bootstrap" />
             </svg>
             <span class="fs-4 text-white text-start">FARHAN APOTEK</span>
         </a>
         <hr>
         <ul class="nav nav-pills flex-column mb-auto">
             <li class="nav-item">
                 <a href="/admin" class="nav-link active " aria-current="page">
                     <svg class="bi pe-none me-2" width="16" height="16">
                         <i class="fa fa-home"></i>
                     </svg>
                     Home
                 </a>
             </li>
             <li>
                 <a href="/admin.kategori" class="nav-link ">
                     <svg class="bi pe-none me-2" width="16" height="16">
                         <i class="fa fa-box"></i>
                     </svg>
                     KATEGORI
                 </a>
             </li>
             <li>
                 <a href="/admin.obat" class="nav-link ">
                     <svg class="bi pe-none me-2" width="16" height="16">
                         <i class="fa fa-medkit"></i>
                     </svg>
                     DATA OBAT
                 </a>
             </li>
             <li>
                 <a href="/admin.penjualan" class="nav-link">
                     <svg class="bi pe-none me-2" width="16" height="16">
                         <i class="fa fa-cart-shopping"></i>
                     </svg>
                     PENJUALAN
                 </a>
             </li>
             <li>
                 <a href="/admin.pelanggan" class="nav-link">
                     <svg class="bi pe-none me-2" width="16" height="16">
                         <i class="fa fa-users"></i>
                     </svg>
                     PELANGGAN
                 </a>
             </li>
             <li>
                 <a href="/admin.user" class="nav-link">
                     <svg class="bi pe-none me-2" width="16" height="16">
                         <i class="fa fa-user"></i>
                     </svg>
                     KARYAWAN
                 </a>
             </li>
         </ul>
         <hr>
         <div class="dropdown">
             <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                 <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                 <strong class="text-white">{{auth::user()->name}}</strong>
             </a>
             <ul class="dropdown-menu text-small text-white shadow">
                 <li>
                     <a class="dropdown-item text-black" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                     </a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
                 </li>
             </ul>
         </div>
     </div>
 </div>

 <style>
     .nav-link .dropdown {
         transition: box-shadow 0.5s ease-in-out, transform 0.5s ease-in-out;
     }

     .nav-link:hover a svg {
         color: white;
     }

     .nav-link:hover {
         transform: scale(1.05);
         transition: box-shadow 0.3s ease, transform 0.3s ease;
         background-color: #1E83F5;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
         color: white;
     }

     * {
         font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
     }
 </style>   