<aside class="sidebar d-flex flex-column">
    <a
      href="{{ route('admin.posts.index') }}"
      class="{{Route::currentRouteName() === 'admin.posts.index' ? 'active': ''}}">All Project</a>
    <a
      href="{{ route('admin.posts.create') }}"
      class="{{Route::currentRouteName() === 'admin.posts.create' ? 'active': ''}}">Create Project</a>
   <a
      href="{{ route('admin.showAllCategories') }}"
      class="{{Route::currentRouteName() === 'admin.showAllCategories' ? 'active': ''}}">Tutte le categorie</a>
    <a
      href="{{ route('admin.categories.index') }}"
      class="{{Route::currentRouteName() === 'admin.categories.index' ? 'active': ''}}">Gestione categorie</a>

 </aside>
