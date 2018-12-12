@if ($active == 'index')
    @php
        $navitemIndex = 'nav_item_active';
    @endphp
@else
    @php
        $navitemIndex = 'nav_item';
    @endphp
@endif
@if ($active == 'skills')
    @php
        $navitemSkills = 'nav_item_active';
    @endphp
@else
    @php
        $navitemSkills = 'nav_item';
    @endphp
@endif
@if ($active == 'sound')
    @php
        $navitemSound = 'nav_item_active';
    @endphp
@else
    @php
        $navitemSound = 'nav_item';
    @endphp
@endif
@if ($active == 'user')
    @php
        $navitemUser = 'nav_item_active';
    @endphp
@else
    @php
        $navitemUser = 'nav_item';
    @endphp
@endif
<div class="nav_admin_wrap z-depth-1">
    <div class="{{ $navitemIndex }}"><a href="/admin"><i class="fas fa-file-alt"></i></a></div>
    <div class="{{ $navitemSkills }}"><a href="/admin/skills"><i class="fas fa-user-graduate"></i></a></div>
    <div class="{{ $navitemSound }}"><a href="/admin/sound"><i class="fas fa-music"></i></a></div>
    <div class="{{ $navitemUser }}"><a href="/admin"><i class="fas fa-user-edit"></i></a></div>
</div>
