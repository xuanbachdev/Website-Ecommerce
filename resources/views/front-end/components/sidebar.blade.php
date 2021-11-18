<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Danh mục sản phẩm</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->

            @foreach($categorys as $category)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordian" href="#sportswear_{{ $category->category_id }}">
                                <span class="pull-right">
                                     @if($category->categoryChildrent->count())
                                        <i class="fa fa-plus"></i>
                                    @endif
                                </span>
                                {{ $category->category_name }}
                            </a>
                        </h4>
                    </div>

                    <div id="sportswear_{{ $category->category_id }}" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul>
                                @foreach($category->categoryChildrent as $categoryChild)
                                    <li><a href="{{ route('category.product',
                                        ['slug' => $categoryChild->category_slug, 'id' => $categoryChild->category_id]) }}">{{ $categoryChild->category_name }} </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>

            @endforeach

        </div><!--/category-products-->


    </div>
</div>
