@section('content')
<div class="container">
    <h1>Détails de la catégorie</h1>
    <p><strong>Nom :</strong> {{ $category->name }}</p>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Retour</a>
</div>
@endsection