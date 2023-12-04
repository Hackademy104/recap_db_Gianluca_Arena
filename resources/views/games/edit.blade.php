<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="text-center display-1">Pubblica il tuo gioco</h1>
            </div>
            <div class="col-6">
                <form method="POST" action="{{ route('update', compact('game')) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input name="name" type="text" class="form-control" id="name"
                        value="{{$game->name}}">
                        @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo</label>
                        <input  value="{{$game->price}}" name="price" type="text" class="form-control" id="price"
                            value="{{ old('price') }}">
                        @error('price')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Immagine:</label>
                        <input name="img" type="file" class="form-control" id="img">
                        @error('img')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 form-floating">
                        <textarea  value="{{$game->description}}" name="description" class="form-control" placeholder="Inserisci Descrizione" id="floatingTextarea2"
                            style="height: 300px">{{ old('description') }}</textarea>
                        <label for="floatingTextarea2">Descrizione:</label>
                        @error('description')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    @foreach ($categories as $category)
                        <div class="form-check">
                            <input name="categories[]" @if ($game->categories->contains($category)) checked @endif
                                class="form-check-input" type="checkbox" value="{{ $category->id }}"
                                id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                {{ $category->name }}
                            </label>
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Carica Gioco</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
