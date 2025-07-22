<div class="w-1/2 text-center lg:text-left">
    <ul class="list bg-base-100 rounded-box flex min-h-[610px] flex-col justify-between shadow-md">
        <div>
            <li class="card-title p-4 pb-2 text-lg">User List</li>
            <div class="mx-4 skeleton">
                <label class="input w-full">
                    <i class="ri-search-line opacity-50"></i>
                    <input type="search" required placeholder="Search user(s) ..." />
                </label>
            </div>
            @for ($i = 1; $i <= 5; $i++)
                <li class="list-row">
                    <div class="rounded-box size-10 skeleton"></div>
                    <div>
                        <div class="skeleton h-4 w-48 mb-2"></div>
                        <div class="skeleton h-4 w-36"></div>
                    </div>
                    <div>
                        <div class="flex justify-end gap-1 mb-1">
                            <button class="btn btn-square btn-ghost skeleton"></button>
                            <button class="btn btn-square btn-ghost skeleton"></button>
                        </div>
                        <div>
                            <p class="skeleton h-4 w-32"></p>
                        </div>
                    </div>
                </li>
            @endfor
        </div>
        <div class="p-4"></div>
    </ul>
</div>
