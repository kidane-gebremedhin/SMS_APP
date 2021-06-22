<div class="row" style="overflow-y: scroll_; height: 300px_">

<?php 
    $menuCounter=0;
    if(isset($searched_resources))
        $resources=$searched_resources;
 ?>
@foreach($resources as $resource)
<?php 
    $routeName=$resource->is_crud=='true'? $resource->routeName.'.index': $resource->routeName;
    if($routeName=='permissions.save')
     $routeName = 'permissions.step1';
    if($routeName=='users.approveNewUser')
     $routeName = 'users.newUsers';
    if($routeName=='language_strings.index')
     $routeName = 'language_strings.edit';
    if($routeName=='logo.logo_update'){
         $routeName = 'logo.edit';
         //continue;
    }
    if($routeName=='users.changeStatus')
        continue;

    //should be here at bottom
    $menuCounter++;
 ?>

@if($menuCounter % 4==1)
<a href="#">
    <div class="hd-message-sn">
@endif
@if($currentUser->isGranted($routeName))
        <div class="hd-message-img_">
            <a class="get" href="{{route($routeName)}}">
            <?php $iconName=strpos($routeName, '.')? substr($routeName, 0, strpos($routeName, '.')): $routeName; ?>
                <center>
                    <img src="{{ asset('images/icons/'.$iconName.'.png')}}" alt="{{$iconName}}" class="menu-icons" />
                </center>
            </a>
        </div>
@endif
@if($menuCounter % 4==0 || $menuCounter==count($resources))
    </div>
</a>
@endif
@endforeach
</div>
