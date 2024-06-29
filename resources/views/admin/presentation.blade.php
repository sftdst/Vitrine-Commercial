@extends('layouts.app')

@section('title', 'Présentation')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Présentation</h1>
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
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Statut</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($presents as $present)
                    <tr>
                        <td>{{$present->titre}}</td>
                        <td>{{$present->description}}</td>
                        <td>{{$present->statut}}</td>
                        <td>
                            <button class="btn btn-primary edit-btn"     data-toggle="modal" data-target="#editProductModal-{{$present->id}}"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-danger delete-btn"  data-toggle="modal" data-target="#deleteProductModal"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>

              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
    <div class="modal fade" id="editProductModal-{{$present->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Éditer Présentation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm" action="{{route('editPresnt',$present->id)}}" method="POST">
                        @csrf
                        <input type="hidden" id="editId">
                        <div class="form-group">
                            <label for="editTitle">Titre</label>
                            <input type="text" class="form-control" id="editTitle" value="{{$present->titre}}" name="titre" required>
                        </div>
                        <div class="form-group">
                            <label for="editDescription">Description</label>
                            <textarea class="form-control" id="editDescription" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="editStatus">Statut</label>
                            <select class="form-control" id="editStatus" name="statut" required>
                                <option value="Valeurs">Valeurs</option>
                                <option value="Vision">Vision</option>
                                <option value="Mission">Mission</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Sauvegarder</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('deletePresent',$present->id)}}" method="post">
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
                        <button id="confirmDeleteProduct" class="btn btn-danger">Supprimer</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</tbody>

</table>
</main><!-- End #main -->
<!-- Modal Ajouter -->
{{-- <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Ajouter Présentation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addForm">
                    <div class="form-group">
                        <label for="addTitle">Titre</label>
                        <input type="text" class="form-control" id="addTitle" required>
                    </div>
                    <div class="form-group">
                        <label for="addDescription">Description</label>
                        <textarea class="form-control" id="addDescription" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="addStatus">Statut</label>
                        <select class="form-control" id="addStatus" required>
                            <option value="Actif">Actif</option>
                            <option value="Inactif">Inactif</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div> --}}

<!-- Modal Éditer -->

