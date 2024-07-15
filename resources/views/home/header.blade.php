

<!-- ***** Preloader Start ***** -->
<div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">Veripay<em> Safe</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#features">About</a></li>
                        
                            
                            
                            @if (Route::has('login'))
                           
                                @auth
                                
                                <x-app-layout>
                                </x-app-layout>
                                
                                
                                @else
                                <li class="main-button"><a href="{{ route('login') }}">Login</a></li>

                                    @if (Route::has('register'))
                                    <li class="main-button"><a href="{{ route('register') }}">Register</a></li>
                                    @endif
                                @endauth
                            
                        @endif
                           
                            
                              
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
