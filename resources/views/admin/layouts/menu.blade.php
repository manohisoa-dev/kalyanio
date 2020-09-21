<li class="{{Request::is('/') ? 'active' : ''}}">
    <a href="{{route('home')}}" title="Tableau de Bord"><i class="fa fa-dashboard"></i> <span class="nav-label">Tableau de Bord</span></a>
</li>

<li class="{{
    Request::is('admin/category') || Request::is('admin/category/*')  ? 'active' : '' ||
    Request::is('admin/sous-category') || Request::is('admin/sous-category/*')  ? 'active' : ''
}}">
    <a href="#"><i class="fa fa-list"></i><span class="nav-label">Catégories</span> <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level collapse">
        <li><a href="{{route('admin.category.index')}}">Listes</a></li>
        <li><a href="{{route('admin.sous-category.index')}}">Sous-catégories</a></li>
    </ul>
</li>

<li class="{{Request::is('admin/nourriture') || Request::is('admin/nourriture/*')  ? 'active' : ''}}">
    <a href="{{route('admin.nourriture.index')}}" title="Nourritures"><i class="fa fa-cutlery"></i> <span class="nav-label">Nourritures</span> </a>
</li>

<li class="{{Request::is('admin/nourriture-ingredient') || Request::is('admin/nourriture-ingredient/*')  ? 'active' : ''}}">
    <a href="{{route('admin.nourriture-ingredient.index')}}" title="Ingredients pour chq nouritures"><i class="fa fa-gears"></i> <span class="nav-label">Ingredients pour chq nouritures</span> </a>
</li>

<li class="{{Request::is('admin/ingredient') || Request::is('admin/ingredient/*')  ? 'active' : ''}}">
    <a href="{{route('admin.ingredient.index')}}" title="Ingredients"><i class="fa fa-leaf"></i> <span class="nav-label">Ingredients</span> </a>
</li>

<li class="{{Request::is('admin/planning') || Request::is('admin/planning/*')  ? 'active' : ''}}">
    <a href="{{route('admin.planning.index')}}" title="Plannings"><i class="fa fa-calendar"></i> <span class="nav-label">Plannings</span> </a>
</li>

<li class="{{Request::is('admin/statistique') || Request::is('admin/statistique/*')  ? 'active' : ''}}">
    <a href="{{route('admin.statistique.index')}}" title="Statistiques"><i class="fa fa-area-chart"></i> <span class="nav-label">Statistiques</span> </a>
</li>


<li class="special_link">
    <a href="{{route('admin.nourriture.create')}}" title="Ajouter une nouriture"><i class="fa fa-plus"></i> <span class="nav-label">Ajouter une nouriture</span></a>
</li>
