@extends('layouts.app')

@section('title', 'Produit')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Produits </h1>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
                <button class="btn btn-success m-2" data-toggle="modal" data-target="#addProductModal" ><i class="fa fa-add" aria-hidden="true"></i></button>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Catégorie</th>
                    <th>Prix</th>
                    <th>statut</th>
                    <th>image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($produits as $produit)
                    <tr>
                        <td>{{$produit->nom}}</td>
                        <td>{{$produit->description}}</td>
                        <td>{{$produit->categorie}}</td>
                        <td>{{$produit->prix}}</td>
                        <td>{{$produit->statut}}</td>
                        <td><img src="{{$produit->image}}" alt=""  width="100"></td>
                        <td>
                            <button class="btn btn-primary edit-btn"  data-id=""   data-toggle="modal" data-target="#editProductModal-{{$produit->id}}"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-danger delete-btn" data-id="" data-toggle="modal" data-target="#deleteProductModal"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>

              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- Modal Suppression -->
<div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('deleteProduit', $produit->id) }}" >
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteProductModalLabel">Supprimer un produit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Êtes-vous sûr de vouloir supprimer ce produit ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit"  class="btn btn-danger">Supprimer</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- editer --}}
<div class="modal fade" id="editProductModal-{{$produit->id}}" tabindex="-1" aria-labelledby="editProductModalLabel-{{$produit->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel-{{$produit->id}}">Éditer un produit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addProductForm" method="POST" action="{{route('editProduit', $produit->id)}}">
                    @csrf
                    <div class="form-group">
                        <label for="addProductName">Nom</label>
                        <input type="text" name="nom" class="form-control" id="addProductName" value="{{$produit->nom}}" required>
                    </div>
                    <div class="form-group">
                        <label for="addProductDescription">Description</label>
                        <textarea class="form-control" name="description" value="{{$produit->description}}" id="addProductDescription"  required></textarea>
                    </div>


                    <div class="form-group">
                        <label for="addProductPrice">Prix</label>
                        <input type="number" class="form-control" value="{{$produit->prix}}" name="prix"  id="addProductPrice" required>
                    </div>
                    <div class="form-group">
                        <label for="addStatus">Statut</label>
                        <select class="form-control" id="addStatus" name="statut" required>
                            <option value="1">Actif</option>
                            <option value="0">Inactif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="addProductCategory">Categorie</label>
                        <select class="form-control" id="addProductCategory" name="categorie"  required>
                            <option value="categorie 1">categorie 1</option>
                            <option value="categorei 2">categorie 2</option>
                            <option value="categorei 3">categorie 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Enrégistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
</tbody>
</table>
</main><!-- End #main -->

{{-- ajouter --}}
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Ajouter un produit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addProductForm" method="POST" action="{{route('addProduit')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="addProductName">Nom</label>
                        <input type="text" name="nom" class="form-control" id="" required>
                    </div>
                    <div class="form-group">
                        <label for="addProductDescription">Description</label>
                        <textarea class="form-control" name="description" id="" required></textarea>
                    </div>


                    <div class="form-group">
                        <label for="addProductPrice">Prix</label>
                        <input type="number" class="form-control" name="prix" id="" required>
                    </div>
                    <div class="form-group">
                        <label for="addStatus">Statut</label>
                        <select class="form-control" id="" name="statut" required>
                            <option value="1">Actif</option>
                            <option value="0">Inactif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="addProductCategory">Categorie</label>
                        <select class="form-control" id="" name="categorie" required>
                            <option value="categorie 1">categorie 1</option>
                            <option value="categorei 2">categorie 2</option>
                            <option value="categorei 3">categorie 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="addProductImage">Image</label>
                        <input type="file" class="form-control" name="image" id="" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div>






