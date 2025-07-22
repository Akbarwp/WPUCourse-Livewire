<div class="hero bg-base-200 min-h-screen">
    @if (session("success"))
        <div class="toast toast-top toast-end">
            <div class="alert alert-success">
                <span>{{ session("success") }}</span>
            </div>
        </div>
    @endif
    <div class="hero-content w-full flex-col lg:flex-row-reverse">
        <livewire:user-list lazy />
        <livewire:user-register-form />
    </div>
</div>
