<x-app-layout>
    <section class="px-5 mx-auto rounded-md max-w-6xl">
        <div class="py-4 mt-4 px-4 sm:px-6 lg:px-8 bg-white border border-gray-200 rounded-md">
            <form action="{{route('messages.store')}}" method="POST">
                @csrf
                <h1 class="text-xl font-bold text-gray-900 mb-3">{{ $id->title }}</h1>
                <div class="mb-4">
                    <x-jet-label>Destinatario</x-jet-label>
                    <select name="to_user_id" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option {{old('to_user_id') == $id->user->id ? 'selected' : ''}} value="{{$id->user->id}}">{{$id->user->name}}</option>
                    </select>
                    <x-jet-input-error class="mt-2" for="to_user_id"/>
                </div>
                    <div class="mb-4">
                        <x-jet-label>Dejanos tu curriculum*</x-jet-label>
                        <x-jet-input value="{{old('subject')}}" type="file" class="w-full rounded-none bg-gray-100 border border-gray-200" placeholder="Ingrese el asunto" name="subject"/>
                        <x-jet-input-error class="mt-2" for="subject"/>
                    </div>
                    <div class="mb-4">
                        <x-jet-label>Escribenos</x-jet-label>
                        <textarea class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Presentate..." name="body" rows="4">{{old('body')}}</textarea>
                        <x-jet-input-error class="mt-2" for="body"/>
                    </div>
                <x-jet-button class="bg-violet-700">Enviar</x-jet-button>
            </form>
        </div>
    </section>
</x-app-layout>