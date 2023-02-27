 @php
        $dashboard = "http://tugas-akhir-mapel.test/dashboard";  
        $guru = "http://tugas-akhir-mapel.test/guru/all";
        $user = "http://tugas-akhir-mapel.test/user/all";
        $useradd = "http://tugas-akhir-mapel.test/user/add";
        $jabatan = "http://tugas-akhir-mapel.test/jabatan/all";
        $jabatanadd = "http://tugas-akhir-mapel.test/jabatan/all";
        $url =   url()->current();  

 @endphp

<nav class="side-nav">
    <a href="{{ route('dashboard') }}" class="intro-x flex items-center pl-5 pt-4">
        <img alt="Midone - HTML Admin Template" class="w-12" src="{{ asset('backend/dist/images/smk1.png') }}">
        <span class="hidden xl:block text-white text-lg ml-3">SMK MUTU Pekanbaru</span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            @if ( $url == $dashboard )
                 <a href="{{route ('dashboard')}}" class="side-menu  side-menu--active">
            @else
                 <a href="{{route ('dashboard')}}" class="side-menu ">
            @endif
            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                <div class="side-menu__title">
                    Dashboard
                </div>
            </a>
         
        </li>
        <li>
          @if ($guru ==  $url )
                <a href="javascript:;" class="side-menu side-menu--active">
            @else
                <a href="javascript:;" class="side-menu ">
          @endif
                <div class="side-menu__icon"> <i data-lucide="edit"></i> </div>
                <div class="side-menu__title">
                   Data
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{route ('guru.all')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="minus"></i> </div>
                        <div class="side-menu__title"> Guru </div>
                    </a>
                </li>
                <li>
                    <a href="{{route ('mapel.all')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="minus"></i> </div>
                        <div class="side-menu__title"> Mata Pelajaran </div>
                    </a>
                </li>
                <li>
                    <a href="top-menu-light-dashboard-overview-1.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="minus"></i> </div>
                        <div class="side-menu__title"> Top Menu </div>
                    </a>
                </li>
            </ul>
        </li>

        <li>

            @if ($user == $url  )
                <a href="javascript:;" class="side-menu side-menu--active">
            @elseif ($useradd == $url )
                <a href="javascript:;" class="side-menu side-menu--active">
            @elseif ($jabatan == $url )
                <a href="javascript:;" class="side-menu side-menu--active">
            @elseif ($jabatanadd == $url )
                <a href="javascript:;" class="side-menu side-menu--active">
            @else
                <a href="javascript:;" class="side-menu ">
            @endif
                <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                <div class="side-menu__title">
                    Menu Master
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{ route ('user.all') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="minus"></i> </div>
                        <div class="side-menu__title"> User </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route ('jabatan.all') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="minus"></i> </div>
                        <div class="side-menu__title"> Jabatan</div>
                    </a>
                </li>
           
            </ul>
        </li>


           <li>
            <a href="javascript:;" class="side-menu" data-tw-toggle="modal" data-tw-target="#button-modal-preview">
                <div class="side-menu__icon"> <i data-lucide="plus-square"></i> </div>
                <div class="side-menu__title">
                    Buat Surat
                   
                </div>
            </a>
     
        </li>
    </ul>
</nav>





 <!-- BEGIN: Modal Toggle --> 
 {{--  <div class="text-center"> <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#button-modal-preview" class="btn btn-primary">Show Modal</a> </div>  --}}
  <!-- END: Modal Toggle --> <!-- BEGIN: Modal Content --> 
  <div id="button-modal-preview" class="modal" tabindex="-1" aria-hidden="true"> <div class="modal-dialog"> <div class="modal-content"> <a data-tw-dismiss="modal" href="javascript:;"> <i data-lucide="x" class="w-8 h-8 text-slate-400"></i> </a> 
    <div class="modal-body p-0"> <div class="p-5 text-center"> <i data-lucide="check-circle" class="w-16 h-16 text-success mx-auto mt-3"></i> <div class="text-3xl mt-5">Pembuatan Surat</div> </div> 
    <div class="px-5 pb-8 text-center"> <button type="button" data-tw-dismiss="modal" class="btn btn-primary w-24">Ok</button> 
    <button type="button" data-tw-dismiss="modal" class="btn btn-primary w-24">Ok</button> </div> </div> </div> </div> </div> <!-- END: Modal Content --> 