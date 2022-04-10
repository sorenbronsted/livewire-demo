<div>
    <div class="row mt-5">
        <div class="col-3">
            <ul class="nav flex-column nav-pills nav-fill">
                @foreach($items as $idx => $item)
                    <li class="nav-item">
                        <a wire:click.prevent="select({{$idx}})" href="#" class="nav-link {{ ($idx == $selected ? 'active' : '') }}">{{ $item->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-9">
            <livewire:is :component="$items[$selected]->component"  wire:key="{{$selected}}" />
        </div>
    </div>
</div>
