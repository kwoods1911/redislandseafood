<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
        {{ __('Company Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your companies informations") }}
        </p>
    </header>

<form action="{{ route('profile.update') }}" class="mt-6 space-y-6">
    @csrf
    @method('patch')

    <div>
            <x-input-label for="company_name" :value="__('Company Name')" />
            <x-text-input id="company_name" name="company_name" type="text" class="mt-1 block w-full" required autofocus autocomplete="organization" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>


    <div>
            <x-input-label for="company_email" :value="__('Company Email')" />
            <x-text-input id="company_email" name="company_email" type="text" class="mt-1 block w-full" required autofocus autocomplete="email" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>


    <div>
            <x-input-label for="company_address" :value="__('Company Address')" />
            <x-text-input id="company_address" name="company_address" type="text" class="mt-1 block w-full" required autofocus autocomplete="address-level2" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <div>
            <x-input-label for="company_city" :value="__('Company City')" />
            <x-text-input id="company_city" name="company_city" type="text" class="mt-1 block w-full" required autofocus autocomplete="address-level2" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <div>
            <x-input-label for="company_province" :value="__('Company Province')" />
            <x-text-input id="company_province" name="company_province" type="text" class="mt-1 block w-full" required autofocus autocomplete="address-level1" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <div>
            <x-input-label for="company_postal_code" :value="__('Postal Code')" />
            <x-text-input id="company_postal_code" name="company_postal_code" type="text" class="mt-1 block w-full" required autofocus autocomplete="postal-code" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>
</form>






</section>