<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-1 text-center">Dettaglio Gioco</h1>

            </div>
            <div class="col-6">
                <h2>{{$game->name}}</h2>
                <h4>{{$game->price}} $/notte</h4>
                <p>{{$game->description}}</p>
                {{--? Model Traversal -> Attraversamento dei Modelli  --}}
                @if($game->user)
                <p>{{$game->user->name}} </p>
                @else
                <p>Utente Non Disponibile</p>
                @endif

                {{--? Model Traversal --}}
                <ul class="list-group">
                    @foreach($game->categories as $category)
                        <li class="list-group-item">{{$category->name}}</li>
                    @endforeach
                </ul>
                @if($game->user && Auth::user() == $game->user)
                <div class="row my-3">
                    <div class="col-6">
                        <a class="btn btn-warning" href="{{route('edit', compact('game'))}}">Modifica Gioco</a>
                    </div>
                    <div class="col-6">
                        <form method="POST" action="{{route('delete', compact('game'))}}">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit">Elimina Gioco</button>
                        </form>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-6">
                <img src="{{Storage::url($game->img)}}" alt="" width="800">
            </div>
        </div>
    </div>
</x-layout>