<li class="{{ Request::is('writers*') ? 'active' : '' }}">
    <a href="{!! route('writers.index') !!}"><i class="fa fa-edit"></i><span>Writers</span></a>
</li>

<li class="{{ Request::is('editorials*') ? 'active' : '' }}">
    <a href="{!! route('editorials.index') !!}"><i class="fa fa-edit"></i><span>Editorials</span></a>
</li>

<li class="{{ Request::is('posts*') ? 'active' : '' }}">
    <a href="{!! route('posts.index') !!}"><i class="fa fa-edit"></i><span>Posts</span></a>
</li>

