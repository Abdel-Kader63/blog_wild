<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("") }}
                </div>
                <div style="width: 50rem; border: 2px black solid; ">
                    
                    <div >
                      <h5 class="flex justify-center font-extrabold text-3xl m-5">Bienvenue !</h5>
                      <p class="card-text">Sur ce blog personnel, créer des articles ! Attention, seulement le thème des animaux sauvages est toléré. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos harum corrupti ipsam ipsa eum inventore! Eius expedita, cum ex numquam quaerat, quo molestiae quidem, quis debitis voluptas tempora doloremque. Laboriosam!</p>
                      <a href="{{ route('posts.create') }}" title="Créer un article" style="background : #213310 ; color : white ; justify-content :center ; display :flex ; align-items : center ; padding : 1.3rem 2rem ; font-size: 1.1rem">Créer un article</a>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</x-app-layout>
