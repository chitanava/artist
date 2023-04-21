<div>
    @if ($galleries->isEmpty())
        <div>No items found in gallery. Please add new content to display.</div>
    @else
        <x-admin.sortable.head class="grid-cols-[2rem_3fr_1fr_1fr]" :cols="['title']"/>

        <x-admin.sortable.list wire:sortable="updateOrder">
            @foreach ($galleries as $gallery)
                <x-admin.sortable.list-item class="grid-cols-[2rem_3fr_1fr_1fr]" wire:sortable.item="{{ $gallery->id }}" wire:key="task-{{ $gallery->id }}" >
                
                <div>{{ $gallery->title }}</div>

                <x-slot:active>
                    <input wire:click="active({{ $gallery->id }})" name="active" type="checkbox" class="toggle toggle-sm" @checked($gallery->active) />
                </x-slot:active>

                <x-slot:actions>
                    <li>
                        <a href="{{ route('admin.galleries.show', $gallery->id) }}">
                            <x-admin.icon size="4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776" />
                            </x-admin.icon>
                            Open              
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.galleries.edit', $gallery->id) }}">
                            <x-admin.icon size="4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </x-admin.icon>
                            Edit
                        </a>
                    </li>
                    <li>
                        <label wire:click="delete({{ $gallery->id }})" for="modal-delete">
                            <x-admin.icon size="4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </x-admin.icon>
                            Delete
                        </label>
                    </li>
                </x-slot:actions>
                </x-admin.sortable.list-item>
            @endforeach
        </x-admin.sortable.list>
    @endif
</div>