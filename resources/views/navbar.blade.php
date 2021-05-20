<div class="header py-4">
          <div class="container">
            <div class="d-flex">
              <a class="header-brand" href="./index.html">
                Dian Busana
              </a>
              <div class="d-flex order-lg-2 ml-auto">

                <div class="dropdown">
                  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                    <span class="avatar" style="background-image: url(http://placekitten.com/100/100)"></span>
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default"> {{ auth()->user()->name }} </span>
                      <small class="text-muted d-block mt-1">Administrator</small>
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="/profile">
                      <i class="dropdown-icon fe fe-user"></i> Profile
                    </a>
                    <a class="dropdown-item" href="/setting">
                      <i class="dropdown-icon fe fe-settings"></i> Settings
                    </a>

                    <a class="dropdown-item" href="#" onclick="event.preventDefault();logout.submit()">
                      <i class="dropdown-icon fe fe-log-out"></i> Sign out
                    </a>

                    <form action="{{ route('logout') }}" method="post" id="logout">
                    @csrf
                    </form>
                  </div>
                </div>
              </div>
              <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
              </a>
            </div>
          </div>
        </div>

        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                  <li class="nav-item">
                    <a href="/" class="nav-link active"><i class="fe fe-home"></i> Home</a>
                  </li>
                  <li class="nav-item">
                    <a href="/setting" class="nav-link"><i class="fe fe-settings"></i> Pengaturan Toko</a>
                  </li>
                  <li class="nav-item">
                    <a href="/dashboard/products" class="nav-link"><i class="fe fe-shopping-bag"></i> Products</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
