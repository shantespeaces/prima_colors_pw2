<x-layout titre="Modifier {{ $actualite->titre }}">

    <x-nav-admin titre=" Modifier une ActualitÉs" route="{{route('admin.actualites.index')}}"
        valeur="Retour aux actualitÉs" />

    <section>

        {{-- FORMULAIRE --}}
        <form class="edit actualite"
                action="{{ route('admin.actualites.update', ['id' => $actualite->id] ) }}"
                method="POST"
                enctype="multipart/form-data"
        >
            @csrf

            {{-- TITRE --}}
            <div class="grid-item titre actualite">
                <label for="titre" class="grid-title">Titre</label>


                <x-forms.erreur champ="titre" />

                <input id="titre" name="titre" type="text" autofocus class=" "
                    value="{{ old('titre') ?? $actualite->titre }}">
            </div>

            {{-- DESCRIPTION --}}
            <div class="grid-item description">

                <label for="description" class="grid-title">Description</label>

                <x-forms.erreur champ="description" />
                <input id="description" name="description" type="text" autofocus class=" "
                    value="{{ old('description') ?? $actualite->description }}">
            </div>

            {{-- IMAGE --}}
            <div class="grid-item image">

                <label for="image" class="grid-title">Image</label>

                <x-forms.erreur champ="image" />
                <input id="image" name="image" type="file" class=" "
                >
                <img src="{{asset($actualite->image)}}" alt="">
            </div>

            <div class="conteneur-bouttons">
                {{-- SUBMIT --}}
                <button class="modifier" type="submit">
                    Modifier une activitÉ
                </button>
            </div>
        </form>
    </section>
</x-layout>
