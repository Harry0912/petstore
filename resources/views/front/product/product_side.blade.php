<div class="col-md-3 col-ms-12">
    <form class="d-flex" id="productSearch">
        <div class="me-2">
            <input class="form-control" type="search" name="product_keyword" placeholder="Search" aria-label="Search">
        </div>
        <div>
            <button type="submit" class="btn btn-outline-success" id="product_search">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </div>
    </form><hr>
    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="/product/list">所有產品</a>
            <span class="badge bg-primary rounded-pill">{{ $total }}</span>
        </li>
        @foreach ($type as $key => $value)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="/product/list/{{ $value->type_id }}">{{ $value->type_name }}</a>
                <span class="badge bg-primary rounded-pill">{{ $value->count }}</span>
            </li>
        @endforeach
    </ul>
</div>