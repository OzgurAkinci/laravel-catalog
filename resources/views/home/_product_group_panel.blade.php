<ul class="list-group shadow" style="border:none">
  <h5 class="card-header"><i class="bi bi-list"></i> Ürün Grupları</h5>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Tüm Ürünler
    <span class="badge badge-primary badge-pill">{{ App\Models\Product::count() }}</span>
  </li>
  @foreach ($productGroups as $productGroup)
    <li class="list-group-item d-flex justify-content-between align-items-center">
      {{ $productGroup->title }}
      <span class="badge badge-primary badge-pill">{{count($productGroup->products)}}</span>
    </li>
  @endforeach
</ul><br />
