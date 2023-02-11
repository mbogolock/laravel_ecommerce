@foreach ($produits as $produit)

<h1> {{ $produit->name_produit }} </h1>
<h1> {{ $produit->prix_produit }} </h1>
<textarea id="w3review" name="w3review" rows="4" cols="50"> {{ $produit->prix_produit }} </textarea>
<textarea id="w3review" name="w3review" rows="4" cols="50"> {{ $produit->image_produit }} </textarea>
    
@endforeach