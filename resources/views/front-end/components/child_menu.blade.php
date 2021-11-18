
@if($categoryParent->categoryChildrent->count())
    <ul role="menu" class="sub-menu">
        @foreach($categoryParent->categoryChildrent as $categoryChild)
            <li><a href="">{{ $categoryChild->category_name }}</a></li>
            @if($categoryChild->categoryChildrent->count())
                @include('front-end.components.child_menu', ['categoryParent' => $categoryChild])
            @endif
        @endforeach
    </ul>
@endif
