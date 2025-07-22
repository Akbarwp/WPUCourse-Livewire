<div class="card bg-base-100 min-h-[610px] w-1/2 max-w-xl shrink-0 shadow-2xl">
    <div class="card-header px-6 pt-6">
        <h2 class="card-title">Create New User</h2>
    </div>
    <div class="card-body">
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
                <input name="avatar" type="file" class="file-input w-full" placeholder="Avatar" wire:model="avatar" accept="image/jpeg, image/png, image/jpg" />
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
