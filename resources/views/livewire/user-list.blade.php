{{--? How to make realtime data like using websocket. Default poll request is 2.5 second. If want to keep polling even in different tab, use '.keep-alive'. If want to polling when see component, use '.visible' --}}
<div class="w-1/2 text-center lg:text-left" wire:poll.3s.visible>
    <ul class="list bg-base-100 rounded-box flex min-h-[610px] flex-col justify-between shadow-md">
        <div>
            <li class="card-title p-4 pb-2 text-lg">User List</li>
            <form class="mx-4" action="" wire:submit="searchUser">
                <label class="input w-full">
                    <i class="ri-search-line opacity-50"></i>
                    <input type="search" required placeholder="Search user(s) ..." wire:model.live.debounce.250ms="query" />
                </label>
            </form>
            @forelse ($this->users as $user)
                <li class="list-row">
                    <div><img class="rounded-box size-10" src="{{ $user->avatar ?? "https://img.daisyui.com/images/profile/demo/yellingcat@192.webp" }}" /></div>
                    <div>
                        <div>{{ $user->name }}</div>
                        <div class="text-xs font-semibold opacity-60">{{ $user->email }}</div>
                    </div>
                    <div>
                        <div class="flex justify-end gap-1">
                            <button class="btn btn-square btn-ghost">
                                <i class="ri-edit-line text-xl font-light text-yellow-600"></i>
                            </button>
                            <button class="btn btn-square btn-ghost">
                                <i class="ri-delete-bin-line text-xl font-light text-red-600"></i>
                            </button>
                        </div>
                        <div>
                            <p class="text-xs font-semibold opacity-60">Joined {{ $user->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </li>
            @empty
            @endforelse
        </div>

        <div class="p-4">
            {{ $this->users->links() }}
        </div>
    </ul>
</div>
