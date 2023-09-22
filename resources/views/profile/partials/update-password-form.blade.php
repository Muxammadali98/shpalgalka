<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Parolni Yangilash') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ "Hisobingiz xavfsizligini ta'minlash uchun uzoq, tasodifiy paroldan foydalanayotganligiga ishonch hosil qiling." }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="current_password" :value="__('Joriy Parol')" />
            <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <span class="text-sm text-red-600 space-y-1"> @error('current_password') {{ $message }}  @enderror</span>
        </div>

        <div>
            <x-input-label for="password" :value="__('Yangi Parol')" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <span class="text-sm text-red-600 space-y-1"> @error('password') {{ $message }}  @enderror</span>
           
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Yangi Parolni Qayta kiriting')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <span class="text-sm text-red-600 space-y-1"> @error('password_confirmation') {{ $message }}  @enderror</span>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Saqlash') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saqlandi.') }}</p>
            @endif
        </div>
    </form>
</section>
