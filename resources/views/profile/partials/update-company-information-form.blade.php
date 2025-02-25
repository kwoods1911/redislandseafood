<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
        {{ __('Company Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your companies informations") }}
        </p>
    </header>

<form method="post" action="{{ route('profile.updatecompanyinfo') }}" class="mt-6 space-y-6">
    @csrf

    <div>
            <x-input-label for="company_name" :value="__('Company Name')" />
            <x-text-input id="company_name" name="company_name" type="text" :value="old('company_name', $user->company_name)" class="mt-1 block w-full" required autofocus autocomplete="organization" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>


    <div>
            <x-input-label for="company_email" :value="__('Company Email')" />
            <x-text-input id="company_email" name="company_email" type="text" :value="old('company_email', $user->company_email)" class="mt-1 block w-full" required autofocus autocomplete="email" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>


    <div>
            <x-input-label for="company_address" :value="__('Company Address')" />
            <x-text-input id="company_address" name="company_address" type="text" :value="old('company_address', $user->company_address)" class="mt-1 block w-full" required autofocus autocomplete="address-level2" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <div>
            <x-input-label for="company_city" :value="__('Company City')" />
            <x-text-input id="company_city" name="company_city" type="text" :value="old('company_city', $user->company_city)" class="mt-1 block w-full" required autofocus autocomplete="address-level2" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <div>
            <x-input-label for="company_province" :value="__('Company Province')" />
            <x-text-input id="company_province" name="company_province" type="text" :value="old('company_province', $user->company_province)" class="mt-1 block w-full" required autofocus autocomplete="address-level1" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <div>
            <x-input-label for="company_postal_code" :value="__('Postal Code')" />
            <x-text-input id="company_postal_code" name="postal_code" type="text" :value="old('postal_code', $user->postal_code)" class="mt-1 block w-full" required autofocus autocomplete="postal-code" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>


    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Save') }}</x-primary-button>
    </div>
</form>






</section>