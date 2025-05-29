<div id="app">
    @section('title','Dashboard cliente | Início')
      <div class="loader"></div>
      <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <livewire:customer.fixed-top-bar-component />
            <x-customer.side-bar />    
                  <div class="main-content">

                    <section class="section">                    
                        <x-customer.stats /> 
                        <livewire:customer.available-enterprise-service-component  />     
                    </section>
                    <x-customer.settings-side-bar />               

                  </div>
          <x-customer.footer />
     </div>
  </div>