@props (['highlight'=>false])
<div @class(['highlight'=>$highlight, 'card'])>
        {{$slot}}
<a {{$attributes}} class="p-2 rounded-sm bg-orange-400">View Details</a>
</div>