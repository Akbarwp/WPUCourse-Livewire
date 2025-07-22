<div class="hero bg-base-200 min-h-screen">
    @if (session("success"))
        <div class="toast toast-top toast-end">
            <div class="alert alert-success">
                <span>{{ session("success") }}</span>
            </div>
        </div>
    @endif
    <div class="hero-content w-full flex-col lg:flex-row-reverse" lazy>
        <div class="w-1/2 text-center lg:text-left" wire:poll.3s.visible>
            <ul class="list bg-base-100 rounded-box flex min-h-[610px] flex-col justify-between shadow-md">
                <div>
                    <li class="card-title p-4 pb-2 text-lg">Game List</li>
                    <form class="mx-4" action="" wire:submit="searchGames">
                        <label class="input w-full">
                            <i class="ri-search-line opacity-50"></i>
                            <input type="search" required placeholder="Search game(s) ..." wire:model.live.debounce.250ms="query" />
                        </label>
                    </form>
                    @forelse ($this->games as $game)
                        <li class="list-row">
                            <div><img class="rounded-box size-10" src="https://img.daisyui.com/images/profile/demo/yellingcat@192.webp" /></div>
                            <div>
                                <div>
                                    <span>{{ $game->name }}</span> | <span class="text-blue-600">({{ $game->platform }})</span>
                                </div>
                                <div class="text-xs font-semibold opacity-60">{{ $game->genre }}</div>
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
                                    <p class="text-xs font-semibold opacity-60">Created {{ $game->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </li>
                    @empty
                    @endforelse
                </div>

                <div class="p-4">
                    {{ $this->games->links() }}
                </div>
            </ul>
        </div>

        <div class="card bg-base-100 min-h-[610px] w-1/2 max-w-xl shrink-0 shadow-2xl">
            <div class="card-header px-6 pt-6">
                <h2 class="card-title">Create New Game</h2>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data" wire:submit.prevent="createNewGames">
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Name:</legend>
                        <input name="name" type="text" class="input w-full" placeholder="Name" wire:model="form.name" required />
                        @error("form.name")
                            <p class="label text-red-500">{{ $message }}</p>
                        @enderror

                        <legend class="fieldset-legend">Genre:</legend>
                        <input name="genre" type="text" class="input w-full" placeholder="Genre" wire:model="form.genre" required />
                        @error("form.genre")
                            <p class="label text-red-500">{{ $message }}</p>
                        @enderror

                        <legend class="fieldset-legend">Platform:</legend>
                        <input name="platform" type="text" class="input w-full" placeholder="Platform" wire:model="form.platform" required />
                        @error("form.platform")
                            <p class="label text-red-500">{{ $message }}</p>
                        @enderror

                        <button type="submit" class="btn btn-success mt-4">
                            Save
                            <span class="loading loading-ring loading-md text-primary" wire:loading wire:target="createNewGames"></span>
                        </button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
