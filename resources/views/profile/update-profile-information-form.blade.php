<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Información de tu perfil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Actualiza tu información de usuario cuando quieras.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Foto de perfil') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Selecciona una foto') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Borrar foto') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Nombre') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Añadir ubicacion -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="ubication" value="{{ __('Ubicacion') }}" />
            <x-jet-input id="ubication" type="text" class="mt-1 block w-full" wire:model.defer="state.ubication" autocomplete="ubication" />
            <x-jet-input-error for="ubication" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Correo electrónico') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Tu email no esta verificado') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900" wire:click.prevent="sendEmailVerification">
                        {{ __('Click aqui para mandar nuevamente el link.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                        {{ __('Se ha enviado un link de verificación a tu correo electrónico.') }}
                    </p>
                @endif
            @endif
        </div>

        <!-- Fecha de cumpleaños -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="birthday" value="{{ __('Fecha de cumpleaños') }}" />
            <x-jet-input id="birthday" type="date" class="mt-1 block w-full" wire:model.defer="state.birthday" autocomplete="birthday" />
            <x-jet-input-error for="birthday" class="mt-2" />
        </div>

        <!-- Genero -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="gender" value="{{ __('Genero') }}" />
            <x-jet-input id="gender" type="text" class="mt-1 block w-full" wire:model.defer="state.gender" autocomplete="gender" />
            <x-jet-input-error for="gender" class="mt-2" />
        </div>

        <!-- Puesto actual -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="ocupation" value="{{ __('Puesto actual') }}" />
            <x-jet-input id="ocupation" type="text" class="mt-1 block w-full" wire:model.defer="state.ocupation" autocomplete="ocupation" />
            <x-jet-input-error for="ocupation" class="mt-2" />
        </div>

        <!-- Empresa actual -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="current_job" value="{{ __('Empresa en la que actualmente trabajas') }}" />
            <x-jet-input id="current_job" type="text" class="mt-1 block w-full" wire:model.defer="state.current_job" autocomplete="current_job" />
            <x-jet-input-error for="current_job" class="mt-2" />
        </div>        
        
        <!-- Numero de telefono -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="phone_number" value="{{ __('Numero de telefono') }}" />
            <x-jet-input id="phone_number" type="tel" class="mt-1 block w-full" wire:model.defer="state.phone_number" autocomplete="phone_number" />
            <x-jet-input-error for="phone_number" class="mt-2" />
        </div>

        <!-- Linkedin -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="linkedin_url" value="{{ __('Linkedin') }}" />
            <x-jet-input id="linkedin_url" type="text" class="mt-1 block w-full" wire:model.defer="state.linkedin_url" autocomplete="linkedin_url" />
            <x-jet-input-error for="linkedin_url" class="mt-2" />
        </div>   

        <!-- Sobre ti -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="biography" value="{{ __('Sobre ti') }}" />
            <x-jet-input id="biography" type="text" class="mt-1 block w-full" wire:model.defer="state.biography" autocomplete="biography" />
            <x-jet-input-error for="biography" class="mt-2" />
        </div>

        <!-- Añadir experiencia -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="experience" value="{{ __('Añade tu experiencia aqui') }}" />
            <x-jet-input id="experience" type="text" class="mt-1 block w-full" wire:model.defer="state.experience" autocomplete="experience" />
            <x-jet-input-error for="experience" class="mt-2" />
        </div>

        <!-- Añadir educacion -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="education" value="{{ __('Grado educativo') }}" />
            <x-jet-input id="education" type="text" class="mt-1 block w-full" wire:model.defer="state.education" autocomplete="education" />
            <x-jet-input-error for="education" class="mt-2" />
        </div>

        <!-- Añadir lenguajes -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="languajes" value="{{ __('Lenguajes dominados') }}" />
            <x-jet-input id="languajes" type="text" class="mt-1 block w-full" wire:model.defer="state.languajes" autocomplete="languajes" />
            <x-jet-input-error for="languajes" class="mt-2" />
        </div>

        <!-- Añadir cursos -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="courses" value="{{ __('Cursos tomados') }}" />
            <x-jet-input id="courses" type="text" class="mt-1 block w-full" wire:model.defer="state.courses" autocomplete="courses" />
            <x-jet-input-error for="courses" class="mt-2" />
        </div>

        <!-- Añadir habilidades -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="skills" value="{{ __('Mis habilidades') }}" />
            <x-jet-input id="skills" type="text" class="mt-1 block w-full" wire:model.defer="state.skills" autocomplete="skills" />
            <x-jet-input-error for="skills" class="mt-2" />
        </div>

        <!-- Añadir intereses -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="interests" value="{{ __('Intereses') }}" />
            <x-jet-input id="interests" type="text" class="mt-1 block w-full" wire:model.defer="state.interests" autocomplete="interests" />
            <x-jet-input-error for="interests" class="mt-2" />
        </div>

        <!-- Añadir conocimientos -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="knownments" value="{{ __('Conocimientos') }}" />
            <x-jet-input id="knownments" type="text" class="mt-1 block w-full" wire:model.defer="state.knownments" autocomplete="knownments" />
            <x-jet-input-error for="knownments" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Guardado con exito') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Guardar') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
