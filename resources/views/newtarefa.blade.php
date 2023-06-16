@extends('layouts.master')

@section('body')

<div class="row">

<div class="col-md-6 mx-auto">
    <div class="card mt-5" style="background-color: #E6E6FA; /* lavender */">
        <div class="card-header" style="background-color: #9370DB; /* medium purple */ color: #FFF;">
            Adicionar Tarefa
        </div>
        <div class="card-body" style="background-color: #FFF; color: #4B0082; /* indigo */">
            <form method="POST" action="{{ route('storecard') }}" >
                @csrf

                <div class="form-group">
                    <label for="title">Título</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <label for="due_date">Data de entrega</label>
                    <input class="form-control" id="due_date" name="due_date" type="date" required>
                </div>


                <button type="submit" class="btn btn-primary mt-4">Adicionar</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
