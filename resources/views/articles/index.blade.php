<x-layout title="Elenco Articoli">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6">
                <h1>Elenco Articoli</h1>
            </div>
            <div class="col-lg-6 text-end">
                <a href="{{ route('articles.create') }}" class="btn btn-primary">Crea Articolo</a>
            </div>
        </div>

        <x-success />

        <div class="mt-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Titolo</th>
                        <th>Category</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->category->name }}</td>
                        <td class="text-end">
                            <a href="{{ route('articles.edit', $article) }}" class="btn btn-sm btn-secondary">modifica</a>

                            <form class="d-inline ms-1" action="{{ route('articles.destroy', $article) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">cancella</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- $articles->links() --}}
        </div>
    </div>
</x-layout>




            