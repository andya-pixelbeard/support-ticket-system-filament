<div class="fi-simple-layout flex min-h-screen flex-col items-center">

    <div
        class="fi-simple-main-ctn flex w-full flex-grow items-center justify-center"
    >
        <main
            class="fi-simple-main my-16 w-full bg-white px-6 py-12 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10 sm:max-w-lg sm:rounded-xl sm:px-12"
        >
            <form wire:submit="create" lass="p-8 space-y-8 mx-auto">
                <div class="p-8 mb-4">
                    {{ $this->form }}
                </div>

               <x-filament::button
                    icon="heroicon-m-arrow-left-on-rectangle"
                    icon-alias="panels::widgets.account.logout-button"
                    labeled-from="sm"
                    tag="button"
                    type="submit"
                >
                    Complete Account
                </x-filament::button> 
            </form>


            <x-filament-actions::modals />
        </main>
    </div>
</div>
