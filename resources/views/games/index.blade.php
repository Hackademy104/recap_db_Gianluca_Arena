<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-1 text-center">Ecco i nostri giochi</h1>

            </div>
            @foreach ($games as $game)
                <div class="col-4 d-flex justify-content-center my-3">
                    <div class="card shadow" style="width: 18rem;">
                        <img src="{{ Storage::url($game->img) }}" class="card-img-top card-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $game->name }}</h5>
                            <p class="card-text">{{ substr($game->description, 0, 5) }}...</p>
                            <p class="card-text">{{ $game->price }} $/notte</p>
                            <a href="{{ route('show', compact('game')) }}"
                                class="btn btn-primary">Leggi di più</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
