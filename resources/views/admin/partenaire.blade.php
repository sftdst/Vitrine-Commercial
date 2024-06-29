@extends('layouts.app')

@section('title', 'artenaire')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Partenaire</h1>

    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
                <button class="btn btn-success m-2 " data-toggle="modal" data-target="#addModal" >
                    <i class="fa fa-add" aria-hidden="true"></i>
                </button>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>logo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                    <tbody>
                    @foreach($partenaires as $partenaire)
                        <tr>
                            <td>{{$partenaire->nom}}</td>
                            <td>
                                <img src="{{ $partenaire->logo }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" width="100" alt="">
                            </td>
                            <td>
                                <button class="btn btn-danger delete-btn" data-id="{{ $partenaire->id }}" data-toggle="modal" data-target="#deleteModal-{{$partenaire->id }}"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>


                        <div class="modal fade" id="deleteModal-{{$partenaire->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel-{{$partenaire->id}}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form id="deleteForm" method="POST" action="{{route('deletePartenair',$partenaire->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Supprimer</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Voulez-vous vraiment supprimer ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
</main>
      <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('addpartenaire') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>
                        <div class="form-group">
                            <label for="addlogo">Logo</label>
                            <input type="file" class="form-control-file" id="image" name="image" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-success">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
