<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
    

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navegação</li>
    
<li>
<a href="{{ url('/dashboard') }}">
    <i class="mdi mdi-poll "></i>
    <span> Gráfico </span>
</a>
</li>


@if(Auth::user()->can('pos.menu'))
<li>
<a href="{{ route('pos') }}">
    <span class="badge bg-pink float-end">Hot</span>
    <i data-feather="shopping-cart" class="icon-dual-danger"></i>
    <span> Vender </span>
</a>
</li>
@endif




                <li class="menu-title mt-2">Funções</li>

               
@if(Auth::user()->can('orders.menu'))
<li>
<a href="#orders" data-bs-toggle="collapse">
    <i class="fas fa-file-alt"></i>
<span> Pedidos  </span>
<span class="menu-arrow"></span>
</a>
<div class="collapse" id="orders">
<ul class="nav-second-level">

<li>
        <a href="{{ route('pending.due') }}">Pedidos A Receber</a>
</li>

<li>
    <a href="{{ route('pending.order') }}">Pedidos Em Andamento</a>
</li>

<li>
    <a href="{{ route('complete.order') }}">Pedidos Finalizados</a>
</li>

</ul>
</div>
</li>
@endif
                
@if(Auth::user()->can('customer.menu'))
<li>
<a href="#sidebarCrm" data-bs-toggle="collapse">
    <i class="fas fa-suitcase"></i>
    <span>Clientes</span>
    <span class="menu-arrow"></span>
</a>
<div class="collapse" id="sidebarCrm">
    <ul class="nav-second-level">
@if(Auth::user()->can('customer.all'))
<li>
<a href="{{ route('all.customer') }}">Todos Clientes</a>
</li>
@endif
@if(Auth::user()->can('customer.add'))
<li>
<a href="{{ route('add.customer') }}">Adicionar Cliente</a>
</li>
@endif
             
        </ul>
    </div>
</li>
@endif

@if(Auth::user()->can('supplier.menu'))
<li>
<a href="#sidebarEmail" data-bs-toggle="collapse">
    <i class="fas fa-box"></i>
    <span>Fornecedores</span>
    <span class="menu-arrow"></span>
</a>
<div class="collapse" id="sidebarEmail">
    <ul class="nav-second-level">
        <li>
            <a href="{{ route('all.supplier') }}">Todos Fornecedores</a>
        </li>
        <li>
            <a href="{{ route('add.supplier') }}">Adicionar Fornecedores</a>
        </li>
        
    </ul>
</div>
</li>
@endif


@if(Auth::user()->can('employee.menu'))
<li>
<a href="#sidebarEcommerce" data-bs-toggle="collapse">
    <i class="fas fa-users"></i>
<span> Funcionários  </span>
<span class="menu-arrow"></span>
</a>
<div class="collapse" id="sidebarEcommerce">
<ul class="nav-second-level">
    @if(Auth::user()->can('employee.all'))
    <li>
        <a href="{{ route('all.employee') }}"></i>     Todos Funcionários</a>
    </li>
    @endif
    @if(Auth::user()->can('employee.add'))
    <li>
        <a href="{{ route('add.employee') }}"></i>     Adicionar Funcionários </a>
    </li>
   @endif
</ul>
</div>
</li>
@endif


@if(Auth::user()->can('salary.menu'))
<li>
<a href="#salary" data-bs-toggle="collapse">
    <i class="fas fa-money-bill-wave"></i>
    <span> Salários </span>
    <span class="menu-arrow"></span>
</a>
<div class="collapse" id="salary">
    <ul class="nav-second-level">
        <li>
            <a href="{{ route('add.advance.salary') }}">Adicionar Adiantamentos</a>
        </li>
        <li>
            <a href="{{ route('all.advance.salary') }}">Todos Adiantamentos</a>
        </li>

         <li>
            <a href="{{ route('pay.salary') }}">Pagar Salário</a>
        </li> 

        <li>
            <a href="{{ route('month.salary') }}">Salário do Último mês</a>
        </li>
        
    </ul>
</div>
</li>
@endif


@if(Auth::user()->can('attendence.menu'))
<li>
<a href="#attendence" data-bs-toggle="collapse">
    <i class="fas fa-map-marker-alt"></i>
    <span> Ponto de Presença </span>
    <span class="menu-arrow"></span>
</a>
<div class="collapse" id="attendence">
    <ul class="nav-second-level">
        <li>
            <a href="{{ route('employee.attend.list') }}">Lista de Presenças</a>
        </li>
    
    </ul>
</div>
</li>

@endif


@if(Auth::user()->can('category.menu'))
<li>
<a href="#category" data-bs-toggle="collapse">
    <i class="fas fa-list-alt"></i>
    <span>Categoria de Produtos</span>
    <span class="menu-arrow"></span>
</a>
<div class="collapse" id="category">
    <ul class="nav-second-level">
        <li>
            <a href="{{ route('all.category') }}">Todas Categorias </a>
        </li>
    
    </ul>
</div>
</li>
@endif


@if(Auth::user()->can('product.menu'))
<li>
<a href="#product" data-bs-toggle="collapse">
    <i class="fas fa-list-ul"></i>
    <span> Produtos  </span>
    <span class="menu-arrow"></span>
</a>
<div class="collapse" id="product">
    <ul class="nav-second-level">
        <li>
            <a href="{{ route('all.product') }}">Lista de Produtos </a>
        </li>

         <li>
            <a href="{{ route('add.product') }}">Adicionar Produto </a>
        </li>
         {{-- <li>
            <a href="{{ route('import.product') }}">Importar Produto </a>
        </li> --}}
    
    </ul>
</div>
</li>
@endif

@if(Auth::user()->can('stock.menu'))
<li>
<a href="#stock" data-bs-toggle="collapse">
<i class="fas fa-boxes"></i>
<span> Controle de Estoque   </span>
<span class="menu-arrow"></span>
</a>
<div class="collapse" id="stock">
<ul class="nav-second-level">
<li>
    <a href="{{ route('stock.manage') }}">Estoque de Produtos</a>
</li>


</ul>
</div>
</li>
@endif

@if(Auth::user()->can('production.menu'))
<li>
<a href="#production" data-bs-toggle="collapse">
    <i class="fa fa-industry"></i>
    <span> Controle de Produção  </span>
    <span class="menu-arrow"></span>
</a>
<div class="collapse" id="production">
    <ul class="nav-second-level">
        @if(Auth::user()->can('production.all'))
        <li>
            <a href="{{ route('all.production') }}">Lista de Produção</a>
        </li>
        @endif
        @if(Auth::user()->can('production.add'))
         <li>
            <a href="{{ route('add.production') }}">Adicionar Produção </a>
        </li>

         <li>
            <a href="{{ route('history.production') }}">Histórico de Produção </a>
        </li>
        @endif
    </ul>
</div>
</li>
@endif

@if(Auth::user()->can('production.menu'))
<li>
<a href="#yarn" data-bs-toggle="collapse">
    <i class="fa-solid fa-dolly"></i>
    <span> Controle de Fios  </span>
    <span class="menu-arrow"></span>
</a>
<div class="collapse" id="yarn">
    <ul class="nav-second-level">
        @if(Auth::user()->can('production.all'))
        <li>
            <a href="{{ route('all.yarn') }}">Lista de Fios</a>
        </li>
        @endif
        @if(Auth::user()->can('production.add'))
         <li>
            <a href="{{ route('add.yarn') }}">Adicionar Fios</a>
        </li>
        @endif
    </ul>
</div>
</li>
@endif

@if(Auth::user()->can('roles.menu'))
<li>
<a href="#permission" data-bs-toggle="collapse">
<i class="far fa-id-card"></i>
<span> Cargos e Permissões    </span>
<span class="menu-arrow"></span>
</a>
<div class="collapse" id="permission">
<ul class="nav-second-level">
<li>
    <a href="{{ route('all.permission') }}">Todas Permissões </a>
</li>

<li>
    <a href="{{ route('all.roles') }}">Todos Cargos </a>
</li>

 <li>
    <a href="{{ route('add.roles.permission') }}">Adicionar Permissões </a>
</li>

 <li>
    <a href="{{ route('all.roles.permission') }}">Todos Cargos</a>
</li>


</ul>
</div>
</li>

@endif
@if(Auth::user()->can('admin.menu'))
<li>
<a href="#admin" data-bs-toggle="collapse">
<i data-feather="settings" class="icon-dual-danger"></i>
<span>Administrador    </span>
<span class="menu-arrow"></span>
</a>
<div class="collapse" id="admin">
<ul class="nav-second-level">
<li>
    <a href="{{ route('all.admin') }}">Todos Admins</a>
</li>

<li>
    <a href="{{ route('add.admin') }}">Adicionar Admin </a>
</li> 

</ul>
</div>
</li>
@endif

                 
              

                <li class="menu-title mt-2">Extras</li>

@if(Auth::user()->can('expense.menu'))
            <li>
                <a href="#sidebarAuth" data-bs-toggle="collapse">
                    <i class="far fa-money-bill-alt"></i>
                    <span>Despesas </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarAuth">
<ul class="nav-second-level">
<li>
<a href="{{ route('add.expense') }}">Adicionar Gastos</a>
</li>
<li>
<a href="{{ route('today.expense') }}">Gastos do Dia</a>
</li>
<li>
<a href="{{ route('month.expense') }}">Gastos do Mês</a>
</li>
<li>
<a href="{{ route('year.expense') }}">Gastos do Ano</a>
</li>

</ul>
                </div>
            </li>

@endif

<li>
                <a href="#backup" data-bs-toggle="collapse">
                    <i class="fas fa-database"></i>
                    <span>Backup </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="backup">
<ul class="nav-second-level">
<li>
<a href="{{ route('database.backup') }}">Backup </a>
</li> 

</ul>
</div>
</li>



             

             

              

                   
                        </ul>
                    </div>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>