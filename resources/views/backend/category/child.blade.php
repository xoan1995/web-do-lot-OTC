<li style="list-style-type: none"><i class="fas fa-angle-double-right"></i> {{ $sub_categories->category }}</li>
@if ($sub_categories->categories)
    <ul>
        @foreach ($sub_categories->categories as $subCategories)
            @include('backend.category.child', ['sub_categories' => $subCategories])
        @endforeach
    </ul>
@endif