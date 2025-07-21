<div class="hero bg-base-200 min-h-screen">
    @if (session("success"))
        <div class="toast toast-top toast-end">
            <div class="alert alert-success">
                <span>{{ session("success") }}</span>
            </div>
        </div>
    @endif
    <div class="hero-content w-full flex-col lg:flex-row-reverse">
        <div class="w-1/2 text-center lg:text-left">
            <ul class="list bg-base-100 rounded-box flex min-h-[610px] flex-col justify-between shadow-md">
                <div>
                    <li class="card-title p-4 pb-2 text-lg">User List</li>
                    <form class="mx-4" action="" wire:submit="searchUser">
                        <label class="input w-full">
                            <i class="ri-search-line opacity-50"></i>
                            <input type="search" required placeholder="Search user(s) ..." wire:model.live.debounce.250ms="query" />
                        </label>
                    </form>
                    @forelse ($users as $user)
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
                    {{ $users->links() }}
                </div>
            </ul>
        </div>

        <div class="card bg-base-100 min-h-[610px] w-1/2 max-w-xl shrink-0 shadow-2xl">
            <div class="card-header px-6 pt-6">
                <h2 class="card-title">Create New User</h2>
            </div>
            <div class="card-body">
                {{-- ? How to submit data, or can use in the button use 'wire:click.prevent' --}}
                <form action="" method="post" enctype="multipart/form-data" wire:submit.prevent="createNewUser">
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Name:</legend>
                        <input name="name" type="text" class="input w-full" placeholder="Name" wire:model="name" required />
                        @error("name")
                            <p class="label text-red-500">{{ $message }}</p>
                        @enderror

                        <legend class="fieldset-legend">Email:</legend>
                        <input name="email" type="email" class="input w-full" placeholder="Email" wire:model="email" required />
                        @error("email")
                            <p class="label text-red-500">{{ $message }}</p>
                        @enderror

                        <legend class="fieldset-legend">Password:</legend>
                        <input name="password" type="password" class="input w-full" placeholder="Password" wire:model="password" required />
                        @error("password")
                            <p class="label text-red-500">{{ $message }}</p>
                        @enderror

                        <legend class="fieldset-legend">Avatar:</legend>
                        <input name="avatar" type="file" class="file-input w-full" placeholder="Avatar" wire:model="avatar" required accept="image/jpeg, image/png, image/jpg" />
                        @error("avatar")
                            <p class="label text-red-500">{{ $message }}</p>
                        @enderror

                        <span class="loading loading-ring loading-lg text-primary" wire:loading wire:target="avatar"></span>

                        @if ($avatar)
                            <div>
                                <p class="fieldset-legend">Preview Image</p>
                                <div class="avatar">
                                    <div class="w-24 rounded-full">
                                        <img src="{{ $avatar->temporaryUrl() }}">
                                    </div>
                                </div>
                            </div>
                        @endif

                        <button type="submit" class="btn btn-success mt-4">
                            Save
                            <span class="loading loading-ring loading-md text-primary" wire:loading wire:target="createNewUser"></span>
                        </button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
