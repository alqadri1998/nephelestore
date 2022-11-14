<section class="container">
    <h2 class="section-title ls-n-15 text-center pt-2 m-b-4">{{ t('Shop By Category','site') }}</h2>
{{-- appear-animate --}}
    <div class="owl-carousel owl-theme nav-image-center show-nav-hover nav-outer cats-slider">
        @foreach($categories as $cat)
        <div class="product-category">
            <a  href="{{ url('/shop/products?category='.$cat->slug) }}">
                <figure>
                    <img style=" width: 100px ; margin: auto; " src="{{ $cat->getFirstMedia('thumb') ? $cat->getFirstMedia('thumb')->getFullUrl() : '' }}"
                      alt="{{ $cat->name }}" />
                </figure>
                <div class="category-content">
                    <h3>{{ $cat->name }}</h3>
                    {{-- <span><mark class="count">{{ $cat->products->whereNull('parent_id')->count() }}</mark> {{ t('Products','site') }}</span> --}}
                </div>
            </a>
        </div>
        @endforeach
        {{-- <div class="product-category">
            <a href="#">
                <figure>
                    <img src="{{ url('/assets/site/images/photos/02.jpeg') }}" width="273" height="273"
                        alt="category name" />
                </figure>
                <div class="category-content">
                    <h3>Bags</h3>
                    <span><mark class="count">4</mark> products</span>
                </div>
            </a>
        </div>
        <div class="product-category">
            <a href="#">
                <figure>
                    <img src="{{ url('/assets/site/images/photos/03.jpeg') }}" width="273" height="273"
                        alt="category" />
                </figure>
                <div class="category-content">
                    <h3>Electronics</h3>
                    <span><mark class="count">8</mark> products</span>
                </div>
            </a>
        </div>
        <div class="product-category">
            <a href="#">
                <figure>
                    <img src="{{ url('/assets/site/images/photos/04.jpeg') }}" width="273" height="273"
                        alt="category" />
                </figure>
                <div class="category-content">
                    <h3>Fashion</h3>
                    <span><mark class="count">11</mark> products</span>
                </div>
            </a>
        </div>
        <div class="product-category">
            <a href="#">
                <figure>
                    <img src="{{ url('/assets/site/images/photos/05.jpeg') }}" width="273" height="273"
                        alt="category" />
                </figure>
                <div class="category-content">
                    <h3>Headphone</h3>
                    <span><mark class="count">3</mark> products</span>
                </div>
            </a>
        </div>
        <div class="product-category">
            <a href="#">
                <figure>
                    <img src="{{ url('/assets/site/images/photos/06.jpeg') }}" width="273" height="273"
                        alt="category" />
                </figure>
                <div class="category-content">
                    <h3>Shoes</h3>
                    <span><mark class="count">4</mark> products</span>
                </div>
            </a>
        </div> --}}
    </div>
</section>

