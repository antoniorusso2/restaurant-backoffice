{{-- @dd('sei nella create') --}}
<h1>Crea nuovo piatto</h1>
<form action="{{ route('dishes.store') }}" method="POST">
    @csrf
    <label for="name">Nome</label>
    <input type="text" id="name" name="name" placeholder="Inserisci il nome del piatto">

    <button type="submit">Invia</button>
</form>
